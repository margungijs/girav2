<?php

namespace App\Http\Controllers;

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

        return response()->json(['message' => 'Image uploaded successfully']);
    }
}
