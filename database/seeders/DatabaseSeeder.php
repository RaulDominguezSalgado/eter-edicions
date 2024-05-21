<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\OrderStatus;
use Illuminate\Database\Seeder;


/* Seeders */
use Database\Seeders\BookSeeder;
use Database\Seeders\CollectionSeeder;
use Database\Seeders\CollaboratorSeeder;
use Database\Seeders\AuthorSeeder;
use Database\Seeders\TranslatorSeeder;
use Database\Seeders\OrderSeeder;
use Database\Seeders\PostSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\LanguageSeeder;
use Database\Seeders\GeneralSettingSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(LanguageSeeder::class);

        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);

        $this->call(CollaboratorSeeder::class);
        $this->call(AuthorSeeder::class);
        $this->call(TranslatorSeeder::class);
        // $this->call(IllustratorSeeder::class);

        $this->call(CollectionSeeder::class);
        $this->call(BookSeeder::class);

        $this->call(PostSeeder::class);

        $this->call(BookstoreSeeder::class);
        $this->call(BookBookstoreSeeder::class);

        $this->call(PageSeeder::class);

        $this->call(OrderStatusSeeder::class);
        Order::factory(10)->create();
        OrderDetail::factory(50)->create();

        $this->call(GeneralSettingSeeder::class);
    }
}
