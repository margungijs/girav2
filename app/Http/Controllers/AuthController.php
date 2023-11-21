<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;


class AuthController extends Controller
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => 'Input missing', 'details' => $validator->errors()], 422);
        }

        $credentials = $request->only('name', 'password');

        $user = User::where('name', $credentials['name'] ?? '')->first();

        if (!$user) {
            return response()->json(['name' => 'Username not found'], 401);
        }

        if (Auth::attempt($credentials, $request->has('remember'))) {
            $user = Auth::user();

            $tokenValue = Str::random(60);

            $token = $user->createToken($tokenValue)->accessToken;

            return response()->json(['token' => $token, 'custom_token' => $tokenValue], 200);
        }

        return response()->json(['password' => 'Password incorrect'], 401);
    }
}
