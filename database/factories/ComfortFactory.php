<?php

namespace Database\Factories;

use App\Models\Comfort;
use Illuminate\Database\Eloquent\Factories\Factory;

class ComfortFactory extends Factory
{
    protected $model = Comfort::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' =>  $this->faker->randomElement(['wifi', 'swimming pool', 'disco', 'telephone', 'tv']),
            'image' =>  $this->faker->imageUrl($width = 640, $height = 480),
        ];
    }
}
