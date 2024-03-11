<?php

namespace Database\Factories;

use App\Models\Invoice;
use App\Models\product;
use App\Models\User;
use Database\Seeders\InvoiceSeeder;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\items>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "invoiceID" => Invoice::factory()->create()->invoiceID,
            "productID" => Product::factory()->create()->productID,
            "amount" => $this->faker->randomFloat(2,2,5),
            "price" => $this->faker->randomFloat(2,2,5),
            "quantity" => $this->faker->randomNumber(4),
        ];
    }
}
