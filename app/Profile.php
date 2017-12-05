<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Profile extends Model
{
    protected $fillable = [
    	'user_id', 'full_name', 'job', 'degree', 'about', 'phone', 'address', 'city', 'country', 'zip_code', 'dob'
    	];

    protected $dates = [
    	'dob',
    ];
}
