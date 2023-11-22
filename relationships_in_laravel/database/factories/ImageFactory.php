<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $noteable=[
            \App\Models\User::class,
            \App\Models\Post::class,
        ];

        return [
            'url'=>$this->faker->imageurl($width=640, $height=480),
            'imagable_id'=>$this->faker->numberBetween(1, 10),
            'imagable_type'=>$this->faker->randomElement($noteable),
        ];
    }
}
