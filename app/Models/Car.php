<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    //
    protected $fillable = [
        'event', 'start_number', 'competitor_name', 'car_brand'
    ];
}
