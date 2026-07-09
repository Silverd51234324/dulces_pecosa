<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{

    protected $fillable = [

        'purchase_date',
        'total',
        'notes'

    ];



    public function details()
    {

        return $this->hasMany(
            PurchaseDetail::class
        );

    }


}