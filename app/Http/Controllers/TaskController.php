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
    public function createTask(Request $request)
    {
//        $task = new Task([
//            'title' => 'Sample Task',
//            'description' => 'This is a sample task',
//            'dueDate' => '2023-12-01',
//            'status' => 'pending',
//            'priority' => 1,
//            'userID' => 1,
//            'projectID' => 1,
//        ]);
//
//        if ($task->save()) {
//            return 'Sample task created successfully!';
//        } else {
//            return 'Error creating sample task!';
//        }


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
}
