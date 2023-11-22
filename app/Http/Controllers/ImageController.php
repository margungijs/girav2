<?php

namespace App\Http\Controllers;


use App\Models\UserImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Laravel\Sanctum\PersonalAccessToken;

class ImageController extends Controller
{
    public function setImage(Request $request){
        $token = $request->bearerToken();

        if (!$token) {
            return response()->json(['error' => 'Invalid token'], 422);
        }

        $accessToken = PersonalAccessToken::where('token', $token)->first();

        if(!$accessToken){
            return response()->json(['error' => 'Invalid token'], 422);
        }

        $user = $accessToken->tokenable_id;

        $request->validate([
            'image' => 'required|image|mimes:jpg,png,jpeg,gif|max:2048',
        ], [
            'image.required' => 'Please upload an image.',
            'image.image' => 'The uploaded file must be an image.',
            'image.mimes' => 'The image must be in one of the following formats: jpg, png, jpeg, gif.',
            'image.max' => 'The image may not be greater than 2048 kilobytes.',
        ]);

        $image = $request->file('image');

        $imageName = $user . '_' . time() . '.' . $image->getClientOriginalExtension();

        $image->storeAs('public', $imageName);

        $userImage = UserImage::where('user_id', $user)->first();

        if ($userImage) {
            $previousImage = $userImage->profile_image;
        
            if ($previousImage) {
                $imagePath = storage_path('app/public/' . $previousImage);
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }
        
            $userImage->update(['profile_image' => $imageName]);
        } else {
            UserImage::create(['user_id' => $user, 'profile_image' => $imageName]);
        }

        return response()->json(['response' => asset('storage/' . $imageName)]);
    }
}
