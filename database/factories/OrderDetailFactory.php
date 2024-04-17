<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderDetail>
 */
class OrderDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $ordersIds = Order::pluck('id')->toArray();
        $booksIds = Book::pluck('id')->toArray();
        return [
            'order_id' => $this->faker->randomElement($ordersIds),
            'product_id' =>  $this->faker->randomElement($booksIds),
            'quantity' => $this->faker->numberBetween(1, 10),
            'price_each' => $this->faker->randomFloat(2, 5, 100),
        ];
    }
}
