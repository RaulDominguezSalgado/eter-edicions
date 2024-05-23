<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use App\Models\CollectionTranslation;
use App\Models\Language;
use App\Http\Requests\CollectionRequest;
use Illuminate\Database\QueryException;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;

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
    public function index(Request $request)
    {
        $locale = app()->getLocale() ?? 'ca';

        $data = $request->validate([
            "name" => "",
            "description" => "",
            "search" => "",
        ]);
        if (isset($data["search"]["search"])) {
            // Changes before searching
            $collections = Collection::query();
            foreach ($data as $key => $filtro) {
                if ($filtro != null && $filtro != "") {
                    switch ($key) {
                        case "name":
                        case "description":
                            $collections->whereHas("translations", function($query) use ($key, $filtro) {
                                $query->where($key, "like", "%{$filtro}%");
                            });
                            // $collections->where("lang", "like", "%{$filtro}%");
                        break;
                        default:
                            if ($key != "search") {
                                $collections->where($key, "like", "%{$filtro}%");
                            }
                        break;
                    }
                }
            }
            $collections = $collections->paginate();
            $collectionsArray = [];
            foreach ($collections as $collection) {
                foreach (Language::all() as $language) {
                    if ($language->iso == "ca" || $language->iso == "es") {
                        $aux = $this->getFullcollection($collection->id, $language->iso);
                        $collectionsArray[] = $aux;
                    }
                }
            }
            $old = $data;
            $i = (request()->input('page', 1) - 1) * $collections->perPage();

            return view('admin.collection.index', compact('collectionsArray', 'old', 'collections', 'i'));
        }
        else if (isset($data["search"]["clear"])) {
            $collections = Collection::paginate();

            $collectionsArray = [];
            foreach ($collections as $collection) {
                foreach ($collection->translations as $collectionTranslation) {
                    $collectionsArray[] = [
                        'id' => $collectionTranslation->collection->id,
                        'lang' => $collectionTranslation->lang,
                        'name' => $collectionTranslation->name,
                        'description' => $collectionTranslation->description
                    ];
                }
            }

            return view('admin.collection.index', compact('collectionsArray', 'collections'))
                ->with('i', (request()->input('page', 1) - 1) * $collections->perPage());
        }
        else {
            $collections = Collection::paginate();

            $collectionsArray = [];
            foreach ($collections as $collection) {
                foreach ($collection->translations as $collectionTranslation) {
                    $collectionsArray[] = [
                        'id' => $collectionTranslation->collection->id,
                        'lang' => $collectionTranslation->lang,
                        'name' => $collectionTranslation->name,
                        'description' => $collectionTranslation->description
                    ];
                }
            }

            return view('admin.collection.index', compact('collectionsArray', 'collections'))
                ->with('i', (request()->input('page', 1) - 1) * $collections->perPage());
        }
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
                'meta_title' => \App\Http\Actions\FormatDocument::slugify($validatedData['name']),
                'meta_description' => \App\Http\Actions\FormatDocument::slugify($validatedData['description']),
            ];
            CollectionTranslation::create($translationData);

            return redirect()->route('collections.index')
                ->with('success', 'Col·lecció afegida correctament.');
        } catch (ValidationException $e) {
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $collection = $this->getFullCollection($id, $this->lang);

        return view('admin.collection.show', compact('collection'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $collection = $this->getFullCollection($id, $this->lang);

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
                ->with('success', 'Col·lecció actualitzada correctament.');
        } catch (ValidationException $e) {
            // Manejar excepciones de validación si es necesario
        }
    }

    public function destroy($id)
    {
        try {

            Collection::find($id)->delete();

            return redirect()->route('collections.index')
                ->with('success', 'Col·lecció eliminada correctament');
        } catch (QueryException $e) {
            return redirect()->route('collections.index')->with('error', 'No es possible eliminar aquesta col·lecció, ja que té dades relacionades');
        }
    }

    /**
     * Para recoger una collection y su traduccion
     */
    public function getFullCollection($id, $locale)
    {
        $collection = Collection::find($id);
        $translation = $collection->translations()->where('lang', $locale)->first();

        $collectionData = [];

        if (!$translation) {
            return null;
        }

        $collectionData = [
            'id' => $collection->id,
            'lang' => $translation->lang,
            'name' => $translation->name,
            'description' => $translation->description,
            'slug' => $translation->slug,
            'meta_title' => $translation->meta_title,
            'meta_description' => $translation->meta_description,
        ];
        return $collectionData;
    }
}
