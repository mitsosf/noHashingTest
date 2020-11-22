<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class LoginController extends BaseController
{
    public function authenticate(Request $request)
    {
        $user = User::where('email', $request->get('email'))->where('password', $request->get('password'))->first();
        if (!empty($user)) {
            Auth::login($user);
        }
        return redirect()->intended('dashboard');
    }
}
