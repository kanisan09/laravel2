<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Blog;
use App\Models\User;

class BlogsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 既存のユーザーがいる場合に、そのIDをランダムに割り当てる
        $userIds = User::pluck('id')->toArray();

        for($i = 0; $i <5; $i++){
            \App\Models\Blog::create([
                'user_id' => $userIds ? fake()->randomElement($userIds) : User::factory()->create()->id,
                'title' => fake()->realText(20),
                'content' => fake()->realText(100),
                'image' => fake()->imageUrl(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
