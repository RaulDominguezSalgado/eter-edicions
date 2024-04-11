<?php

namespace Database\Seeders;

use App\Models\OrderStatus;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //cancel·lat
        $cancelled = new OrderStatus();
        $cancelled->name = "Cancel·lat";
        $cancelled->color = "#FF0000";
        $cancelled->save();

        //error en el pagament
        $paymenterror = new OrderStatus();
        $paymenterror->name = "Error en el pagament";
        $paymenterror->color = "#B90126";
        $paymenterror->save();


        //pagament pendent
        $paymentpending = new OrderStatus();
        $paymentpending->name = "Pagament pendent";
        $paymentpending->color = "#4E80FF";
        $paymentpending->save();

        //pagat
        $payed = new OrderStatus();
        $payed->name = "Pagat, pendent d'enviament";
        $payed->color = "#19B60C";
        $payed->save();

        //enviat
        $sent = new OrderStatus();
        $sent->name = "Enviat";
        $sent->color = "#0B8B4E";
        $sent->save();


        //entregat
        $delivered = new OrderStatus();
        $delivered->name = "Entregat";
        $delivered->color = "#8A2BE2";
        $delivered->save();

        //retornat
        $returned = new OrderStatus();
        $returned->name = "Retornat";
        $returned->color = "#41007D";
        $returned->save();
    }
}
