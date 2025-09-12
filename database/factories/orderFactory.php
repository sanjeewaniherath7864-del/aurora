<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class orderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // "user_id"=>null,
            // "price"=>fake()->numberBetween(0,1000),
            // "customer_name"=>fake()->userName(),
            // "address"=>fake()->address(),
            // "bank_card_no"=>fake()->creditCardNumber(),
        ];
    }
}
