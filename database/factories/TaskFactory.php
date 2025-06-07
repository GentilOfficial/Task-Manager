<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $statuses = ['todo', 'in_progress', 'done'];

        return [
            'title' => $this->faker->sentence(4),
            'description' => $this->faker->paragraph(),
            'project_id' => null,
            'starting_date' => $this->faker->optional()->dateTimeBetween('now', '+1 month'),
            'status' => $this->faker->randomElement($statuses),
        ];
    }
}
