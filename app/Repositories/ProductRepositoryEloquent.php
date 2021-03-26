<?php

namespace App\Repositories;

use App\Models\Products;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;



/**
 * Class ProductRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class ProductRepositoryEloquent extends BaseRepository implements ProductRepository
{

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Products::class;
    }



    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function create(array $attributes)
    {
        $exists = parent::findByField('code',$attributes['code']);

        if($exists->isNotEmpty()){
            return $exists->first();
        }

        return parent::create($attributes);
    }
}
