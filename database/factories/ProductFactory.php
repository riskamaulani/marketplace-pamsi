<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->words(3, true),
            'price' => fake()->numberBetween(1000, 10000),
            'description' => fake()->paragraph,
            'image' => fake()->imageUrl(640, 480, 'products', true),
            'status' => fake()->randomElement(['Tersedia', 'Habis']),
            'shop_id' => 'SHP240500000001',
            'order_type' => fake()->randomElement(['pre-order', 'in-stock']),
        ];
    }
}
