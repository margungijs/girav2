<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index($projectId)
    {
        // Assuming you have a relationship between tasks and projects
        // and 'project_id' is the foreign key in the tasks table
        $tasks = Task::where('project_id', $projectId)->get();

        return response()->json(['tasks' => $tasks]);
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:To Do,In Progress,Done',
        ]);
        $newStatus = $request->status;

        $task = Task::find($id);

        if (!$task) {
            return response()->json(['error' => 'Task not found'], 404);
        }

        $task->status = $newStatus;
        $task->save();

        return response()->json(['message' => 'Task status updated successfully', 'updatedTask' => $task]);

    }
    public function destroy($id)
    {
        $task = Task::find($id);

        if (!$task) {
            return response()->json(['error' => 'Task not found'], 404);
        }

        $task->delete();

        return response()->json(['message' => 'Task deleted successfully']);
    }
}
