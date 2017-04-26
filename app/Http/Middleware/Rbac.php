<?php

namespace App\Http\Middleware;


use Closure;
use GuzzleHttp\Psr7\Request;
use App\User;
use Illuminate\Support\Facades\Route;


class Rbac
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
//        dd(session()->get('adminUserId'));
        $route = Route::current()->uri();
//        $uid=Auth::user()->id;
        $user = User::find(session()->get('adminUserId'));
            if (!$user->can($route)){
                return back();
            }
        return $next($request);
    }
}
