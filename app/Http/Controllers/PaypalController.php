<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use CodersFree\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Http\Requests\CheckoutRequest;
use App\Models\OrderStatusHistory;

class PayPalController extends Controller
{

    function payment(Request $request)
    {
        // dd($request->total);
        if ($request->payment_method == "paypal") {
            $provider = new PayPalClient();
            $provider->setApiCredentials(config('paypal'));
            $paypalToken = $provider->getAccessToken();
            $provider->setCurrency('EUR');
            $response = $provider->createOrder([
                "intent" => "CAPTURE",
                "application_context" => [
                    "return_url" => route('paypal.success', ['orderId' => $request->orderId]),
                    "cancel_url" => route('paypal.cancel', ['orderId' => $request->orderId]),
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
                // dd('isset');
                foreach ($response['links'] as $link) {
                    // dd('response link');
                    if ($link['rel'] === 'approve') {
                        // dd($link['href']);
                        return (redirect()->away($link['href']));
                    }
                }
            } else {
                return redirect()->route('paypal.cancel');
            }
        }else{
            $message="Payment method not implemented.\nPlease select another payment method";
            return redirect()->back()->with('error', $message);
        }
    }
    function success(Request $request)
    {

        $provider = new PayPalClient();
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();
        $provider->setCurrency('EUR');
        $response = $provider->capturePaymentOrder($request->token);

        if (isset($response['status']) && $response['status'] == "COMPLETED") {
            $order = Order::where("reference",'LIKE', $request->orderId)->first();
            $order->status_id = 2;
            $order->save();

            $orderStatusHistory = new OrderStatusHistory();
            $orderStatusHistory->order_id = $order->id;
            $orderStatusHistory->status_id = $order->status_id;
            $orderStatusHistory->save();

            Cart::instance("default")->destroy();

            return redirect()->route('cart.view')->with('success', 'Compra realitzada correctament!!');
        } else {
            return redirect()->route('paypal.cancel', ['orderId' => $request->orderId]);
        }
        // dd($response);
    }

    function cancel(Request $request)
    {
        return redirect()->route('checkout.payment_method',['orderId' => $request->orderId])->with('error', 'Error en la compra');
    }
}
