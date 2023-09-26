<?php

namespace Database\Seeders;

use App\Models\Person;
use App\Models\Post;
use App\Models\Role;
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
        // $roles = Role::all();

        // Person::factory()
        //     ->count(3)
        //     ->hasPosts(3) // Personのpostsリレーションメソッドを利用
        //     ->create()
        //     ->each(fn($person) => // 作成済みのPeopleテーブルのレコードそれぞれを操作する
        //         $person // 作成済みのPeopleレコード
        //             ->roles() // roles()リレーション(多対多)
        //             ->attach( // 中間テーブルの値のリレーションのIDを設定する(この場合、people_rolesてーぶるのrole_id)
        //                 $roles->random()->id,
        //                 ['status' => rand(0, 2)] // role_idカラム以外のカラムの値を挿入する。
        //             )
        //     );

        Person::factory()
            ->has(Post::factory()->count(2)->state(
                fn(array $attrs, Person $person) => ['title' => fake()->word() . 'test_title']
            ))
            ->has(Role::factory()->count(2))
            ->create();
    }
}
