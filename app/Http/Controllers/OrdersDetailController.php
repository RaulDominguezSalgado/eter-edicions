<?php

namespace App\Http\Controllers;

use App\Models\OrdersDetail;
use App\Http\Requests\OrderDetailRequest;

/**
 * Class OrdersDetailController
 * @package App\Http\Controllers
 */
class OrdersDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ordersDetails = OrdersDetail::paginate();

        return view('orders-detail.index', compact('ordersDetails'))
            ->with('i', (request()->input('page', 1) - 1) * $ordersDetails->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ordersDetail = new OrdersDetail();
        return view('orders-detail.create', compact('ordersDetail'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OrderDetailRequest $request)
    {
        OrdersDetail::create($request->validated());

        return redirect()->route('orders-details.index')
            ->with('success', 'OrdersDetail created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $ordersDetail = OrdersDetail::find($id);

        return view('orders-detail.show', compact('ordersDetail'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $ordersDetail = OrdersDetail::find($id);

        return view('orders-detail.edit', compact('ordersDetail'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OrderDetailRequest $request, OrdersDetail $ordersDetail)
    {
        $ordersDetail->update($request->validated());

        return redirect()->route('orders-details.index')
            ->with('success', 'OrdersDetail updated successfully');
    }

    public function destroy($id)
    {
        OrdersDetail::find($id)->delete();

        return redirect()->route('orders-details.index')
            ->with('success', 'OrdersDetail deleted successfully');
    }
}
