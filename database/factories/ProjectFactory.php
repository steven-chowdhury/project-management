<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title'=> $this->faker->company().'\'s'.' Project',
            'description'=> $this->faker->sentence(),
            'status'=> $this->faker->randomElement(['open', 'in_progress','completed']),
        ];
    }
}
