<?php

namespace Database\Factories;
use App\Models\OrderStatus;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $statusIds = OrderStatus::pluck('id')->toArray();
        return [
            'reference' => $this->faker->unique()->word,
            'date' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'total' => $this->faker->randomFloat(2, 10, 500),
            'dni' => $this->faker->unique()->numerify('#########'),
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'email' => $this->faker->unique()->safeEmail,
            'phone_number' => $this->faker->phoneNumber,
            'address' => $this->faker->streetAddress,
            'zip_code' => $this->faker->postcode,
            'locality' => $this->faker->city,
            'country' => $this->faker->country,
            'payment_method' => $this->faker->randomElement(['Credit Card', 'PayPal', 'Bank Transfer']),
            'status_id' => $this->faker->randomElement($statusIds),
            'pdf' => $this->faker->unique()->word . '.pdf',
            'tracking_id' => $this->faker->unique()->uuid,
        ];
    }
}
