<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\Feature;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class CommentFactory extends Factory
{
    protected $model = Comment::class;

    public function definition(): array
    {
        $date = $this->faker->dateTimeBetween('-10 years', 'now');

        return [
            'feature_id' => Feature::factory(),
            'user_id' => User::factory(),
            'comment' => $this->faker->sentences(rand(1, 6), true),
            'created_at' => $date,
            'updated_at' => $date,
        ];
    }
}
