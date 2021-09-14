<?php

namespace App\Traits;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\Events\Verified;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

trait VerifiesEmail
{
    // use RedirectsUsers;


    public function verify(Request $request)
    {
        $user = Session::get('user');
        if (!hash_equals((string) $request->route('id'), (string) $user->getKey())) {
            throw new AuthorizationException;
        }

        if (!hash_equals((string) $request->route('hash'), sha1($user->getEmailForVerification()))) {
            throw new AuthorizationException;
        }

        if ($user->hasVerifiedEmail()) {
            return $request->wantsJson()
                ? new JsonResponse([], 204)
                : redirect('/home');
        }

        if ($user->markEmailAsVerified()) {
            event(new Verified($user));
        }



        return $request->wantsJson()
            ? new JsonResponse([], 204)
            : redirect('/home');
    }

    public function resend(Request $request)
    {
        if ($request->session()->get('user')->email_verified_at) {
            return $request->wantsJson()
                ? new JsonResponse([], 204)
                : redirect('/home');
        }

        $user = Session::get('user');
        $user->sendEmailVerificationNotification();

        return $request->wantsJson()
            ? new JsonResponse([], 202)
            : back()->with('resent', true);
    }
}
