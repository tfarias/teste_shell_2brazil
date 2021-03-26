<?php

namespace App\Transformers;

use App\Models\Products;
use App\Models\Store;
use League\Fractal\TransformerAbstract;


/**
 * Class StoreTransformer.
 *
 * @package namespace App\Transformers;
 */
class StoreTransformer extends TransformerAbstract
{

    protected $availableIncludes = ['products'];
    /**
     * Transform the Store entity.
     *
     * @param \App\Models\Store $model
     *
     * @return array
     */
    public function transform(Store $model)
    {
        return [
            'OrderId'         => (int) $model->id,
            'OrderDate'       => $model->order_date->format('d/m/Y H:i'),
            'OrderCode'       => $model->order_code,
            'TotalAmountWihtoutDiscount' => $model->total,
            'TotalAmountWithDiscount' => $model->total_with_discont
        ];
    }

    public function includeProducts(Store $model){
        return $this->collection($model->products, function (Products $product){
            return [
                'ArticleCode' => $product->code,
                'ArticleName' => $product->name,
                'UnitPrice'   => $product->price,
                'Quantity'    => $product->pivot->quantity
            ];
        });
    }
}
