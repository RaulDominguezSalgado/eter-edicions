<?php

namespace App\Http\Controllers;

use App\Http\Actions\FormatDocument;
use App\Models\Collection;
use App\Models\CollectionTranslation;
use App\Http\Requests\CollectionRequest;
use App\Models\LanguageTranslation;
use Illuminate\Database\QueryException;
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
        $collections = Collection::paginate();

        $collectionsArray = [];
        foreach ($collections as $collection) {
            foreach ($collection->translations as $collectionTranslation) {
                if($collectionTranslation->lang == "ca"){
                    $collectionsArray[] = [
                    'id' => $collectionTranslation->collection->id,
                    'lang' => $collectionTranslation->lang,
                    'name' => $collectionTranslation->name,
                    'description' => $collectionTranslation->description
                ];
                }

            }
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
        $languages = LanguageTranslation::where('iso_translation', $this->lang)
            ->where(function ($query) {
                $query->where('iso_language', 'ca')
                    ->orWhere('iso_language', 'es');
            })
            ->get();
        return view('admin.collection.create', compact('collection', 'languages'));
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
            foreach ($validatedData['translations'] as $language => $translation) {
                if ($translation) {
                    $translationData = [
                        'collection_id' => $collection->id,
                        'lang' => $language,
                        'name' => $translation['name'],
                        'description' => $translation['description'],
                        'slug' => \App\Http\Actions\FormatDocument::slugify($translation['name']),
                        'meta_title' => \App\Http\Actions\FormatDocument::slugify($translation['name']),
                        'meta_description' => \App\Http\Actions\FormatDocument::slugify($translation['description']),
                    ];
                    CollectionTranslation::create($translationData);
                }
            }


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
        $collection = $this->getCollection($id);
        //$this->getFullCollection($id, $this->lang);
        $languages = LanguageTranslation::where('iso_translation', $this->lang)
            ->where(function ($query) {
                $query->where('iso_language', 'ca')
                    ->orWhere('iso_language', 'es');
            })
            ->get();
        return view('admin.collection.edit', compact('collection', 'languages'));
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
            foreach ($validatedData['translations'] as $language => $data) {
                $translation = $collection->translations()->where('lang', $language)->first();
                if ($translation) {
                    $translation->update([
                        'lang' => $language,
                        'name' => $data['name'],
                        'description' => $data['description'],
                        'slug' => FormatDocument::slugify($data['name']),
                        'meta_title'=>$data['name'],
                        'meta_description'=>$data['description'],
                    ]);
                }
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

    public function getCollection($id = -1)
    {
        if ($id != -1) {
            $coll = Collection::find($id);
            if ($coll) {
                $collection = [
                    'id' => $coll->id,
                    'translations' => []
                ];
                $translations = $coll->translations;

                foreach ($translations as $translation) {
                    // Verificamos si la traducción es válida
                    if ($translation) {
                        $collection['translations'][$translation->lang] = [
                            'lang' => $translation->lang,
                            'name' => $translation->name,
                            'description' => $translation->description,
                            'slug' => $translation->slug,
                            'meta_title' => $translation->meta_title,
                            'meta_description' => $translation->meta_description,
                        ];
                    }
                }
            }
        }
        return $collection;
    }
}
