<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
<<<<<<< HEAD
=======
    //
>>>>>>> 67b5669068c6150229d07afd759cb163e7c3f8e4
    protected $table = 'users_comment';
    public $fillable = ['users_id','commit_content','commit_time','type_id','commit_users_id','say_id'];
    public $timestamps = false;
}
