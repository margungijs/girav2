<?php

namespace App\Http\Controllers;

use App\Models\GetProjects;
use App\Models\Task;
use Illuminate\Http\Request;
use Laravel\Sanctum\PersonalAccessToken;

class GetProjectsController extends Controller
{
    public function fetchProjects(Request $request)
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

        $data = GetProjects::with(['tasks' => function ($query) use ($user) {
            $query->where('userId', $user);
        }])->whereHas('tasks', function ($query) use ($user) {
            $query->where('userId', $user);
        })->get();

        return response()->json(['data' => $data, 'user' => $user]);
    }
}

