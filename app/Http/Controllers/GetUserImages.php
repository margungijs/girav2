<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserImage;
use Laravel\Sanctum\PersonalAccessToken;

class GetUserImages extends Controller
{
    public function GetUserImages()
    {
        $userImages = UserImage::all();
        $formattedImages = [];

        foreach ($userImages as $userImage) {
            $formattedImages[] = [
                'id' => $userImage->user_id,
                'profile_image' => $userImage->profile_image
                    ? asset('storage/' . $userImage->profile_image)
                    : null,
            ];
        }

        return response()->json($formattedImages);
    }
}

