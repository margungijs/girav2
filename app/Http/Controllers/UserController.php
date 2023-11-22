<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Nette\Schema\ValidationException;
use App\Models\UserImage;

class UserController extends Controller
{
    public function createUser(Request $request)
    {
        try {
            $data = $request->validate([
                'name' => 'required|string|max:50|min:3|unique:users',
                'email' => 'required|email|unique:users|max:62',
                'password' => 'required|string|min:8'
            ]);

            $user = User::create($data);



            $userImage = UserImage::create([
                'user_id' => $user->id,
                'profile_image' => 'default_image.jpg'
            ]);

            return response()->json(['message' => 'Registration successful'], 201);
        } catch (\Exception $e) {
            $errors = $e->validator->getMessageBag();

            $detailedErrors = [];

            foreach ($errors->getMessages() as $field => $messages) {
                $detailedErrors[] = ['field' => $field, 'message' => $messages[0]];
            }

            return response()->json(['error' => 'Validation failed', 'messages' => $detailedErrors], 422);
        }
    }
}
