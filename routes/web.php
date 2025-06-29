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

    Route::prefix('projects')->group(function () {
        Route::get('/', [ProjectController::class, 'index'])->name('projects');

        Route::redirect('/projects/{project}', '/projects/{project}/tasks');

        Route::get('/projects/{project}/tasks', [ProjectController::class, 'showTasks'])->name('project.tasks');
        Route::get('/projects/{project}/users', [ProjectController::class, 'showUsers'])->name('project.users');
        Route::get('/projects/{project}/settings', [ProjectController::class, 'showSettings'])->name('project.settings');
    });

    Route::get('assigned-tasks', [AssignedTasksController::class, 'index'])->name('tasks.assigned');

});

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
