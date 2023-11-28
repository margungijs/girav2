<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function getAllTeams()
    {
        $teams = Team::all();

        return response()->json(['teams' => $teams]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'teamName' => 'required|string|max:255',
        ]);

        $team = Team::create([
            'team_name' => $request->input('teamName'),
        ]);

        return response()->json([
            'message' => 'Team created successfully',
            'team' => $team,
            'team_id' => $team->id,
        ], 201);
    }
}
