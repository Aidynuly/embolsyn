<?php

namespace Database\Seeders;

use App\Models\Sanatorium;
use Illuminate\Database\Seeder;

class SanatoriumsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sanatorium::factory()->times(50)->create();
    }
}
