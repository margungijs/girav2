<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = 'tasks';
    protected $fillable = ['title', 'description', 'dueDate', 'status', 'priority', 'userID', 'projectID'];
    protected $attributes = [
        'dueDate' => null,
    ];
}
