<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StoreVisit extends Model
{

    protected $fillable = [

        'store_id',
        'visit_date',
        'notes'

    ];



    public function store()
    {

        return $this->belongsTo(
            Store::class
        );

    }



    public function details()
    {

        return $this->hasMany(
            StoreVisitDetail::class
        );

    }

}