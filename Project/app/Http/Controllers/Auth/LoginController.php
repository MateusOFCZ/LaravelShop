<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use \Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email'     => 'required',
            'password'  => 'required'
        ]);

        $Login = $request->only('email', 'password');
        if(!auth()->attempt($Login)) abort(401, 'Invalid E-mail or Password');

        $Token = auth()->user()->createToken('auth_token');

        return response()->json([
            'data' => [
                'token' => $Token->plainTextToken
            ]
        ]);
    }

    public function logout()
    {
        auth()->user()->currentAccessToken()->delete();
    }
}
