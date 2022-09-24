<?php

namespace Database\Seeders;

use App\Models\AdvertiseTag;
use Illuminate\Database\Seeder;

class AdvertiseTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AdvertiseTag::factory()->count(10)->create();

    }
}
