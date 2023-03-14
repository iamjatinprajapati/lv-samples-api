<?php

namespace App\Http\Controllers;


use App\Http\Requests\LoginRequest;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        $request->authenticate();

        $user = $request->user();

//        if(!$user->active) {
//            return response()->json([
//                'status' => false,
//                'message' => 'User is inactive'
//            ]);
//        }

        return response()->json([
            'status' => true,
            'message' => 'Login successful',
            'token' => $request->user()->createToken('API TOKEN')->plainTextToken
        ]);
    }
}
