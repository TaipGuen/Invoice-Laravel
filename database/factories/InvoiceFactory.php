<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\invoice>
 */
class InvoiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user = User::factory()->create();
        return [
            "userID" => $user->userID,
            "invoice_date" =>$this->faker->date(),
            "due_date" => $this->faker->date(),
            "invoice_amount" => $this->faker->randomFloat(2,3,5),
            "status" => "paid",
            "total" => $this->faker->randomFloat(2,3,5),
            "tax_rate" => $this->faker->randomNumber(2),
            "tax_amount" => $this->faker->randomFloat(2,3,5),
        ];
    }
}
