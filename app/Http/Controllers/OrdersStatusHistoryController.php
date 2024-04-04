<?php

namespace App\Http\Controllers;

use App\Models\OrdersStatusHistory;
use App\Http\Requests\OrdersStatusHistoryRequest;

/**
 * Class OrdersStatusHistoryController
 * @package App\Http\Controllers
 */
class OrdersStatusHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ordersStatusHistories = OrdersStatusHistory::paginate();

        return view('orders-status-history.index', compact('ordersStatusHistories'))
            ->with('i', (request()->input('page', 1) - 1) * $ordersStatusHistories->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ordersStatusHistory = new OrdersStatusHistory();
        return view('orders-status-history.create', compact('ordersStatusHistory'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OrdersStatusHistoryRequest $request)
    {
        OrdersStatusHistory::create($request->validated());

        return redirect()->route('orders-status-histories.index')
            ->with('success', 'OrdersStatusHistory created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $ordersStatusHistory = OrdersStatusHistory::find($id);

        return view('orders-status-history.show', compact('ordersStatusHistory'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $ordersStatusHistory = OrdersStatusHistory::find($id);

        return view('orders-status-history.edit', compact('ordersStatusHistory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OrdersStatusHistoryRequest $request, OrdersStatusHistory $ordersStatusHistory)
    {
        $ordersStatusHistory->update($request->validated());

        return redirect()->route('orders-status-histories.index')
            ->with('success', 'OrdersStatusHistory updated successfully');
    }

    public function destroy($id)
    {
        OrdersStatusHistory::find($id)->delete();

        return redirect()->route('orders-status-histories.index')
            ->with('success', 'OrdersStatusHistory deleted successfully');
    }
}
