<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StoreProduct extends Model
{

    protected $fillable = [

        'store_id',
        'product_id',
        'assigned_quantity'

    ];



    public function store()
    {

        return $this->belongsTo(
            Store::class
        );

    }



    public function product()
    {

        return $this->belongsTo(
            Product::class
        );

    }

}