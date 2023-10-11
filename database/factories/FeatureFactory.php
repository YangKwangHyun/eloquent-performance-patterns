<?php

namespace Database\Factories;

use App\Models\Feature;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class FeatureFactory extends Factory
{
    protected $model = Feature::class;

    public function definition(): array
    {
        $title = $this->faker->randomElement(['Add', 'Fix', 'Improve']).' '.implode(' ', $this->faker->words(rand(2, 5)));

        return [
            'title' => $title,
            'status' => $this->faker->randomElement([
                'Requested',
                'Requested',
                'Requested',
                'Requested',
                'Requested',
                'Requested',
                'Requested',
                'Requested',
                'Requested',
                'Approved',
                'Completed',
                'Completed',
            ]),
        ];
    }
}
