<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Model;

class Employee extends Model
{
    protected $guarded = ['name'];

    protected $fillable = [
        'event', 'name', 'phone_number', 'password'
    ];

    protected $hidden = [
    	'password', 'remember_token',
    ];

    public function getAuthPassword()
    {
    	return $this->password;
    }
}
