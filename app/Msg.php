<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Msg extends Model
{
<<<<<<< HEAD
=======
    //
>>>>>>> 67b5669068c6150229d07afd759cb163e7c3f8e4
    protected $table = 'msg';
    public $fillable = ['users_id','content','created_at'];
    public $timestamps = false;
}
