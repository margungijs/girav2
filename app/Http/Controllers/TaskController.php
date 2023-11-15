<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function createSampleTask()
    {
        $task = new Task([
            'title' => 'Sample Task',
            'description' => 'This is a sample task',
            'dueDate' => '2023-12-01',
            'status' => 'pending',
            'priority' => 1,
            'userID' => 1,
            'projectID' => 1,
        ]);

        if ($task->save()) {
            return 'Sample task created successfully!';
        } else {
            return 'Error creating sample task!';
        }
    }
}
