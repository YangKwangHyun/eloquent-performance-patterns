<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Book;
use App\Models\Comment;
use App\Models\Customer;
use App\Models\Device;
use App\Models\Feature;
use App\Models\Post;
use App\Models\Store;
use App\Models\User;
use App\Models\Vote;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $stores = array_map('str_getcsv', file(__DIR__.'/stores.csv'));

        collect($stores)->each(fn($store) => Store::create([
            'address'   => $store[0],
            'city'      => $store[1],
            'state'     => $store[2],
            'postal'    => $store[3],
            'location' => DB::raw('ST_SRID(Point('.$store[4].','.$store[5].'), 4326)'),

        ])
        );
    }
}
