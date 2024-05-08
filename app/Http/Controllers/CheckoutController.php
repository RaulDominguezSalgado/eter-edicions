<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CheckoutRequest;
use App\Models\Order;
use Exception;

class CheckoutController extends Controller
{
    /**
     * Método para el control del acceso al checkout
     * Actualmente solo redirige al primer paso del checkout, pero puede
     * ser usado para controlar el acceso, controlar el carrito...
     */
    public static function index($order=null) {
        // Previous actions
        return view("public.checkout", compact("order"));
    }

    /**
     * Metodo para el control del formulairo antes de proceder al método de pago.
     */
    public static function toPayment(CheckoutRequest $request) {
        $data = $request->validated();
        // dd($data);
        $order = Order::create([
            'date' => date('Y-m-d'),
            'total' => '',
            'reference' => '',
            'dni' => '',
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            "phone_number" => $data['phone_number'],
            "address" => $data['address'],
            "zip_code" => $data['zip_code'],
            "city" => $data['city'],
            "country" => $data['country'],
            'payment_method' => $data['payment_method'],
            'status_id' => '',
            'pdf' => '',
            'tracking_id' => '',
        ]);
    }
}