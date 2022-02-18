<?php

namespace Database\Seeders;

use App\Models\Comfort;
use Illuminate\Database\Seeder;

class ComfortsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Comfort::factory()->times(5)->create();
    }
}
