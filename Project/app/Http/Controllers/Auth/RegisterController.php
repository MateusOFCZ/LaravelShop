<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register(RegisterRequest $request, User $user)
    {        
        $Register = $request->only('first_name', 'last_name', 'email', 'password');
        $Register['password'] = Hash::make($Register['password']);

        if(!$user = $user->create($Register)) abort(500, 'Error on Register');

        return response()->json([
            'data' => [
                'user' => $user
            ]
        ]);
    }
}
