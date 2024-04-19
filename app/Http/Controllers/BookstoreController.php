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

        return view('admin.bookstore.index', compact('bookstores'))
            ->with('i', (request()->input('page', 1) - 1) * $bookstores->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $bookstore = new Bookstore();
        return view('admin.bookstore.create', compact('bookstore'));
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

        return view('admin.bookstore.show', compact('bookstore'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $bookstore = Bookstore::find($id);

        return view('admin.bookstore.edit', compact('bookstore'));
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
        $locale = "ca";

        $bookstores_lv = Bookstore::all();

        $bookstores = [];
        foreach($bookstores_lv as $bookstore){
            $bookstores[$bookstore->name] = $this->getPreviewBookstore($bookstore, $locale);
        }

        $provinces = Bookstore::distinct('province')->pluck('province');

        $page = [
            'title' => 'Llibreries amb qui treballem',
            'shortDescription' => '',
            'longDescription' => '',
            'web' => 'Èter Edicions'
        ];

        return view('public.bookstores', compact('bookstores', 'provinces', 'page', 'locale'));
    }



    /**
     *
     */
    private function getFullBookstore($bookstore_lv, $locale){
        // $bookstore = Bookstore::find($id);

        // $translation = $bookstore->translations()->where('lang', $locale)->first();
        if ($bookstore_lv) {
            $bookstore = [
                'id' => $bookstore_lv->id,
                'name' => $bookstore_lv->name,
                'address' => $bookstore_lv->address,
                'zip_code' => $bookstore_lv->zip_code,
                'city' => $bookstore_lv->city,
                'province' => $bookstore_lv->province,
                'country' => $bookstore_lv->country,
                'website' => $bookstore_lv->website,
                'email' => $bookstore_lv->email,
                'phone' => $bookstore_lv->phone
            ];
        }

        return $bookstore;
    }

    /**
     *
     */
    private function getPreviewBookstore($bookstore_lv, $locale){
        // $bookstore = Bookstore::find($id);

        if ($bookstore_lv) {
            $bookstore = [
                'name' => $bookstore_lv->name,
                'address' => $bookstore_lv->address,
                'city' => $bookstore_lv->city,
                'province' => $bookstore_lv->province,
                'website' => $bookstore_lv->website,
            ];
        }

        return $bookstore;
    }
}
