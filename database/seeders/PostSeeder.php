<?php

namespace Database\Seeders;

use App\Models\Person;
use App\Models\Post;
use App\Models\User;
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
        Post::factory()
            ->count(3)
            // ->for(Person::factory())
            ->forPerson() // Postモデルのpersonリレーションメソッドの利用
            ->create();
    }
}
