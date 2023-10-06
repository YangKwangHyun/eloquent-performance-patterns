<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Company;
use App\Models\Customer;
use App\Models\Login;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::factory(60)->create()->each(fn ($user) => $user->logins()
            ->createMany(Login::factory(500)->make()->toArray())
        );
    }
}
