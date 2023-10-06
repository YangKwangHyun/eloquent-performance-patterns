<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::factory()->create(['name' => 'Ted Bossman', 'is_owner' => true]);
        User::factory()->create(['name' => 'Sarah Seller']);
        User::factory()->create(['name' => 'Chase Indeals']);

        User::all()->each(fn ($user) => $user->customer()
            ->createMany(Customer::factory(15)->make()->toArray())
        );
    }
}
