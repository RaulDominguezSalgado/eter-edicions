<?php

namespace App\Http\Controllers;

use App\Models\CollectionsTranslation;
use App\Http\Requests\CollectionsTranslationRequest;

/**
 * Class CollectionsTranslationController
 * @package App\Http\Controllers
 */
class CollectionsTranslationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $collectionsTranslations = CollectionsTranslation::paginate();

        return view('collections-translation.index', compact('collectionsTranslations'))
            ->with('i', (request()->input('page', 1) - 1) * $collectionsTranslations->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $collectionsTranslation = new CollectionsTranslation();
        return view('collections-translation.create', compact('collectionsTranslation'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CollectionsTranslationRequest $request)
    {
        CollectionsTranslation::create($request->validated());

        return redirect()->route('collections-translations.index')
            ->with('success', 'CollectionsTranslation created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $collectionsTranslation = CollectionsTranslation::find($id);

        return view('collections-translation.show', compact('collectionsTranslation'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $collectionsTranslation = CollectionsTranslation::find($id);

        return view('collections-translation.edit', compact('collectionsTranslation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CollectionsTranslationRequest $request, CollectionsTranslation $collectionsTranslation)
    {
        $collectionsTranslation->update($request->validated());

        return redirect()->route('collections-translations.index')
            ->with('success', 'CollectionsTranslation updated successfully');
    }

    public function destroy($id)
    {
        CollectionsTranslation::find($id)->delete();

        return redirect()->route('collections-translations.index')
            ->with('success', 'CollectionsTranslation deleted successfully');
    }
}
