<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class CustomerFactory extends Factory
{
    protected $model = Customer::class;

    public function definition(): array
    {
        return [
            'name'         => $this->faker->name(),
            'city'         => $this->faker->city(),
            'state'        => $this->faker->word(),
        ];
    }
}
