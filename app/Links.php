<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Links extends Model
{
    protected $table = 'links';
    public $fillable = ['links_name','link_address'];
    public $timestamps = false;
}
