<?php

namespace Database\Factories;

use App\Models\Person;
use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PersonRoleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'person_id' => Person::factory(),
            'role_id' => Role::factory(),
            'status' => 0
        ];
    }

    public function suspended(): Factory {
        return $this->state(fn(array $attrs) => ['status' => 1]);
    }
}
