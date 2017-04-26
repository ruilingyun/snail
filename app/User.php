<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Support\Facades\Hash;


class User extends Authenticatable
{
    use Notifiable;
<<<<<<< HEAD
    use EntrustUserTrait;
=======
>>>>>>> 67b5669068c6150229d07afd759cb163e7c3f8e4

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','avatar','confirmed_code'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function setPasswordAttribute($value)
    {

        $this->attributes['password'] = Hash::make($value);
    }

}
