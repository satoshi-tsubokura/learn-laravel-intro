<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {   
        $person_ids = [1, 3, 5, 7, 10, 12];
        $rand_person_id = array_rand($person_ids);
        DB::table('posts')->insert([
            'person_id' => $person_ids[$rand_person_id],
            'title' => fake()->word(),
            'body' => fake()->realText(255),
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
