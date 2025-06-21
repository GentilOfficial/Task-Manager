<?php

use App\Http\Controllers\GroupController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\AssignedTasksController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::get('groups', [GroupController::class, 'index'])->name('groups.user');

    Route::get('projects', [ProjectController::class, 'index'])->name('projects');
    Route::get('projects/{project}', [ProjectController::class, 'show'])->name('project.show');

    Route::get('assigned-tasks', [AssignedTasksController::class, 'index'])->name('tasks.assigned');
});

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
