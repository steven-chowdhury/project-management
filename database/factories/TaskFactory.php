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
        static $count = 1;

        return [
            'project_id'=> $this->faker->numberBetween(1, 3),
            'title'=> 'Task'.' '.$count++,
            'description'=> $this->faker->optional()->sentence(),
            'assigned_to'=> $this->faker->optional()->name(),
            'due_date'=> $this->faker->optional()->dateTime(),
            'status'=> $this->faker->randomElement(['to_do','in_progress','done']),
        ];
    }
}
