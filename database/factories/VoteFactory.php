<?php

namespace Database\Factories;

use App\Models\Vote;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class VoteFactory extends Factory
{
    protected $model = Vote::class;

    public function definition(): array
    {
        return [];
    }
}
