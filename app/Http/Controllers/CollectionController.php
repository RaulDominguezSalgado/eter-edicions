<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use App\Http\Requests\CollectionRequest;

/**
 * Class CollectionController
 * @package App\Http\Controllers
 */
class CollectionController extends Controller
{
    private $lang = "ca";
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $collections = Collection::paginate();
        $collectionsArray = [];

        foreach ($collections as $collection) {
            $translation = $collection->translations()->where('lang', $this->lang)->first();

            if ($translation) {
                $collectionsArray[] = [
                    'id' => $collection->id, // Corrected to $collection->id
                    'lang' => $translation->lang,
                    'name' => $translation->name,
                    'description' => $translation->description
                ];
            }
        }

        return view('collection.index', compact('collectionsArray','collections'))
            ->with('i', (request()->input('page', 1) - 1) * $collections->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $collection = new Collection();
        return view('collection.create', compact('collection'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CollectionRequest $request)
    {
        Collection::create($request->validated());

        return redirect()->route('collections.index')
            ->with('success', 'Collection created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $collection = Collection::find($id);

        return view('collection.show', compact('collection'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $collection = Collection::find($id);

        return view('collection.edit', compact('collection'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CollectionRequest $request, Collection $collection)
    {
        $collection->update($request->validated());

        return redirect()->route('collections.index')
            ->with('success', 'Collection updated successfully');
    }

    public function destroy($id)
    {
        Collection::find($id)->delete();

        return redirect()->route('collections.index')
            ->with('success', 'Collection deleted successfully');
    }
}
