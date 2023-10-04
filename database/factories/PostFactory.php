<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition(): array
    {
        return [
            'author_id'    => User::factory(),
            'title'        => $this->faker->word(),
            'slug'         => $this->faker->slug(),
            'body'         => $this->faker->word(),
            // published_at is between 2010 and 2023
            'published_at' => $this->faker->dateTimeBetween('-3 years', '+3 years'),
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now(),
        ];
    }
}
