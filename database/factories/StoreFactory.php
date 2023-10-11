<?php

namespace Database\Factories;

use App\Models\Store;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class StoreFactory extends Factory
{
    protected $model = Store::class;

    public function definition(): array
    {
        return [
            'address'    => $this->faker->address(),
            'city'       => $this->faker->city(),
            'state'      => $this->faker->word(),
            'postal'     => $this->faker->postcode(),
            'location'   => $this->faker->word(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
