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
}
