<?php

namespace App\Http\Controllers;

use App\Custom\Jwt;
use App\Models\User;
use Illuminate\Http\Request;

class Auth extends Controller
{
    public function auth(Request $request): \Illuminate\Http\JsonResponse
    {
        $user = User::where('email', $request->user['email'])->first();

        if(!$user) {
            return response()->json('not authorized email', 401);
        }

        if(!password_verify($request->user['password'], $user->password)) {
            return response()->json('not authorized password', 401);
        }

        $token = Jwt::create($user);

        return response()->json([
            'token' => $token,
            'user' => [
                'firstName' => $user->name
            ]
        ]);
    }
}
