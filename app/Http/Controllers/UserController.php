<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function Test()
    {
        $user = new User;
        $user->name = 'test';
        $user->email = 'test@example.com';
        $user->password = bcrypt('test');
        $user->save();

        return 'Test worked!';
    }
}
