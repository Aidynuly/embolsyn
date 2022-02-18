<?php

namespace Database\Seeders;

use App\Models\SanatoriumRoom;
use Illuminate\Database\Seeder;

class SanatoriumRoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SanatoriumRoom::factory()->times(150)->create();
    }
}
