<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\PasswordReset;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
    public function checkEmail(Request $request){
        $email = $request->input('email');

        try {
            $user = User::where('email', $email)->first();

            if (!$user) {
                return response()->json(['error' => 'User with the specified email does not exist.'], 404);
            }

            $token = Str::random(60);

            DB::table('password_resets')->updateOrInsert(
                ['email' => $user->email],
                ['token' => $token, 'created_at' => now()]
            );

            $port = 3000;
            $link = "http://localhost:$port/new-password/$token";

            $mail = Mail::to($user->email)->send(new PasswordReset($link));

            return response()->json(['user' => $mail]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }
}
