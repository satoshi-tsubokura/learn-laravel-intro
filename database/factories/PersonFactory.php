<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Person>
 */
class PersonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'mail' => fake()->safeEmail(),
            'age' => random_int(1, 99),
            'created_at' => fake()->dateTimeThisDecade(),
            'updated_at' => now()
        ];
    }
}
