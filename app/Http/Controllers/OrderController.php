<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Requests\OrderRequest;

/**
 * Class OrderController
 * @package App\Http\Controllers
 */
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orderspag = Order::paginate();
        $orders = [];
        foreach ($orderspag as $order) {
            $orders[] = $this->getFullOrder($order);
        }
        //$orders= [];

        // <td>{{ $order['id'] }}</td>
        // <td>{{ $order['order_code'] }}</td>
        // <td>{{ $order['client_adress'] }}</td>
        // <td>{{ $order['client_name'] }}</td>
        // <td>{{ $order['total_price'] }}</td>
        // <td>{{ $order['payment_method'] }}</td>
        // <td>{{ $order['date'] }}</td>
        // <td>{{ $order['order_pdf'] }}</td>
        return view('admin.order.index', compact('orders', 'orderspag'))
            ->with('i', (request()->input('page', 1) - 1) * $orderspag->perPage());
    }
    //TODO CHECK ERROR CASES
    public function getFullOrder($order)
    {
        return [
            'id' => $order->id,
            'reference' => $order->reference,
            'total_price' => $order->total_price,
            'client_name' => $order->first_name." ".$order->last_name,
            'client_dni' => $order->client->dni,
            'client_email' => $order->client->email,
            'client_phone_number' => $order->client->phone_number,
            'client_adress' => $order->client->adress,
            'client_zip_code' => $order->client->zip_code,
            'client_city' => $order->client->city,
            'client_coutry' => $order->client->country,
            'payment_method' => $order->payment_method,
            'date' => $order->date,
            'status' => $order->status->name,
            'pdf' => $order->pdf,
            'tracking_id' => $order->pdf
        ];
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $order = new Order();
        return view('admin.order.create', compact('order'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OrderRequest $request)
    {
        Order::create($request->validated());

        return redirect()->route('orders.index')
            ->with('success', 'Order created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $order = Order::find($id);

        return view('admin.order.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $order = Order::find($id);

        return view('admin.order.edit', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OrderRequest $request, Order $order)
    {
        $order->update($request->validated());

        return redirect()->route('orders.index')
            ->with('success', 'Order updated successfully');
    }

    public function destroy($id)
    {
        Order::find($id)->delete();

        return redirect()->route('orders.index')
            ->with('success', 'Order deleted successfully');
    }
}
