<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Requests\OrderRequest;
use App\Models\Book;
use App\Models\OrderDetail;
use App\Models\OrderStatus;
use App\Models\OrderStatusHistory;

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
        $orderResult = [
            'id' => $order->id,
            'reference' => $order->reference,
            'total' => $order->total,
            'first_name' => $order->first_name,
            'last_name' => $order->last_name,
            'dni' => $order->dni,
            'email' => $order->email,
            'phone_number' => $order->phone_number,
            'address' => $order->address,
            'zip_code' => $order->zip_code,
            'city' => $order->city,
            'country' => $order->country,
            'payment_method' => $order->payment_method,
            'date' => $order->date,
            'status' => $order->status->name,
            'pdf' => $order->pdf,
            'tracking_id' => $order->tracking_id
        ];
        foreach ($order->details as $details) {
            $orderResult['products'][$details->book->id] = [
                "book_id" => $details->book->id,
                "name" => $details->book->title,
                "price_each" => $details->price_each,
                "quantity" => $details->quantity
            ];
        }
        //dd($orderResult);

        return $orderResult;
    }

    public function getTotalPrice($orderDetails)
    {
        $totalPrice = 0;
        foreach ($orderDetails as $productData) {
            if ($productData['quantity'] > 0) {
                $totalPrice += $productData['quantity'] * $productData['price_each'];
            }
        }
        return $totalPrice;
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $order = new Order();
        $books = Book::all();
        $statuses = OrderStatus::all();
        return view('admin.order.create', compact('order', 'books', 'statuses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OrderRequest $request)
    {
        $orderDetails = $request->input('products');
        //return dd($request);
        $request['total'] = $this->getTotalPrice($orderDetails);
        $order = Order::create($request->validated());
        if ($request->has('products')) {
            foreach ($orderDetails as $productId => $productData) {
                if ($productData['quantity'] > 0) {
                    $orderDetail = new OrderDetail([
                        'product_id' => $productId,
                        'quantity' => $productData['quantity'],
                        'price_each' => $productData['price_each'],
                    ]);
                    $order->details()->save($orderDetail);
                }
            }
        }
        $order->statusHistory()->save(new OrderStatusHistory([
            'order_id' => $order['id'],
            'status_id' => $order['status_id']
        ]));

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
        $order = $this->getFullOrder(Order::find($id));
        $books = Book::all();
        $statuses = OrderStatus::all();
        return view('admin.order.edit', compact('order', 'statuses', 'books'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OrderRequest $request, Order $order)
    {
        $order->update($request->validated());

        // Actualiza los detalles de la orden
        foreach ($request->products as $productId => $productData) {
            if ($productData["quantity" > 0]) {
                $orderDetail = OrderDetail::where('order_id', $order->id)
                    ->where('product_id', $productId)
                    ->first();

                if ($orderDetail) {
                    $orderDetail->update([
                        'quantity' => $productData['quantity'],
                        'price_each' => $productData['price_each'],
                    ]);
                } else {
                    OrderDetail::create([
                        'order_id' => $order->id,
                        'product_id' => $productId,
                        'quantity' => $productData['quantity'],
                        'price_each' => $productData['price_each'],
                    ]);
                }
            }
        }

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
