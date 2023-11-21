<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UpdatePasswordController extends Controller
{
    public function updatePassword(Request $request){
        try {
            $token = $request->bearerToken();

            if(!$token){
                return response()->json(['error' => 'Invalid token'], 422);
            }

            $resetToken = DB::table('password_resets')->where('token', $token)->first();

            if($resetToken){
                $email = $resetToken->email;

                $user = User::where('email', $email)->first();

                if($user){
                    $newPassword = $request->input('password');
                    $newPasswordc = $request->input('passwordc');

                    if($newPassword === $newPasswordc){
                        $user->update([
                            'password' => Hash::make($newPassword),
                        ]);

                        DB::table('password_resets')->where('token', $token)->delete();

                        return response()->json(['message' => 'Password updated successfully'], 200);
                    }else{
                        return response()->json(['error' => 'Passwords dont match'], 200);
                    }
                } else {
                    return response()->json(['error' => 'User not found'], 404);
                }
            } else {
                return response()->json(['error' => 'Invalid token'], 422);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
