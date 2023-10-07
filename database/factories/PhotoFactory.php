<?php

namespace Database\Factories;

use App\Models\Gallery;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Photo>
 */
class PhotoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     */




    public function definition(): array
    {
        for ($i = 10; $i > 0; $i--) {
            return [
                'url' => fake()->imageUrl(),
                'gallery_id' => Gallery::where('id', $i)->first()->id,
            ];
        }
    }
}
