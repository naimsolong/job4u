<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $fillable = [
    	'alumni_id', 'employer_id', 'job_id', 'status', 'last_seen',
    ];

    public function alumni() {
    	return $this->belongsTo('App\Alumni');
    }

    public function employer() {
    	return $this->belongsTo('App\Employer');
    }

    public function job() {
    	return $this->belongsTo('App\Job');
    }
}
