<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class DurianFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'image' => 'example.jpg',
            'name' => $this->faker->name(),
            'description' => $this->faker->paragraph(),
            'price' => 150000,
            'stock' => random_int(1, 50)
        ];
    }
}
