<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

     protected $fillable = [
        'title',
        'description',
        'project_id',
        'starting_date',
        'ending_date',
        'status'
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function users()
    {
        return $this->morphedByMany(User::class, 'assignable', 'task_assignments')
                    ->withPivot('role_id')
                    ->withTimestamps();
    }

    public function groups()
    {
        return $this->morphedByMany(Group::class, 'assignable', 'task_assignments')
                    ->withPivot('role_id')
                    ->withTimestamps();
    }
}
