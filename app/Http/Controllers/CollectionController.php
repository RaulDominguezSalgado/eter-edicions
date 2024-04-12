<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use App\Models\CollectionTranslation;
use App\Http\Requests\CollectionRequest;
use Illuminate\Validation\ValidationException;

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
        // $collections = Collection::paginate();
        // $collectionsArray = [];

        // foreach ($collections as $collection) {
        //     $translation = $collection->translations()->where('lang', $this->lang)->first();


        //     if ($translation) {
        //         $collectionsArray[] = [
        //             'id' => $collection->id, // Corrected to $collection->id
        //             'lang' => $translation->lang,
        //             'name' => $translation->name,
        //             'description' => $translation->description
        //         ];
        //     }
        // }
        $collections = CollectionTranslation::where('lang', $this->lang)->paginate();
        $collectionsArray=[];
        foreach ($collections as $collection) {
            $collectionsArray[] = [
                'id' => $collection->collection->id,
                'lang' => $collection->lang,
                'name' => $collection->name,
                'description' => $collection->description
            ];
        }
        return view('admin.collection.index', compact('collectionsArray', 'collections'))
            ->with('i', (request()->input('page', 1) - 1) * $collections->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $collection = new Collection();
        return view('admin.collection.create', compact('collection'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CollectionRequest $request)
    {
        try {
            // Validate the request data
            $validatedData = $request->validated();

            // Create the collection
            $collection = Collection::create([]);

            $translationData = [
                'collection_id' => $collection->id,
                'lang' => $validatedData['lang'],
                'name' => $validatedData['name'],
                'description' => $validatedData['description'],
                'slug' => \App\Http\Actions\FormatDocument::slugify($validatedData['name']),
            ];
            CollectionTranslation::create($translationData);

            return redirect()->route('collections.index')
                ->with('success', 'Collection created successfully.');
        } catch (ValidationException $e) {
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $collection = $this->getFullCollection($id);

        return view('admin.collection.show', compact('collection'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $collection = $this->getFullCollection($id);

        return view('admin.collection.edit', compact('collection'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CollectionRequest $request, Collection $collection)
{
    try {
        // Validate the request data
        $validatedData = $request->validated();

        // Actualizar la colección
        $collection->update([]);

        // Actualizar la traducción de la colección
        $translation = $collection->translations()->where('lang', $this->lang)->first();
        if ($translation) {
            $translation->update([
                'lang' => $validatedData['lang'],
                'name' => $validatedData['name'],
                'description' => $validatedData['description'],
                'slug' => $validatedData['name']
            ]);
        }

        return redirect()->route('collections.index')
            ->with('success', 'Collection updated successfully');
    } catch (ValidationException $e) {
        // Manejar excepciones de validación si es necesario
    }
}

    public function destroy($id)
    {
        Collection::find($id)->delete();

        return redirect()->route('collections.index')
            ->with('success', 'Collection deleted successfully');
    }

    /**
     * Para recoger una collection y su traduccion
     */
    public function getFullCollection($id){
        $collection = Collection::find($id);
        $translation = $collection->translations()->where('lang', $this->lang)->first();

        $collectionData = [];
        if ($translation) {
            $collectionData = [
                'id' => $collection->id,
                'lang' => $translation->lang,
                'name' => $translation->name,
                'description' => $translation->description,
                'slug' => $translation->slug
            ];
        }
        return $collectionData;
    }
}
