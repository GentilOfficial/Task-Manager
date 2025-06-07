<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    public function tasks()
    {
        return $this->morphToMany(Task::class, 'assignable', 'task_assignments')
                    ->withPivot('role_id')
                    ->withTimestamps();
    }

    public function projects()
    {
        return $this->morphToMany(Project::class, 'assignable', 'project_assignments')
                    ->withPivot('role_id')
                    ->withTimestamps();
    }
}
