<?php
namespace App\Http\Controllers;

use App\Models\GetTasks;
use Illuminate\Http\Request;

class GetTasksController extends Controller
{
    public function fetchData()
    {
        $data = GetTasks::all();

        return response()->json($data);
    }
}