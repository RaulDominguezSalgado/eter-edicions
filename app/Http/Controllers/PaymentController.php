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
use Exception;

class PaymentController extends Controller
{

    function payment(Request $request)
    {
        $order = Order::where("reference", 'LIKE', $request->orderId)->first();
        $order->update(['shipment_taxes' => $request->input('shipment_taxes')]);

        switch ($request->payment_method) {
            case "paypal":
                $order = $this->saveStatusOrder($request->orderId, -1, "paypal");
                $provider = new PayPalClient();
                $provider->setApiCredentials(config('paypal'));
                $paypalToken = $provider->getAccessToken();
                $provider->setCurrency('EUR');
                $response = $provider->createOrder([
                    "intent" => "CAPTURE",
                    "application_context" => [
                        "return_url" => route('payment.success', ['orderId' => $request->orderId]),
                        "cancel_url" => route('payment.cancel', ['orderId' => $request->orderId]),
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
                    return redirect()->route('payment.cancel');
                }
                break;
            case "wire":
                $order= $this->saveStatusOrder($request->orderId, 2,"wire");

                $iban = \App\Http\Controllers\GeneralSettingController::getSetting('iban')->value;
                if (!$iban) {
                    return redirect()->route('payment.cancel', ['orderId' => $request->orderId])->with('error', __("This payment method is currently unavailable. Please choose another one."));
                }
                // dd($iban);

                $this->generateOrderPdf($order, $iban);
                Mail::to($order->email)->send(new OrderCompleted($order, $iban));
                Cart::instance("default")->destroy();
                return view('public.purchaseCompleted', compact('order', 'iban'));
                break;
            default:
                $message = "Payment method not implemented.\nPlease select another payment method";
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
        //             "return_url" => route('payment.success', ['orderId' => $request->orderId]),
        //             "cancel_url" => route('payment.cancel', ['orderId' => $request->orderId]),
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
        //         return redirect()->route('payment.cancel');
        //     }
        // } else {
        //     $message = "Payment method not lp.\nPlease select another payment method";
        //     return redirect()->back()->with('error', $message);
        // }
    }


    function success(Request $request)
    {

        try {
            $provider = new PayPalClient();
            $provider->setApiCredentials(config('paypal'));
            $paypalToken = $provider->getAccessToken();
            $provider->setCurrency('EUR');
            $response = $provider->capturePaymentOrder($request->token);

            if (isset($response['status']) && $response['status'] == "COMPLETED") {
                $order = $this->saveStatusOrder($request->orderId, 3);

                $this->generateOrderPdf($order);
                Mail::to($order->email)->send(new OrderCompleted($order));
                Cart::instance("default")->destroy();

                return view('public.purchaseCompleted', compact('order'));
            } else {
                return redirect()->route('payment.cancel', ['orderId' => $request->orderId]);
            }
        } catch (Exception $e) {
            return redirect()->route('payment.cancel', ['orderId' => $request->orderId])->with('error', $e->getMessage());
        }
    }

    function cancel(Request $request)
    {
        $this->saveStatusOrder($request->orderId, 6);
        return redirect()->route('checkout.toPaymentFromCancelled', ['orderId' => $request->orderId])->with('error', __('checkout.payment-error'));
    }

    public function generateOrderPdf($order, $iban = null)
    {
        try {
            // Obtener la orden y sus detalles

            // Crear una nueva instancia de Dompdf
            $pdf = new Dompdf();
            $options = new Options();
            $options->set('isHtml5ParserEnabled', true);
            $pdf->setOptions($options);

            // HTML para el ticket de la orden
            $html = view('public.order_pdf', compact('order', 'iban'))->render();

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
        } catch (Exception $e) {
            return redirect()->route('checkout.toPaymentFromCancelled', ['orderId' => $order->id])->with('error', __('errors.unknown-error'));
        }
    }

    private function saveStatusOrder($reference, $statusId = -1, $paymentMethod = null)
    {
        $order = Order::where("reference", 'LIKE', $reference)->first();

        if ($paymentMethod != null) {
            $order->payment_method = $paymentMethod;
        }
        if ($statusId != -1) {
            $order->status_id = $statusId;
            $orderStatusHistory = new OrderStatusHistory();
            $orderStatusHistory->order_id = $order->id;
            $orderStatusHistory->status_id = $order->status_id;
            $orderStatusHistory->save();
        }
        $order->save();


        return $order;
    }
}
