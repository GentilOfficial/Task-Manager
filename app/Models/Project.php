<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description'];

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function users()
    {
        return $this->morphedByMany(User::class, 'assignable', 'project_assignments')
                    ->withPivot('role_id')
                    ->withTimestamps();
    }

    public function groups()
    {
        return $this->morphedByMany(Group::class, 'assignable', 'project_assignments')
                    ->withPivot('role_id')
                    ->withTimestamps();
    }
}
