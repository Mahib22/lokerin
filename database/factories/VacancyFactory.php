<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class VacancyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'company' => $this->faker->company,
            'location' => $this->faker->city,
            'description' => $this->faker->paragraph,
            'user_id' => User::factory()->create(['role' => 'client']),
        ];
    }
}
