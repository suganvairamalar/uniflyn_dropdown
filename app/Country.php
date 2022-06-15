<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
     protected $fillable = [
        'short_name', 'country_name', 'phone_code'
    ];

    
}
