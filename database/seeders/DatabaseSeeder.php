<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Book;
use App\Models\Comment;
use App\Models\Feature;
use App\Models\User;
use App\Models\Vote;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users = User::factory(250)->create();

        Feature::factory(60)->create()->each(function ($feature) use ($users) {
            $feature->comments()->createMany(
                Comment::factory(rand(1, 50))->make()->each(function ($comment) use ($users) {
                    $comment->user_id = $users->random()->id;
                })->toArray()
            );

            $feature->votes()->createMany(
                Vote::factory(rand(0, 250))->make()->each(function ($vote) use ($users) {
                    $vote->user_id = $users->random()->id;
                })->toArray()
            );
        });
    }
}
