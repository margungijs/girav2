<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GetTasks extends Model
{
    protected $table = 'tasks';

    protected $fillable = [
        'id',
        'title',
        'description',
        'dueDate',
        'status',
        'userID',
        'projectID',
        'priority',
    ];
}