<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'team_id',
        'projectName',
        'description',
        'creationDate',
        'creator',
    ];

    public function scopeByTeam($query, $teamId)
    {
        return $query->where('team_id', $teamId);
    }
}
