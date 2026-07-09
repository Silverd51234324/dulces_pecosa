<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StoreVisitDetail extends Model
{

    protected $fillable = [

        'store_visit_id',
        'product_id',
        'supplied_quantity',
        'remaining_quantity',
        'sold_quantity'

    ];



    public function visit()
    {

        return $this->belongsTo(
            StoreVisit::class,
            'store_visit_id'
        );

    }



    public function product()
    {

        return $this->belongsTo(
            Product::class
        );

    }

}