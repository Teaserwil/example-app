<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function assignee(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
