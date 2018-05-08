<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
    	'name', 'ssm', 'job_category', 'company_type', 'company_size', 'about_us', 'address_1', 'address_2', 'city', 'postal', 'state', 'country', 'dress_code', 'work_days', 'work_hours', 'website_url', 'verification', 'profile_view',
    ];


    public function employer() {
        return $this->belongsTo('App\Employer');
    }
	
	public function jobs() {
    	return $this->hasMany('App\Job');
    }
}
