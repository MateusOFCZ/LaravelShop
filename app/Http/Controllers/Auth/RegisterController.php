<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register(Request $request, User $user)
    {
        if(!$request['first_name'] || !$request['last_name'] || !$request['email'] || !$request['password']) abort(401, 'Error on Register');

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
