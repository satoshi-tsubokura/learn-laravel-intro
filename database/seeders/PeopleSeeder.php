<?php

namespace Database\Seeders;

use App\Models\Person;
use App\Models\Post;
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
        // Person::factory()
        //     ->has(Post::factory()->count(rand(1, 5)))
        //     ->count(5)
        //     ->create();

        Person::factory()
            ->hasPosts(3) // Personのpostsリレーションメソッドを利用
            ->create();
    }
}
