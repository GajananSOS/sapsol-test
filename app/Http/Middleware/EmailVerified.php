<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;

class EmailVerified
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $redirectToRoute = null)
    {
        $user = Session::get('user');
        if (!$user || ($user instanceof MustVerifyEmail && !$user->email_verified_at)) {
            if ($user->email_verified_at == null) {
                return Redirect::route('verification.notice');
            }
        }
        // dd($user);
        return $next($request);
    }
}
