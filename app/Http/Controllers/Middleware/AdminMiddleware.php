<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect('/login')->with('error', 'Loged!');
        }
        $user = Auth::user();
        if ($user->email === 'admin@mizone.com') {
            return $next($request);
        }
        return redirect('/')->with('error', 'Eror!');
    }
}