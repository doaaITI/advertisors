<?php

namespace Database\Factories;

use App\Models\Advertise;
use Illuminate\Database\Eloquent\Factories\Factory;

class AdvertiseFactory extends Factory
{
    protected $model = Advertise::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */

    public function definition()
    {
        $int= mt_rand(1262055681,1262055681);
        return [
            'title'=>$this->faker->text($maxNbChars = 50),
            'type'=> rand(0, 1) ? 'free' : 'paid',
            'description'=>$this->faker->text,
            'category_id'=>rand(1,10),
            'advertiser_id'=>rand(1,10),
            'start_date'=>date("Y-m-d H:i:s",$int)
        ];
    }
}
