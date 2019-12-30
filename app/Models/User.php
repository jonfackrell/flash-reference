<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getFirstNameAttribute() {
        return explode(' ', $this->name)[0];
    }

    public function getLastNameAttribute() {
        return last(explode(' ', $this->name));
    }

    /**
     * The institutions that the user belongs to.
     */
    public function institutions()
    {
        return $this->belongsToMany(Institution::class);
    }

    public function getRolesAttribute($value) {
        return explode('|', $value);
    }

    public function setRolesAttribute($value) {
        if(is_array($value)){
            $this->attributes['roles'] = implode('|', $value);
        }else{
            $this->attributes['roles'] = '';
        }

    }

    /**
     * Determine whether the user is an instructor.
     */
    public function isInstructor()
    {
        return in_array(['Instructor'], $this->roles);
    }


}
