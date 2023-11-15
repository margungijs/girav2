<?php
namespace App\Http\Controllers;

use App\Models\GetProjects;
use Illuminate\Http\Request;

class GetProjectsController extends Controller
{
    public function fetchProjects()
    {
        $data = GetProjects::all();

        return response()->json($data);
    }
}