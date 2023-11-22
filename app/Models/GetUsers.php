<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GetUsers extends Model
{
    protected $table = 'users';

    protected $fillable = [
        'id',
        'name',
        'email',
        'created_at',
        'email_verified_at',
    ];
}
