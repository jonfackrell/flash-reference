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
        'name', 'email', 'password', 'roles'
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

    /**
     * The courses that belong to the user.
     */
    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    /**
     * The sets that belong to the user.
     */
    public function sets()
    {
        return $this->hasMany(Set::class)->orderBy('name');
    }

    /**
     * The sets that belong to the user.
     */
    public function recentSets()
    {
        return $this->hasMany(Set::class)->orderBy('updated_at', 'DESC')->take(3);
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
     * Get the sets associated with the current institution.
     */
    public function institutionSets($institution)
    {
        return $this->hasMany(Set::class)->where('institution_id', $institution->id)->orderBy('name');
    }

    /**
     * Determine whether the user is an instructor.
     */
    public function isInstructor()
    {
        return count(array_intersect(['Instructor'], $this->roles));
    }

    /**
     * Login LTI user and assign to insitution.
     */
    static function login()
    {
        $user = User::updateOrCreate([
            'email' => request()->get('lis_person_contact_email_primary')
        ], [
            'name' => request()->get('lis_person_name_given') . ' ' . request()->get('lis_person_name_family'),
            'roles' => explode(',', request()->get('roles')),
        ]);

        auth('lti')->login($user);

        return $user;
    }

    /**
     * Add user to institution.
     */
    public function addToInstitution()
    {
        $institution = Institution::whereUuid(request()->get('oauth_consumer_key'), 'consumer_key')->first();
        $this->institutions()->syncWithoutDetaching($institution);

        return $institution;
    }

}
