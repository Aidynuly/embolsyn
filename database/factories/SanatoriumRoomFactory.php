<?php

namespace Database\Factories;

use App\Models\SanatoriumRoom;
use Illuminate\Database\Eloquent\Factories\Factory;

class SanatoriumRoomFactory extends Factory
{
    protected $model = SanatoriumRoom::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'sanatorium_id' =>  random_int(1,50),
            'title'         =>  $this->faker->name(),
            'count_adults'  =>  $adults = random_int(1,5),
            'count_children'    =>  $children = random_int(1,3),
            'price'         =>  random_int(10000,100000),
            'count'         =>  $adults + $children,
            'free_places'   =>  $adults + $children,
        ];
    }
}
