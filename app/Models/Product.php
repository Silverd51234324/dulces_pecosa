<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $fillable = [

        'name',
        'type',
        'purchase_amount',
        'purchase_unit',
        'production_yield',
        'sale_price',
        'minimum_stock',
        'display_order',
        'image',
        'active'

    ];

    public function purchaseDetails()
{
    return $this->hasMany(
        PurchaseDetail::class
    );
}

public function productions()
{
    return $this->hasMany(
        Production::class
    );
}

public function inventory()
{
    return $this->hasOne(
        Inventory::class
    );
}

public function storeProducts()
{
    return $this->hasMany(
        StoreProduct::class
    );
}



public function storeVisitDetails()
{
    return $this->hasMany(
        StoreVisitDetail::class
    );
}

}

