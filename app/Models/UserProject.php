<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProject extends Model
{
    use HasFactory;

    protected $table = 'users_projects';
    protected $fillable = [
        'name',
        'owner_id',
        'is_active',
        'owner_id',
        'deadline_date',
        'assignee_id',
        'assignee_id',
    ];
}
