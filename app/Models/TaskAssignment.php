<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TaskAssignment extends Model
{
    protected $fillable = [
        'task_id',
        'assignable_id',
        'assignable_type',
        'role_id'
    ];

    public function task()
    {
        return $this->belongsTo(Task::class);
    }

    public function assignable()
    {
        return $this->morphTo(); // User o Group
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
