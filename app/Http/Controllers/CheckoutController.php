<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CheckoutRequest;
use App\Http\Controllers\PayPalController;
use App\Models\Order;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use CodersFree\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Http;
use Exception;

class CheckoutController extends Controller
{
    /**
     * Método para el control del acceso al checkout
     * Actualmente solo redirige al primer paso del checkout, pero puede
     * ser usado para controlar el acceso, controlar el carrito...
     */
    public function index($order = null)
    {
        // Previous actions
        return view("public.checkout", compact("order"));
    }

    /**
     * Metodo para el control del formulairo antes de proceder al método de pago.
     */
    public function toPayment(CheckoutRequest $request)
    {
        //TODO CHECK TRY CATCH
        $data = $request->validated();
        $data['reference'] = $this->generateRandomReference();
        $data['date'] = now()->toDateString();
        $data['status_id'] =1;
        $data['payment_method'] ="Pending";
        // dd($request);

        // $order = Order::create([
        //     'date' => date('Y-m-d'),
        //     'total' => preg_replace('/[,.]+/', '.', $data['total']),
        //     'reference' => $this->generateRandomReference(),
        //     'dni' => $data['dni'],
        //     'first_name' => $data['first_name'],
        //     'last_name' => $data['last_name'],
        //     'email' => $data['email'],
        //     "phone_number" => $data['phone_number'],
        //     "address" => $data['address'],
        //     "zip_code" => $data['zip_code'],
        //     "city" => $data['city'],
        //     "country" => $data['country'],
        //     'payment_method' => $data['payment_method'],
        //     'status_id' => 1,
        // ]);

        $controller = new OrderController();
        $orderId=$controller->saveOrderCheckout($data);
        return redirect()->route('checkout.payment_method', ['orderId' => $orderId]);
        // }
        // else {
        //     return back();
        // }
    }

    function showPaymentMethodView($orderId)
    {
        return view("public.payment",compact('orderId'));
    }
    function generateRandomReference()
    {
        // Obtener la fecha y hora actual
        $fechaHoraActual = now();

        // Formatear la fecha y hora en el formato deseado (año, mes, día, hora, minuto y segundo)
        $cadenaReferencia = $fechaHoraActual->format('YmdHis');

        // Generar una cadena aleatoria de 6 caracteres
        $cadenaAleatoria = '';
        $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $longitud = strlen($caracteres);
        for ($i = 0; $i < 6; $i++) {
            $cadenaAleatoria .= $caracteres[rand(0, $longitud - 1)];
        }

        // Combinar la cadena de referencia con la cadena aleatoria
        $cadenaFinal = $cadenaReferencia . $cadenaAleatoria;

        return $cadenaFinal;
    }
}
