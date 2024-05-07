<?php

namespace App\Http\Controllers;

use Srmklive\PayPal\Services\PayPal as PayPalClient;
use CodersFree\Shoppingcart\Facades\Cart;

use Illuminate\Http\Request;

class PaypalController extends Controller
{

    function payment(Request $request)
    {
        $provider = new PayPalClient();
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();
        $provider->setCurrency('EUR');
        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('paypal.success'),
                "cancel_url" => route('paypal.cancel'),
            ],
            "purchase_units" => [
                [
                    "amount" => [
                        "currency_code" => "EUR",
                        "value" => $request->total,
                    ]
                ]
            ]
        ]);
        // dd($response);

        if (isset($response['id']) && $response['id'] != null) {
            foreach ($response['links'] as $link) {
                if ($link['rel'] === 'approve') {
                    return redirect()->away($link['href']);
                }
            }
        } else {
            return redirect()->route('paypal.cancel');
        }
    }
    function success(Request $request)
    {
        $provider = new PayPalClient();
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();
        $provider->setCurrency('EUR');
        $response = $provider->capturePaymentOrder($request->token);
        if(isset($response['status']) && $response['status']=="COMPLETED"){
            Cart::instance("default")->destroy();
            return redirect()->route('cart.view')->with('success', 'Compra realitzada correctament!!');
        }else{
            return redirect()->route('paypal.cancel');
        }
        // dd($response);
    }

    function cancel()
    {
        return redirect()->route('cart.view')->with('error', 'Error en la compra');
    }
}
