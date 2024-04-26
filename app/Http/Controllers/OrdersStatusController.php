<?php

namespace App\Http\Controllers;

use App\Models\OrdersStatus;
use App\Http\Requests\OrdersStatusRequest;

/**
 * Class OrdersStatusController
 * @package App\Http\Controllers
 */
class OrdersStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ordersStatuses = OrdersStatus::paginate();

        return view('orders-status.index', compact('ordersStatuses'))
            ->with('i', (request()->input('page', 1) - 1) * $ordersStatuses->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ordersStatus = new OrdersStatus();
        return view('orders-status.create', compact('ordersStatus'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OrdersStatusRequest $request)
    {
        OrdersStatus::create($request->validated());

        return redirect()->route('orders-statuses.index')
            ->with('success', 'OrdersStatus created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $ordersStatus = OrdersStatus::find($id);

        return view('orders-status.show', compact('ordersStatus'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $ordersStatus = OrdersStatus::find($id);

        return view('orders-status.edit', compact('ordersStatus'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OrdersStatusRequest $request, OrdersStatus $ordersStatus)
    {
        $ordersStatus->update($request->validated());

        return redirect()->route('orders-statuses.index')
            ->with('success', 'OrdersStatus updated successfully');
    }

    public function destroy($id)
    {
        OrdersStatus::find($id)->delete();

        return redirect()->route('orders-statuses.index')
            ->with('success', 'OrdersStatus deleted successfully');
    }
}
