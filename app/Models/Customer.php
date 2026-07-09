<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{

    protected $fillable = [

        'name',
        'notes'

    ];

    public function sales()
{
    return $this->hasMany(
        Sale::class
    );
}

}