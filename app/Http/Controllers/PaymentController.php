<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use CodersFree\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Http\Requests\CheckoutRequest;
use App\Models\OrderStatusHistory;
use Dompdf\Dompdf;
use Dompdf\Options;

// Mailling
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderCompleted;

class PaymentController extends Controller
{

    function payment(Request $request)
    {
        $order = Order::where("reference", 'LIKE', $request->orderId)->first();
        switch ($request->payment_method) {
            case "paypal":
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
                                "value" => $order->total,
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
                break;
            case "wire":
                $order = Order::where("reference", 'LIKE', $request->orderId)->first();
                $order->payment_method = "wire";
                $order->save();
                //
                $this->generateOrderPdf($order);
                Mail::to($order->email)->send(new OrderCompleted($order));
                Cart::instance("default")->destroy();
                return view('public.purchaseCompleted', compact('order'));
                break;
            default:
                $message = "Payment method not lp.\nPlease select another payment method";
                return redirect()->back()->with('error', $message);
                break;
        }

        // // dd($request->total);
        // if ($request->payment_method == "paypal") {
        //     $provider = new PayPalClient();
        //     $provider->setApiCredentials(config('paypal'));
        //     $paypalToken = $provider->getAccessToken();
        //     $provider->setCurrency('EUR');
        //     $response = $provider->createOrder([
        //         "intent" => "CAPTURE",
        //         "application_context" => [
        //             "return_url" => route('paypal.success', ['orderId' => $request->orderId]),
        //             "cancel_url" => route('paypal.cancel', ['orderId' => $request->orderId]),
        //         ],
        //         "purchase_units" => [
        //             [
        //                 "amount" => [
        //                     "currency_code" => "EUR",
        //                     "value" => $request->total,
        //                 ]
        //             ]
        //         ]
        //     ]);
        //     // dd($response);

        //     if (isset($response['id']) && $response['id'] != null) {
        //         // dd('isset');
        //         foreach ($response['links'] as $link) {
        //             // dd('response link');
        //             if ($link['rel'] === 'approve') {
        //                 // dd($link['href']);
        //                 return (redirect()->away($link['href']));
        //             }
        //         }
        //     } else {
        //         return redirect()->route('paypal.cancel');
        //     }
        // } else {
        //     $message = "Payment method not lp.\nPlease select another payment method";
        //     return redirect()->back()->with('error', $message);
        // }
    }


    function success(Request $request)
    {

        $provider = new PayPalClient();
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();
        $provider->setCurrency('EUR');
        $response = $provider->capturePaymentOrder($request->token);

        if (isset($response['status']) && $response['status'] == "COMPLETED") {
            $order = Order::where("reference", 'LIKE', $request->orderId)->first();
            $order->status_id = 2;
            $order->payment_method = "paypal";
            $order->save();

            $orderStatusHistory = new OrderStatusHistory();
            $orderStatusHistory->order_id = $order->id;
            $orderStatusHistory->status_id = $order->status_id;
            $orderStatusHistory->save();
            //
            $this->generateOrderPdf($order);
            Mail::to($order->email)->send(new OrderCompleted($order));
            Cart::instance("default")->destroy();
            //dd( $order->details->first()->book->title);
            return view('public.purchaseCompleted', compact('order'));
        } else {
            return redirect()->route('paypal.cancel', ['orderId' => $request->orderId]);
        }
        // dd($response);
    }

    function cancel(Request $request)
    {
        return redirect()->route('checkout.payment_method', ['orderId' => $request->orderId])->with('error', 'Error en la compra');
    }

    public function generateOrderPdf($order)
    {
        // Obtener la orden y sus detalles

        // Crear una nueva instancia de Dompdf
        $pdf = new Dompdf();
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $pdf->setOptions($options);

        // HTML para el ticket de la orden
        $html = view('public.order_pdf', compact('order'))->render();

        // Cargar HTML en Dompdf
        $pdf->loadHtml($html);

        // Renderizar PDF
        $pdf->render();


        // Guardar el PDF en una ubicación específica
        $pdfFilePath = public_path('files/orders/' . $order->reference . '.pdf');
        file_put_contents($pdfFilePath, $pdf->output());

        // Devolver la ruta del archivo guardado
        return $pdfFilePath;
        // Descargar el PDF
        //return $pdf->stream('order.pdf');
    }
}
