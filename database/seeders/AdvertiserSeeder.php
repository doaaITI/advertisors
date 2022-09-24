<?php

namespace Database\Seeders;

use App\Models\Advertiser;
use Database\Factories\AdvertiserFactory;
use Illuminate\Database\Seeder;

class AdvertiserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Advertiser::factory()->count(10)->create();
    }
}
