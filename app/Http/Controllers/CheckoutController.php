<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CheckoutRequest;
use Exception;

class CheckoutController extends Controller
{
    /**
     * Método para el control del acceso al checkout
     * Actualmente solo redirige al primer paso del checkout, pero puede
     * ser usado para controlar el acceso, controlar el carrito...
     */
    public static function index() {
        // Previous actions
        return view("public.checkout");
    }

    /**
     * Metodo para el control del formulairo antes de proceder al método de pago.
     */
    public static function toPayment(CheckoutRequest $request) {
        $request->validate();
        dd($request);
    }

    /**
     * Método para actualizar el estado de pago de un pedido tras el proceso de pago.
     */
    public function registerPayment() {

    }
}