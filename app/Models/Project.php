<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'owner_id',
        'is_active',
        'owner_id',
        'deadline_date',
        'assignee_id',
    ];

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id');
    }

    public function assignee(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id');
    }
}
