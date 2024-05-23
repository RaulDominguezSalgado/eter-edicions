<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Requests\OrderRequest;
use App\Models\Book;
use App\Models\OrderDetail;
use App\Models\OrderStatus;
use App\Models\OrderStatusHistory;
use Exception;
use Spatie\LaravelIgnition\Recorders\DumpRecorder\Dump;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

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
            $orderspag =Order::
            //where('payment_method', '!=', 'pending')->
            paginate();
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
            // 'city' => $order->city,
            'locality' => $order->locality,
            'province' => $order->province,
            'country' => $order->country,
            'payment_method' => $order->payment_method,
            'date' => $order->date,
            'status' => $order->status->name,
            'status_color' => strtolower($order->status->color),
            'pdf' => $order->pdf,
            'tracking_id' => $order->tracking_id
        ];
        foreach ($order->details as $details) {
            $orderResult['products'][$details->book->id] = [
                "id" => $details->book->id,
                "title" => $details->book->title,
                "pvp" => $details->price_each,
                "quantity" => $details->quantity
            ];
        }
        //dd($orderResult['products']);

        return $orderResult;
    }

    public function getTotalPrice($orderDetails)
    {
        $totalPrice = 0;
        foreach ($orderDetails as $productData) {
            if ($productData['quantity'] > 0) {
                if ($productData['pvp'] == 0) {
                    $book = Book::find($productData['id']);
                    $productData['pvp'] = $book->discounted_price != 0 ? $book->discounted_price : $book->pvp;
                }
                $totalPrice += $productData['quantity'] * $productData['pvp'];
            }
        }
        // dump($totalPrice);
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

    // /**
    //  * Store a newly created resource in storage.
    //  */
    // public function store(OrderRequest $request)
    // {
    //     try {
    //         $productIds = array_column($request->input('products'), 'id');
    //         // Contar cuántas veces se repite cada ID
    //         $idCounts = array_count_values($productIds);
    //         //dump($idCounts);

    //         foreach ($idCounts as $id => $count) {
    //             if ($count > 1) {
    //                 // dump("Repeated ID");
    //                 $error = \Illuminate\Validation\ValidationException::withMessages([
    //                     'id' => ['Hi ha productes repetits.'],
    //                 ]);
    //                 throw $error;
    //             }
    //         }

    //         //return dump($request);
    //         $orderDetails = $request->input('products');
    //         //save pdf file
    //         $newFileName = $request['reference'] . ".pdf";
    //         $request->file('pdf')->move(public_path('files/orders'), $newFileName);

    //         //$this->saveFile(,public_path('files/orders'),$newFileName, $request['id']);
    //         //return dd($request);
    //         $validatedData = $request->validated();
    //         $validatedData['pdf'] = $newFileName;

    //         $validatedData['total'] = $this->getTotalPrice($validatedData['products']);
    //         $order = Order::create($validatedData);
    //         if ($request->has('products')) {
    //             foreach ($orderDetails as $i => $productData) {
    //                 if ($productData['quantity'] > 0) {
    //                     if ($productData['pvp'] == 0) {
    //                         $book = Book::find($productData['id']);
    //                         // dump($productData);
    //                         $book->discounted_price != 0 ? $productData['pvp'] = $book->discounted_price : $productData['pvp'] = $book->pvp;
    //                         // dump($productData);
    //                     }

    //                     $orderDetail = new OrderDetail([
    //                         'product_id' => $productData['id'],
    //                         'quantity' => $productData['quantity'],
    //                         'price_each' => $productData['pvp'],
    //                     ]);
    //                     $order->details()->save($orderDetail);

    //                     $book = Book::find($productData['id']);
    //                     $book->stock = $book->stock - $productData['quantity'];
    //                     $book->save();
    //                 }
    //             }
    //         }
    //         $order->statusHistory()->save(new OrderStatusHistory([
    //             'order_id' => $order['id'],
    //             'status_id' => $order['status_id']
    //         ]));

    //         return redirect()->route('orders.index')
    //             ->with('success', 'Order created successfully.');
    //     } catch (Exception $e) {
    //         // dump($e);
    //         return redirect()->back()->with('error', $e->getMessage());
    //     }
    // }
    /**
     * Guardar una nueva orden en la base de datos y realizar validaciones.
     */
    public function store(OrderRequest $request)
    {
        try {
            // Validar los datos de la orden
            $validatedData = $this->validateOrder($request);

            // Guardar la orden
            $order = $this->saveOrder($validatedData);

            if ($request->input('action') == 'show') {
                return redirect()->route('orders.show', $order->id)
                    ->with('success', 'Comanda actualitzada correctament.');
            }
            // Redireccionar con un mensaje de éxito
            return redirect()->route('orders.index')
                ->with('success', 'Comanda actualitzada correctament.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Redireccionar de vuelta con los errores de validación
            return redirect()->back()->withErrors($e->errors());
        } catch (\Exception $e) {
            // Redireccionar de vuelta con un mensaje de error
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Validar los datos de la orden.
     */
    public function validateOrder(OrderRequest $request)
    {
        $productIds = array_column($request->input('products'), 'id');
        // Contar cuántas veces se repite cada ID
        $idCounts = array_count_values($productIds);

        foreach ($idCounts as $id => $count) {
            if ($count > 1) {
                throw \Illuminate\Validation\ValidationException::withMessages([
                    'id' => ['Hi ha productes repetits.'],
                ]);
            }
        }

        return $request->validated();
    }

    /**
     * Guardar una nueva orden en la base de datos.
     */
    public function saveOrder(array $validatedData)
    {
        // Guardar el archivo PDF
        if (isset($validatedData['reference'])) {
            $newFileName = $validatedData['reference'] . ".pdf";
            request()->file('pdf')->move(public_path('files/orders'), $newFileName);
            $validatedData['pdf'] = $newFileName;
        }

        //dd($validatedData['products']);
        // Calcular el total de la orden
        $validatedData['total'] = $this->getTotalPrice($validatedData['products']);

        // Crear la orden
        $order = Order::create($validatedData);

        // Guardar los detalles de la orden
        $orderDetails = request()->input('products');
        foreach ($orderDetails as $i => $productData) {
            if ($productData['quantity'] > 0) {
                if ($productData['pvp'] == 0) {
                    $book = Book::find($productData['id']);
                    $productData['pvp'] = $book->discounted_price != 0 ? $book->discounted_price : $book->pvp;
                }

                $orderDetail = new OrderDetail([
                    'product_id' => $productData['id'],
                    'quantity' => $productData['quantity'],
                    'price_each' => $productData['pvp'],
                ]);
                $order->details()->save($orderDetail);

                $book = Book::find($productData['id']);
                $book->stock = $book->stock - $productData['quantity'];
                $book->save();
            }
        }

        // Guardar el historial de estado de la orden
        $order->statusHistory()->save(new OrderStatusHistory([
            'order_id' => $order->id,
            'status_id' => $order->status_id,
        ]));
        return $order;
    }

    public function saveOrderCheckout($validatedData){
        if (isset($validatedData['reference'])) {
            $newFileName = $validatedData['reference'] . ".pdf";
            // request()->file('pdf')->move(public_path('files/orders'), $newFileName);
            $validatedData['pdf'] = $newFileName;
        }

        //dd($validatedData['products']);
        // Calcular el total de la orden
        //$validatedData['total'] = $this->getTotalPrice($validatedData['products']);

        // Crear la orden
        $order = Order::create($validatedData);

        // Guardar los detalles de la orden
        $products = request()->input('products');
        $quantities = request()->input('quantities');
        $prices = request()->input('prices');
        for ($i=0;$i<count($products);$i++) {
            if ($quantities[$i] > 0) {
                if ($prices[$i] == 0) {
                    $book = Book::find($products[$i]);
                    $prices[$i] = $book->discounted_price != 0 ? $book->discounted_price : $book->pvp;
                }

                $orderDetail = new OrderDetail([
                    'product_id' => $products[$i],
                    'quantity' => $quantities[$i],
                    'price_each' => $prices[$i],
                ]);
                $order->details()->save($orderDetail);

                $book = Book::find($products[$i]);
                $book->stock = $book->stock - $quantities[$i];
                $book->save();
            }
        }

        // Guardar el historial de estado de la orden
        $order->statusHistory()->save(new OrderStatusHistory([
            'order_id' => $order->id,
            'status_id' => $order->status_id,
        ]));
        return $order->reference;
    }
    public function saveFile($file, $path, $filename, $id)
    {
        try {
            $file->move($path, $filename);
        } catch (FileException $e) {
        } catch (Exception $e) {
        }
    }
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $order = Order::find($id);
        return view('admin.order.show', compact('order'));
        // return view('public.order_pdf', compact('order'));
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
        // dump($request);

        try {

            $productIds = array_column($request->input('products'), 'id');
            // Contar cuántas veces se repite cada ID
            $idCounts = array_count_values($productIds);
            //dump($idCounts);

            foreach ($idCounts as $id => $count) {
                if ($count > 1) {
                    // dump("Repeated ID");
                    $error = \Illuminate\Validation\ValidationException::withMessages([
                        'id' => ['Hi ha productes repetits.'],
                    ]);
                    throw $error;
                }
            }

            // $validatedData= $request->validated();

            //dd($request);
            $newFileName = $request['reference'] . ".pdf";
            if ($request->hasFile('pdf')) {
                // $pdfFile = $request->file('pdf');
                $this->saveFile($request->file('pdf'), public_path('files/orders'), $newFileName, $request['id']);
                //return dd($request);
            }

            $validatedData = $request->validated();
            $validatedData['pdf'] = $newFileName;
            $validatedData['total'] = $this->getTotalPrice($validatedData['products']);
            $order->update($validatedData);
            //dump($order);

            //Borramos todos los detalles para despues añadirlos, pero antes cambiamos el stock
            //Esto lo hacemos en lugar de editar uno por uno
            $orderDetails = OrderDetail::where('order_id', 'LIKE', $order->id)->get();
            foreach ($orderDetails as $orderDetail) {
                // dump($orderDetail);
                $book = Book::find($orderDetail->product_id);
                $book->stock = $book->stock + $orderDetail->quantity;
                $book->save();
                // dump($book);

                $orderDetail->delete();
            }

            // Actualiza los detalles de la orden
            foreach ($request->products as $i => $productData) {
                //dump($productData);

                if (isset($productData['id'])) {
                    if ($productData['quantity'] > 0) {
                        $orderDetail = OrderDetail::where('order_id', $order->id)
                            ->where('product_id', $productData['id'])
                            ->first();

                        if ($productData['pvp'] == 0) {
                            $book = Book::find($productData['id']);
                            // dump($productData);
                            $book->discounted_price != 0 ? $productData['pvp'] = $book->discounted_price : $productData['pvp'] = $book->pvp;
                            // dump($productData);
                        }


                        //añadimos todos los details del order
                        $orderDetail = OrderDetail::create([
                            'order_id' => $order->id,
                            'product_id' => $productData['id'],
                            'quantity' => $productData['quantity'],
                            'price_each' => $productData['pvp'],
                        ]);
                        // dump($orderDetail);

                        $book = Book::find($productData['id']);

                        $book->stock = $book->stock - $productData['quantity'];
                        $book->save();
                        // dump($book);
                    }
                }
            }


            // OrderStatusHistory::where('order_id', 'LIKE', $order->id)->delete();
            $orderHistory = OrderStatusHistory::where('order_id', $order->id)
                ->where('status_id', $order->status_id)
                ->first();
            // dump($orderHistory);
            if (!$orderHistory) {
                $orderStatusHistory = OrderStatusHistory::create([
                    'order_id' => $order->id,
                    'status_id' =>  $order->status_id
                ]);
                // dump($orderStatusHistory);
            }

            if ($request->input('action') == 'show') {
                return redirect()->route('orders.show', $order->id)
                    ->with('success', 'Comanda actualitzada correctament.');
            }
            return redirect()->route('orders.index')
                ->with('success', 'Order updated successfully');
        } catch (Exception $e) {
            // dump($e);
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function destroy($id)
    {
        Order::find($id)->delete();

        return redirect()->route('orders.index')
            ->with('success', 'Order deleted successfully');
    }
}
