<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    protected $model = User::class;
    
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'city_id'   => random_int(1,4),
            'code'      =>  1111,
            'phone'     =>  $this->faker->numerify('###########'),
            'token'     =>  mb_strtoupper(Str::random(40)),
            'name' => $this->faker->name(),
            'surname'   =>  $this->faker->name(),
            'phone_verified_at' => now(),
            'password' => '$2y$10$obichEfVleggSqZ9r.KM3OCBTpHsZl1eaRMOQUkpNVYPX4MQCmYla', // password
            'created_at'    =>  now(),
            'updated_at'    =>  now(),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
