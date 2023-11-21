<?php

namespace App\Http\Controllers;


use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Laravel\Sanctum\PersonalAccessToken;

use Illuminate\Validation\ValidationException;

class TaskController extends Controller
{

    public function index($projectId)
    {
        // Assuming you have a relationship between tasks and projects
        // and 'project_id' is the foreign key in the tasks table
        $tasks = Task::where('projectId', $projectId)->get();

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
  
    public function createTask(Request $request)
    {
        try{
            $token = $request->bearerToken();

            if(!$token){
                return response()->json(['error' => 'Invalid token'], 422);
            }

            $accessToken = PersonalAccessToken::where('token', $token)->first();

            $user = $accessToken->tokenable_id;

            $data = $request->validate([
                'title' => 'required|string|max:50',
                'description' => 'required|string|max:255',
                'dueDate' => 'required|date',
                'status' => 'required|int',
                'projectID' => 'required|int|min:1',
                'priority' => 'required|int|min:1'
            ]);

            $data['userID'] = $user;

            Task::create($data);

            return response()->json(['message' => 'Task created!'], 201);
        }catch (ValidationException $e) {
            $errors = $e->validator->getMessageBag()->getMessages();

            $detailedErrors = [];

            foreach ($errors->getMessages() as $field => $messages) {
                $detailedErrors[] = ['field' => $field, 'message' => $messages[0]];
            }

            return response()->json(['error' => 'Validation failed', 'messages' => $detailedErrors], 422);
        }
}
