<?php

namespace Database\Seeders;

use App\Models\Group;
use App\Models\User;
use App\Models\Project;
use App\Models\Task;
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
        $devUser = User::create([
            'name' => "Development User",
            'email' => "dev@user.com",
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);

        $users = User::factory(49)->create();

        $users = $users->prepend($devUser);

        $projects = Project::factory(100)->make()->each(function ($project) use ($users) {
            $project->owner_id = $users->random()->id;
            $project->save();
        });

        foreach ($projects as $project) {
            $project->users()->sync($users->random(rand(2, 20))->pluck('id'));
        }

        foreach ($projects as $project) {

            $randomUsers = $users->random(rand(1, 10));
            $project->users()->sync(collect($randomUsers)->pluck('id'));

            $tasks = Task::factory(rand(5, 10))->create([
                'project_id' => $project->id,
            ]);

            foreach ($tasks as $task) {
                $projectUsers = $project->users;
                $task->assignedTo()->sync(
                    $projectUsers->random(min($projectUsers->count(), rand(1, 5)))->pluck('id')
                );
            }
        }
    }

}
