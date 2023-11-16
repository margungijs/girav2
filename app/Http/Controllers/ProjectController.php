<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index($teamId)
    {
        $projects = Project::byTeam($teamId)->get();

        return response()->json(['projects' => $projects]);
    }
    public function show($projectId)
    {
        $project = Project::find($projectId);

        if (!$project) {
            return response()->json(['error' => 'Project not found'], 404);
        }

        return response()->json(['project' => $project]);
    }

}
