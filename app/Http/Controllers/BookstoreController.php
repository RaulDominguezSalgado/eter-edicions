<?php

namespace App\Http\Controllers;

use App\Models\Bookstore;
use App\Http\Requests\BookstoreRequest;

/**
 * Class BookstoreController
 * @package App\Http\Controllers
 */
class BookstoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bookstores = Bookstore::paginate();

        return view('bookstore.index', compact('bookstores'))
            ->with('i', (request()->input('page', 1) - 1) * $bookstores->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $bookstore = new Bookstore();
        return view('bookstore.create', compact('bookstore'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BookstoreRequest $request)
    {
        Bookstore::create($request->validated());

        return redirect()->route('bookstores.index')
            ->with('success', 'Bookstore created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $bookstore = Bookstore::find($id);

        return view('bookstore.show', compact('bookstore'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $bookstore = Bookstore::find($id);

        return view('bookstore.edit', compact('bookstore'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BookstoreRequest $request, Bookstore $bookstore)
    {
        $bookstore->update($request->validated());

        return redirect()->route('bookstores.index')
            ->with('success', 'Bookstore updated successfully');
    }

    public function destroy($id)
    {
        Bookstore::find($id)->delete();

        return redirect()->route('bookstores.index')
            ->with('success', 'Bookstore deleted successfully');
    }


    public function bookstores(){
        return "BookstoreController > bookstores";
    }
}
