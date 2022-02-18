<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class SanatoriumFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'city_id'   =>  random_int(1,4),
            'title'     =>  $this->faker->name(),
            'description'   =>  $this->faker->text(),
            'address'   =>  $this->faker->address(),
            'phone'     =>  $this->faker->numerify('###########'),
            'price'     =>  random_int(10000, 99999),
            'site'      =>  $this->faker->domainName(),
            'email'     =>  $this->faker->email(),
            'password'  =>  '$2y$10$obichEfVleggSqZ9r.KM3OCBTpHsZl1eaRMOQUkpNVYPX4MQCmYla',
            'created_at'    =>  Carbon::now(),
            'updated_at'    =>  Carbon::now(),
        ];
    }
}
