<?php

namespace App\Http\Controllers;

use App\Models\CollaboratorsTranslations;
use App\Http\Requests\CollaboratorsTranslationsRequest;

/**
 * Class CollaboratorsTranslationController
 * @package App\Http\Controllers
 */
class CollaboratorsTranslationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $collaboratorsTranslations = CollaboratorsTranslations::paginate();

        return view('collaborators-translation.index', compact('collaboratorsTranslations'))
            ->with('i', (request()->input('page', 1) - 1) * $collaboratorsTranslations->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $collaboratorsTranslation = new CollaboratorsTranslations();
        return view('collaborators-translation.create', compact('collaboratorsTranslation'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CollaboratorsTranslations $request)
    {
        CollaboratorsTranslations::create($request->validated());

        return redirect()->route('collaborators-translations.index')
            ->with('success', 'CollaboratorsTranslation created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $collaboratorsTranslation = CollaboratorsTranslations::find($id);

        return view('collaborators-translation.show', compact('collaboratorsTranslation'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $collaboratorsTranslation = CollaboratorsTranslations::find($id);

        return view('collaborators-translation.edit', compact('collaboratorsTranslation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CollaboratorsTranslationsRequest $request, CollaboratorsTranslations $collaboratorsTranslation)
    {
        $collaboratorsTranslation->update($request->validated());

        return redirect()->route('collaborators-translations.index')
            ->with('success', 'CollaboratorsTranslation updated successfully');
    }

    public function destroy($id)
    {
        CollaboratorsTranslations::find($id)->delete();

        return redirect()->route('collaborators-translations.index')
            ->with('success', 'CollaboratorsTranslation deleted successfully');
    }
}
