<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Billing>
 */
class BillingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => \App\Models\User::factory(), // Assuming a User factory exists
            'service' => $this->faker->word(),
            'amount' => $this->faker->randomFloat(2, 0, 1000),
            'billingDate' => $this->faker->date(),
            'status' => $this->faker->randomElement(['paid', 'pending']),
        ];
    }
}
