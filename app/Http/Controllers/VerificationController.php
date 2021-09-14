<?php

namespace App\Http\Controllers;

use App\Traits\VerifiesEmail;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    use VerifiesEmail;

    protected $redirectTo = '/';

    public function __construct()
    {
        // $this->middleware('auth');
        // $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }


    public function show(Request $request)
    {
        // dd('sdf');
        return $request->session()->get('user')->email_verified_at
            ? redirect('/home')
            : view('auth.verify', [
                'pageTitle' => __('Account Verification')
            ]);
    }
}
