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
        DB::table('posts')->insert([
            'people_id' => 1,
            'title' => fake()->word(),
            'body' => fake()->realText(255),
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
