<?php

namespace Database\Factories;

use App\Models\invoice;
use App\Models\product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\product>
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
            "title" => $this->faker->name,
            "description" => $this->faker->text,
            "price" => $this->faker->randomFloat(1,1,4),
            "rating" => $this->faker->randomFloat(1,2,2),
            "stock" => $this->faker->randomNumber(1),
            "brand" => $this->faker->name,
            "category" => $this->faker->text(),
        ];
    }
}
