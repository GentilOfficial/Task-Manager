<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\Group;
use App\Models\User;
use App\Models\Project;
use App\Models\ProjectAssignment;
use App\Models\Task;
use App\Models\TaskAssignment;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Hash;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $roles = collect([
            'manager',
            'collaborator',
            'viewer'
        ])->map(fn ($name) => Role::firstOrCreate(['name' => $name]));

        $groups = Group::factory(3)->create();
        $users = User::factory(10)->create();

        $devUser = User::create([
            'name' => "Development User",
            'email' => "dev@user.com",
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);

        $users->concat([$devUser]);

        $projects = Project::factory(5)->create();

        foreach ($groups as $group) {
            $group->users()->sync($users->random(rand(2, 4))->pluck('id'));
        }

        foreach ($projects as $project) {

            foreach ($groups->random(rand(1, 2)) as $group) {
                ProjectAssignment::create([
                    'project_id'      => $project->id,
                    'assignable_id'   => $group->id,
                    'assignable_type' => Group::class,
                    'role_id'         => $roles->random()->id,
                ]);
            }

            foreach ($users->random(rand(2, 3)) as $user) {
                ProjectAssignment::create([
                    'project_id'      => $project->id,
                    'assignable_id'   => $user->id,
                    'assignable_type' => User::class,
                    'role_id'         => $roles->random()->id,
                ]);
            }

            $tasks = Task::factory(rand(3, 6))->create([
                'project_id' => $project->id,
            ]);

            foreach ($tasks as $task) {

                $assignedUsers = $project->users->random(rand(1, 2));
                foreach ($assignedUsers as $user) {
                    TaskAssignment::create([
                        'task_id'         => $task->id,
                        'assignable_id'   => $user->id,
                        'assignable_type' => User::class,
                        'role_id'         => $roles->random()->id,
                    ]);
                }

                if ($project->groups->count() > 0 && rand(0, 1)) {
                    $assignedGroups = $project->groups->random(1);
                    foreach ($assignedGroups as $group) {
                        TaskAssignment::create([
                            'task_id'         => $task->id,
                            'assignable_id'   => $group->id,
                            'assignable_type' => Group::class,
                            'role_id'         => $roles->random()->id,
                        ]);
                    }
                }
            }
        }
    }
}
