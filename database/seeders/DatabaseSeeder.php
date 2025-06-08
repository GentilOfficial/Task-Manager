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
        $roles = collect(['manager', 'collaborator', 'viewer'])
            ->map(fn($name) => Role::firstOrCreate(['name' => $name]));

        $devUser = User::create([
            'name' => "Development User",
            'email' => "dev@user.com",
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);

        $users = User::factory(49)->create();

        $users = $users->prepend($devUser);

        $groups = Group::factory(20)->create();

        foreach ($groups as $group) {
            $group->users()->sync($users->random(rand(2, 20))->pluck('id'));
        }

        $projects = Project::factory(50)->create();

        foreach ($projects as $project) {

            $assignedGroups = $groups->random(rand(0, 5));
            foreach ($assignedGroups as $group) {
                ProjectAssignment::create([
                    'project_id'      => $project->id,
                    'assignable_id'   => $group->id,
                    'assignable_type' => Group::class,
                    'role_id'         => $roles->random()->id,
                ]);
            }

            $assignedUsers = $users->random(rand(1, 10));
            foreach ($assignedUsers as $user) {
                ProjectAssignment::create([
                    'project_id'      => $project->id,
                    'assignable_id'   => $user->id,
                    'assignable_type' => User::class,
                    'role_id'         => $roles->random()->id,
                ]);
            }

            $tasks = Task::factory(rand(5, 10))->create([
                'project_id' => $project->id,
            ]);

            $projectUsers = $project->users;
            $projectGroups = $project->groups;

            foreach ($tasks as $task) {
                $assignedUserCount = rand(0, 5);
                $assignedGroupCount = rand(0, 5);

                if ($assignedUserCount === 0 && $assignedGroupCount === 0) {
                    $assignedUserCount = 1;
                }

                $usersToAssign = $projectUsers->isNotEmpty()
                    ? $projectUsers->random(min($assignedUserCount, $projectUsers->count()))
                    : collect();

                foreach ($usersToAssign as $user) {
                    TaskAssignment::create([
                        'task_id'         => $task->id,
                        'assignable_id'   => $user->id,
                        'assignable_type' => User::class,
                        'role_id'         => $roles->random()->id,
                    ]);
                }

                $groupsToAssign = $projectGroups->isNotEmpty()
                    ? $projectGroups->random(min($assignedGroupCount, $projectGroups->count()))
                    : collect();

                foreach ($groupsToAssign as $group) {
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
