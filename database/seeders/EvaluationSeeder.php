<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EvaluationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = Post::all();
        foreach($posts as $post) {
            $values[] = [
                'post_id' => $post->id,
                'good' => rand(0, 1000),
                'bad' => rand(0, 1000),
                'created_at' => fake()->dateTimeThisDecade(),
                'updated_at' => now(),
            ];
        };
        DB::table('evaluations')->insert($values);
    }
}
