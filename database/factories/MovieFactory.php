<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Movie>
 */
class MovieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'id_movie' => fake()->id(),
            'name' => fake()->name(),
            'description' => fake()->description(),
            'poster' => fake()->text(),
            'trailer' => fake()->text()
        ];
    }
}
