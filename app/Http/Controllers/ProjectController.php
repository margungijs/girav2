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
    public function store(Request $request)
    {
        $request->validate([
            'projectName' => 'required|string|max:255',
            'description' => 'required|string',
            'creator' => 'required|string|max:255',
            'team_id' => 'required|integer',
        ]);

        $project = Project::create([
            'projectName' => $request->input('projectName'),
            'description' => $request->input('description'),
            'creationDate' => now(),
            'creator' => $request->input('creator'),
            'team_id' => $request->input('team_id'),
        ]);

        return response()->json(['message' => 'Project created successfully', 'project' => $project], 201);
    }

}
