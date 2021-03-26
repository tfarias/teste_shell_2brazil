<?php

namespace App\Models;


class Store extends BaseModel
{
    protected $fillable = ['order_date','order_code','total','discount'];

    protected $table = 'stores';
    protected $dates = ['order_date'];


    function products(){
        return $this->belongsToMany(Products::class,'store_itens','order_id','product_id')->withPivot(['quantity','price'])->withTimestamps();
    }

    public function getTotalAttribute(){
        return number_format($this->attributes['total'],2,'.','');
    }

    public function getTotalWithDiscontAttribute(){
        return number_format(($this->attributes['total'] - $this->attributes['discount']),2,',','') ;
    }

    public function getDiscountAttribute(){
        return number_format($this->attributes['discount'],2,'.','');
    }
}
