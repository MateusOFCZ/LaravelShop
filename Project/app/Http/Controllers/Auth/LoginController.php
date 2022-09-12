<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;

class LoginController extends Controller
{
    public function login(LoginRequest $request)
    {
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
