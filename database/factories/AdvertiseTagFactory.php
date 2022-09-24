<?php

namespace Database\Factories;

use App\Models\AdvertiseTag;
use Illuminate\Database\Eloquent\Factories\Factory;

class AdvertiseTagFactory extends Factory
{
    protected $model = AdvertiseTag::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'tag_id'=>rand(1,10),
            'advertise_id'=>rand(1,10)
        ];
    }
}
