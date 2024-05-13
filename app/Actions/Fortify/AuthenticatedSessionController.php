<?php

namespace App\Http\Controllers\Auth;

use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController as FortifyAuthenticatedSessionController;
use Illuminate\Http\Request;

class AuthenticatedSessionController extends FortifyAuthenticatedSessionController
{
    /**
     * Where to redirect users after login.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    protected function redirectTo(Request $request)
    {
        return '/admin';
    }
}
