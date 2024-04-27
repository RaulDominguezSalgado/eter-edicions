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
        $randomBookId= $this->faker->randomElement($booksIds);
        $book=  Book::find($randomBookId);
        $pvp =$book->discounted_price??$book->pvp;
        return [
            'order_id' => $this->faker->randomElement($ordersIds),
            'product_id' =>  $randomBookId,
            'quantity' => $this->faker->numberBetween(1, 10),
            'price_each' => $pvp,
        ];
    }
}
