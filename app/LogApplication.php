<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LogApplication extends Model
{
    protected $fillable = [
    	'application_id', 'status',
    ];
}
