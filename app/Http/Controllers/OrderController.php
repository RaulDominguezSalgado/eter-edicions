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
        $orderspag=Order::paginate();
        $orders = $this->getFullOrder($orderspag);
        //$orders= [];

        // <td>{{ $order['id'] }}</td>
        // <td>{{ $order['order_code'] }}</td>
        // <td>{{ $order['client_adress'] }}</td>
        // <td>{{ $order['client_name'] }}</td>
        // <td>{{ $order['total_price'] }}</td>
        // <td>{{ $order['payment_method'] }}</td>
        // <td>{{ $order['date'] }}</td>
        // <td>{{ $order['order_pdf'] }}</td>
        return view('order.index', compact('orders','orderspag'))
            ->with('i', (request()->input('page', 1) - 1) * $orderspag->perPage());
    }
    public function getFullOrder($orders){
        $ordersArray=[];
        foreach ($orders as $order) {
            $ordersArray[] = [
                'id' => $order->id,
                'reference' => $order->reference,
                'client_name' => $order->client->name,
                'total_price' => $order->total_price,
                'payment_method' => $order->payment_method,
                'date' => $order->date,
                'order_pdf' => $order->pdf
            ];
        }
        return $ordersArray;
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $order = new Order();
        return view('order.create', compact('order'));
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

        return view('order.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $order = Order::find($id);

        return view('order.edit', compact('order'));
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
