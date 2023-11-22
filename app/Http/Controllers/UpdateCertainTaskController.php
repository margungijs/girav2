<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class UpdateCertainTaskController extends Controller
{
    public function update(Request $request, $id)
    {
        $task = Task::find($id);

        if (!$task) {
            return response()->json(['message' => 'Task not found'], 404);
        }
        $request->validate([
            'description' => 'required|max:100',
            'dueDate' => 'required|date',
            'status' => 'required|string',
            'priority' => 'required|integer|between:1,5',
        ]);

        $task->description = $request->input('description');
        $task->dueDate = $request->input('dueDate');
        $task->status = $request->input('status');
        $task->priority = $request->input('priority');

        $task->save();

        return response()->json(['message' => 'Task updated successfully']);
    }
}
