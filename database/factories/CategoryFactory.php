<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $fake = fake('id_ID');

        return [
            'id' => $fake->unique()->numerify('K##########'),
            'name' => $fake->word(),
            'status'=> $fake->randomElement([0,1]),
        ];
    }
}
