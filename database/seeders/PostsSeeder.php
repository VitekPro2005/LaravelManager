<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i = 0; $i < 10; $i++){
            DB::table('posts')->insert([
                'title' => fake()->realText(10),
                'content' => fake()->realText(1000),
                'category_id' => DB::table('categories')->inRandomOrder()->first()->id,
            ]);
        }

    }
}
