<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PeopleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [];
        for ($i = 0; $i <= 10; $i++) {
            $date_time = fake()->dateTimeBetween('-1years', 'now');
            $data[] = [
                'name' => fake()->name,
                'mail' => fake()->safeEmail(),
                'age' => fake()->numberBetween(10, 100),
                'created_at' => $date_time,
                'updated_at' => $date_time,
            ];
        }

        DB::table('people')->insert($data);
    }
}
