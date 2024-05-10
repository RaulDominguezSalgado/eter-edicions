<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CheckoutRequest;
use App\Http\Controllers\PayPalController;
use App\Models\Order;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use CodersFree\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Http;
use App\Utility\CountriesAndProvinces;
use Exception;

class CheckoutController extends Controller
{

    private $provinces;
    private $countries;

    public function __construct() {
        $countriesAndProvinces= new CountriesAndProvinces();
        $this->provinces = $countriesAndProvinces->provinces;
        $this->countries = $countriesAndProvinces->countries;
    }
    /**
     * Método para el control del acceso al checkout
     * Actualmente solo redirige al primer paso del checkout, pero puede
     * ser usado para controlar el acceso, controlar el carrito...
     */
    public function index(Request $request, $order = null)
    {
        $locale = app()->getLocale();

        if (Cart::instance('default')->content() == []) {

            return redirect()->route("catalog.{$locale}");
        }
        $provinces = $this->provinces;
        $countries = $this->countries;

        return view("public.checkout", compact("order", 'locale', 'provinces', 'countries'));
    }

    /**
     * Metodo para el control del formulairo antes de proceder al método de pago.
     */
    public function toPayment(CheckoutRequest $request)
    {
        try {
            $data = $request->validated();
            $data['reference'] = $this->generateRandomReference();
            $data['date'] = now()->toDateString();
            $data['status_id'] = 1;
            $data['payment_method'] = "Pending";
            // $data['shipment_taxes'] =5;
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
            $orderId = $controller->saveOrderCheckout($data);
            return redirect()->route('checkout.payment_method', [
                'orderId' => $orderId
            ]);
        } catch (Exception $e) {
            abort(500, __('errors.unknown-error'));
        }
    }

    function showPaymentMethodView($orderId)
    {
        return view("public.payment", compact('orderId'));
    }

    /**
     * Generates a reference number for an order.
     * The reference number is comprised by the date when the order is made, in format YmdHis
     * and a random 6 characters string
     */
    function generateRandomReference()
    {
        // Obtener la fecha y hora actual
        $fechaHoraActual = now();

        // Formatear la fecha y hora en el formato deseado (año, mes, día, hora, minuto y segundo)
        $cadenaReferencia = $fechaHoraActual->format('YmdHis');

        // Generar una cadena aleatoria de 6 caracteres
        $cadenaAleatoria = '';
        $caracteres = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $longitud = strlen($caracteres);
        for ($i = 0; $i < 6; $i++) {
            $cadenaAleatoria .= $caracteres[rand(0, $longitud - 1)];
        }

        // Combinar la cadena de referencia con la cadena aleatoria
        $cadenaFinal = $cadenaReferencia . $cadenaAleatoria;

        return $cadenaFinal;
    }
}
