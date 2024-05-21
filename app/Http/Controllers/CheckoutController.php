<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CheckoutRequest;
use App\Utility\ShippingCostsTable;
use App\Http\Controllers\PayPalController;
use App\Models\Order;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use CodersFree\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Http;
use App\Utility\CountriesAndProvinces;
use Exception;

class CheckoutController extends Controller
{
    private $shippingCostsSpanishProvinces;
    private $shippingCostsInternationalCountries;
    private $provinces;
    private $countries;

    public function __construct()
    {
        $countriesAndProvinces = new CountriesAndProvinces();
        $this->provinces = $countriesAndProvinces->provinces;
        $this->countries = $countriesAndProvinces->countries;
        $this->shippingCostsSpanishProvinces = (new ShippingCostsTable)->shippingCostsSpanishProvinces();
        $this->shippingCostsInternationalCountries = (new ShippingCostsTable)->shippingCostsInternationalCountries();
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

        $shipment_tax = 0;

        return view("public.checkout", compact("order", 'shipment_tax', 'locale', 'provinces', 'countries'));
    }

    /**
     * Metodo para el control del formulairo antes de proceder al método de pago.
     */
    public function toPayment(CheckoutRequest $request)
    {

        // dd($request);
        // try {
        //giving default values
        $data = $request->validated();
        $data['reference'] = $this->generateRandomReference();
        $data['date'] = now()->toDateString();
        $data['status_id'] = 1;
        $data['payment_method'] = "pending";
        // $data['shipment_taxes'] =5;

        // dd($data);

        if ($data['country'] == 'ES') {
            if (isset($this->shippingCostsSpanishProvinces[$data['province']])) {
                // dd("province in array");
                $shipment_options = $this->shippingCostsSpanishProvinces[$data['province']];
                $shipment_tax = $shipment_options['standard']['price'];
            } else {
                $shipment_options = $this->shippingCostsSpanishProvinces['ES'];
                $shipment_tax = $shipment_options['standard']['price'];
            }
        } else {
            if (isset($this->shippingCostsInternationalCountries[$data['country']])) {
                $shipment_options = $this->shippingCostsInternationalCountries[$data['country']];
                $shipment_tax = $shipment_options['price'];
            } else {
                $shipment_options = $this->shippingCostsInternationalCountries['default'];
                $shipment_tax = $shipment_options['price'];
            }
        }
        // dd($shipment_options);

        $controller = new OrderController();
        // dd($data);
        $orderId = $controller->saveOrderCheckout($data);
        // return redirect()->route('checkout.payment_method', [
        //     'orderId' => $orderId,
        // ]);

        return view("public.payment", compact('orderId', 'shipment_options', 'shipment_tax'));


        // } catch (Exception $e) {
        //     abort(500, __('errors.unknown-error'));
        // }
    }

    function showPaymentMethodView($orderId)
    {
        $data = Order::where("reference",$orderId)->first();
        if ($data['country'] == 'ES') {
            if (isset($this->shippingCostsSpanishProvinces[$data['province']])) {
                // dd("province in array");
                $shipment_options = $this->shippingCostsSpanishProvinces[$data['province']];
                $shipment_tax = $shipment_options['standard']['price'];
            } else {
                $shipment_options = $this->shippingCostsSpanishProvinces['ES'];
                $shipment_tax = $shipment_options['standard']['price'];
            }
        } else {
            if (isset($this->shippingCostsInternationalCountries[$data['country']])) {
                $shipment_options = $this->shippingCostsInternationalCountries[$data['country']];
                $shipment_tax = $shipment_options['price'];
            } else {
                $shipment_options = $this->shippingCostsInternationalCountries['default'];
                $shipment_tax = $shipment_options['price'];
            }
        }
        return view("public.payment", compact('orderId', 'shipment_options', 'shipment_tax'));
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
