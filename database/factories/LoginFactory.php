<?php

namespace Database\Factories;

use App\Models\Login;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class LoginFactory extends Factory
{
    protected $model = Login::class;

    public function definition(): array
    {
        return [
            'ip_address' => $this->faker->ipv4,
            // create_at은 현시점부터 한달 랜덤
            'created_at' => Carbon::now()->subDays(rand(0, 30))->format('Y-m-d H:i:s'),
        ];
    }
}
