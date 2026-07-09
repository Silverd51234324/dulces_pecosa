<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Production extends Model
{

    protected $fillable = [

        'product_id',

        'input_quantity',

        'input_unit',

        'output_quantity',

        'output_unit',

        'cost',

        'sale_price'

    ];



    public function product()
    {

        return $this->belongsTo(
            Product::class
        );

    }

    

}