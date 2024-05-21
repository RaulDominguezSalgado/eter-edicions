<?php

namespace App\Http\Controllers;

use App\Models\Bookstore;
use App\Http\Requests\BookstoreRequest;
use Illuminate\Http\Request;

/**
 * Class BookstoreController
 * @package App\Http\Controllers
 */
class BookstoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $locale = app()->getLocale() ?? 'ca';

        $data = $request->validate([
            "name" => "",
            "address" => "",
            "website" => "",
            "search" => "",
        ]);
        if (isset($data["search"]["search"])) {
            // Changes before searching
            $bookStorespag = BookStore::query();
            foreach ($data as $key => $filtro) {
                if ($filtro != null && $filtro != "") {
                    switch ($key) {
                        default:
                            if ($key != "search") {
                                $bookStorespag->where($key, "like", "%{$filtro}%");
                            }
                        break;
                    }
                }
                
            }
            $bookStorespag = $bookStorespag->paginate();
            $bookstores = [];
            foreach ($bookStorespag as $bookStore) {
                $aux = $this->getFullbookStore($bookStore, $locale);
                $bookstores[] = $aux;
            }
            $old = $data;

            return view('admin.bookstore.index', compact('bookstores', 'old'));
        }
        else if (isset($data["search"]["clear"])) {
            $bookstores = [];
            foreach (Bookstore::paginate() as $bookstore) {
                $bookstores[] = $this->getFullBookstore($bookstore);
            }

            return view('admin.bookstore.index', compact('bookstores'));
        }
        else {
            $bookstores = [];
            foreach (Bookstore::paginate() as $bookstore) {
                $bookstores[] = $this->getFullBookstore($bookstore);
            }

            return view('admin.bookstore.index', compact('bookstores'));
        }
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
        $bookstore = $this->getFullBookstore(Bookstore::find($id));

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


    public function bookstores()
    {
        $locale = app()->getLocale();

        // dump(Route::currentRouteName());
        // dump($locale);
        // dd(Route::currentRouteName() != "home.{$locale}");

        $bookstores_lv = Bookstore::all();

        $bookstores = [];
        foreach ($bookstores_lv as $bookstore) {
            $bookstores[$bookstore->name] = $this->getPreviewBookstore($bookstore, $locale);
        }

        $provinces = Bookstore::distinct('province')->pluck('province');

        $page = [
            'title' => __('general.bookstores') . " " . __('general.with whom we work'),
            'shortDescription' => '',
            'longDescription' => '',
            'web' => 'Èter Edicions'
        ];

        return view('public.bookstores', compact('bookstores', 'provinces', 'page', 'locale'));
    }



    /**
     *
     */
    private function getFullBookstore($bookstore_lv)
    {
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
    private function getPreviewBookstore($bookstore_lv, $locale)
    {
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
