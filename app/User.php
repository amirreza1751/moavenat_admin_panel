<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'lname', 'student_number'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function standard()
    {
        return $this->hasMany('App\standard', 'user_id');
    }
    public function role()
    {
        return $this->belongsTo('App\Role');
    }

    /**
     * defer to the Spatie package for role scope
     */
    public function scopeHasRoles(\Illuminate\Database\Eloquent\Builder $query, $roles)
    {
        return $this->scopeRole($query, $roles);
    }
}
