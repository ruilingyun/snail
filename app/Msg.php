<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Msg extends Model
{
    protected $table = 'msg';
    public $fillable = ['users_id','content','created_at'];
    public $timestamps = false;
}
