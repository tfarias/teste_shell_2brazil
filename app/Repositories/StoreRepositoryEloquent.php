<?php

namespace App\Repositories;

use App\Models\Store;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;


/**
 * Class StoreRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class StoreRepositoryEloquent extends BaseRepository implements StoreRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Store::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }


    public function sinc_products($attributes, $id)
    {
        $model = parent::update($attributes, $id);
        $model->products()->sync($attributes['products']);
        return $model;
    }


    public function create(array $attributes)
    {
        $total = 0;
        $total_discount = 0;
        $producs = [];
        $prodRepository = app(ProductRepository::class);
        if (isset($attributes['ArticleCode'])) {
            $response = $prodRepository->create([
                'name' => $attributes['ArticleName'],
                'code' => $attributes['ArticleCode'],
                'price' => getAmount($attributes['UnitPrice'])
            ]);
            $total = getAmount($attributes['UnitPrice']) * (int)$attributes['Quantity'];
            $total_discount = calculateDiscount(getAmount($attributes['UnitPrice']),$attributes['Quantity']);
            $producs[] = [
                'product_id' => $response->id,
                'quantity'   => $attributes['Quantity'],
                'price'      => getAmount($attributes['UnitPrice']),
                'discount'   => $total_discount
            ];

        } else {
            foreach ($attributes as $attribute) {
                $response = $prodRepository->create([
                    'name' => $attribute['ArticleName'],
                    'code' => $attribute['ArticleCode'],
                    'price' => getAmount($attribute['UnitPrice'])
                ]);

                $discount = calculateDiscount(getAmount($attribute['UnitPrice']),$attribute['Quantity']);
                $total += getAmount($attribute['UnitPrice']) * (int)$attribute['Quantity'];
                $total_discount+= $discount;

                $producs[] = [
                    'product_id' => $response->id,
                    'quantity'   => $attribute['Quantity'],
                    'price'      => getAmount($attribute['UnitPrice']),
                    'discount'   => $discount
                ];
            }
        }

        $store = parent::create([
            'order_date' => date('Y-m-d H:i:s'),
            'total' => $total,
            'discount' => $total_discount
        ]);

        $this->sinc_products(['products' => $producs],$store->id);

        return $store;
    }



}
