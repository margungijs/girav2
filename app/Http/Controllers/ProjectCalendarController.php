<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GetTasks;

class ProjectCalendarController extends Controller
{
    public function show($projectId)
    {
        $tasks = GetTasks::where('projectID', $projectId)->get();

        return response()->json($tasks);
    }
}
