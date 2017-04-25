<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected $table = 'reply';
    public $fillable = ['users_id','say_id','addtime','reply_content','commit_id'];
    public $timestamps = false;
}
