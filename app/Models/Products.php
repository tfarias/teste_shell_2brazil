<?php

namespace App\Models;


class Products extends BaseModel
{
    protected $fillable = ['name','code','price'];

    protected $table = 'products';


    function stores(){
        return $this->belongsToMany(Store::class,'store_itens','product_id','order_id')->withPivot(['quantity','price'])->withTimestamps();
    }
}
