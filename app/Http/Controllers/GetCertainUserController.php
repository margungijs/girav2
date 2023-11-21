<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GetUsers;
use App\Models\UserImage;
use Laravel\Sanctum\PersonalAccessToken;

class GetCertainUserController extends Controller
{
    public function getCertainUser(Request $request)
    {
        $token = $request->bearerToken();

        if (!$token) {
            return response()->json(['error' => 'Invalid token'], 422);
        }

        $accessToken = PersonalAccessToken::where('token', $token)->first();

        if (!$accessToken) {
            return response()->json(['error' => 'Invalid access token'], 422);
        }

        $user = $accessToken->tokenable_id;

         $userData = GetUsers::where('id', $user)->first();

         $userImage = UserImage::where('user_id', $user)->first();
 
         $responseData = [
             'id' => $userData->id,
             'name' => $userData->name,
             'email' => $userData->email,
             'created_at' => $userData->created_at,
             'profile_image' => $userImage ? asset('storage/' . $userImage->profile_image) : null,
         ];
 
         return response()->json($responseData);
    }
}
