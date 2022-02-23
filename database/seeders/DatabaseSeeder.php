<?php

namespace Database\Seeders;

use App\Models\Room;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // \App\Models\Product::factory(10)->create();
        $this->call([
            UserSeeder::class,
            CategorySeeder::class,
            ProductSeeder::class,
            RoomSeeder::class
        ]);
    }
}