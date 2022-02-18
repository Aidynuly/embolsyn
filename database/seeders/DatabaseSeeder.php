<?php

namespace Database\Seeders;

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
        $this->call(CountrySeeder::class);
        $this->call(CitiesSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(ComfortsSeeder::class);
        $this->call(SanatoriumsSeeder::class);
        $this->call(SanatoriumRoomSeeder::class);
    }
}
