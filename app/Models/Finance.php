<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Finance extends Model
{

    protected $fillable = [

        'date',
        'investment',
        'manual_recovery',
        'notes'

    ];

}