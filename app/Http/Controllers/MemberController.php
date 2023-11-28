<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\User;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    // Other methods...

    public function getMembersByUserId($userId)
    {
        $members = Member::where('user_id', $userId)->get();

        return response()->json(['members' => $members]);
    }
    public function getUsers()
    {
        $users = User::select('id', 'name')->get();

        return response()->json(['users' => $users]);
    }
}
