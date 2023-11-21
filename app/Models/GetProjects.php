<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GetProjects extends Model
{
    protected $table = 'projects';

    protected $fillable = [
        'id',
        'projectName',
    ];

    public function tasks()
    {
        return $this->hasMany(Task::class, 'projectId', 'id');
    }
}
