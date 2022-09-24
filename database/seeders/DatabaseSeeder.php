<?php

namespace Database\Seeders;

use App\Models\AdvertiseTag;
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
        $this->call(CategorySeeder::class);
        $this->call(TagsSeeder::class);
        $this->call(AdvertiserSeeder::class);
        $this->call(AdvertiseSeeder::class);
        $this->call(AdvertiseTagSeeder::class);





    }
}
