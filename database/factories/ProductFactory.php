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
            'name' => fake()->words(2, true),
            'supplier_id' => fake()->numberBetween(1, 10),
            'description' => fake()->text(),
            'image' => fake()->randomElement([
                'eb6umwq1bsBI1PhAM4rGXjMZGCR5Jhkvzrx4JuHa.png',
                'gNeWqGbESfAnyR1TGPsc5LNjPxMRNNOmJpCWg6nv.png',
                'h2JwxrJsSaUDo8KYuKhXuUEgWKADm8xxpybxFyhr.png',
                'kV1SXOFvt6sAI6xE8Q5Q98QX3tDcVibF5X3YAIp0.png',
                'M2jVEDz1IuPAgMW9McmqBsLjeiDyUIyHnCE87Iqa.jpg',
                'vqXlRvGqHJ6uAWtywKKhDyKDeOM4E3tlciPBsmfm.png',
                'WfSMusrQ5Q2QIAh7wP8SBB2Ugn9TMALG1KCFyeaH.png',
            ]),
            'price' => fake()->randomFloat(2, 1, 100),
            'stock' => fake()->numberBetween(1, 100),
        ];
    }
}
