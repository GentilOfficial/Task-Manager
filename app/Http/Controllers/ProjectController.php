<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Auth;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('projects/Projects', [
            'owned' => Inertia::defer(fn () => Auth::user()->ownedProjects()->with('users')->get()),
            'member' => Inertia::defer(fn () => Auth::user()->projects()->with(['owner', 'users'])->get()),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function showTasks(Project $project)
    {
        return Inertia::render('projects/ProjectDashboard', [
            'project' => $project,
            'users' => Inertia::defer(fn () => $project->users),
            'tasks' => Inertia::defer(fn () => $project->tasks()->with(['assignedTo'])->get())
        ]);
    }

    public function showUsers(Project $project)
    {
        return Inertia::render('projects/ProjectDashboard', [
            'project' => $project,
            'users' => Inertia::defer(fn () => $project->users),
            'tasks' => Inertia::defer(fn () => $project->tasks()->with(['assignedTo'])->get())
        ]);
    }

    public function showSettings(Project $project)
    {
        return Inertia::render('projects/ProjectDashboard', [
            'project' => $project,
            'users' => Inertia::defer(fn () => $project->users),
            'tasks' => Inertia::defer(fn () => $project->tasks()->with(['assignedTo'])->get())
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        //
    }
}
