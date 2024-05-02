<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\OrderFirstStepRequest;


class CheckoutController extends Controller
{
    /**
     * Método para el control del acceso al checkout
     * Actualmente solo redirige al primer paso del checkout, pero puede
     * ser usado para controlar el acceso, controlar el carrito...
     */
    public function index($cart = []) {
        
        return $this->first_step($cart);
    }

    /**
     * Método para mostrar el primer formulario del checkout
     */
    public function first_step($cart=[]) {
        return view('public.checkout', compact('cart'));
    }


    public function second_step(OrderFirstStepRequest $request) {
        /**
         * 'dni',
         * 'first_name',
         * 'last_name',
         * 'email',
         * "phone_number",
         */

    }
}