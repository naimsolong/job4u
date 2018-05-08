<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable = [
    	'company_id', 'title', 'position_level', 'job_category', 'location_city', 'location_state', 'salary_min', 'salary_max', 'requirements', 'responsibilities', 'benefits', 'descriptions', 'availability', 'job_view',
    ];

    public function employer() {
    	return $this->belongsTo('App\Employer');
    }
    
    public function company() {
    	return $this->belongsTo('App\Company');
    }

    public function applications() {
        return $this->hasMany('App\Application');
    }
}
