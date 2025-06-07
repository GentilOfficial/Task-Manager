<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectAssignment extends Model
{
    protected $fillable = [
        'project_id',
        'assignable_id',
        'assignable_type',
        'role_id'
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function assignable()
    {
        return $this->morphTo();
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
