<?php

namespace App\Http\Controllers\HOME;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PersonalController extends Controller
{
    //
    public function personalCenter()
    {
        return view('home.personalCenter');
    }
}
