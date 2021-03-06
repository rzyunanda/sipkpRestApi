<?php

namespace App\Models;


use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;
use Laravel\Passport\HasApiTokens;

class User extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    public function setPasswordAttribute($value)
    {
        if ($value) {
            $this->attributes['password'] = app('hash')->make($value);
        }
    }

    public function findForPassport($username){
        return $user = (new User)->where('email', $username)->orWhere('username', $username)->first();
    }



    public function staff()
    {
        return $this->hasOne('App\Models\Staff','id');
    }

    public function students()
    {
        return $this->hasOne('App\Models\Students','id');
    }

    public function lectures()
    {
        return $this->hasOne('App\Models\Lectures','id');
    }




    
}
