<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 'lastname', 'gender', 'email', 'username', 'password', 'role_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role() {
        return $this->belongsTo('App\Role');
    }

    public function employer() {
        return $this->hasOne('App\Employer');
    }

    public function alumni() {
        return $this->hasOne('App\Alumni');
    }

    public function admin() {
        return $this->hasOne('App\Admin');
    }

    public function getRoleId() {
        return $this->role_id;
    }
}
