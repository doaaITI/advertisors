<?php

namespace Database\Seeders;

use App\Models\Advertise;
use Illuminate\Database\Seeder;

class AdvertiseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Advertise::factory()->count(10)->create();

    }
}
