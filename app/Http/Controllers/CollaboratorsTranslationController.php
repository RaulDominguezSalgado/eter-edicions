<?php

namespace App\Http\Controllers;

use App\Models\CollaboratorsTranslation;
use App\Http\Requests\CollaboratorsTranslationRequest;

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
        $collaboratorsTranslations = CollaboratorsTranslation::paginate();

        return view('collaborators-translation.index', compact('collaboratorsTranslations'))
            ->with('i', (request()->input('page', 1) - 1) * $collaboratorsTranslations->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $collaboratorsTranslation = new CollaboratorsTranslation();
        return view('collaborators-translation.create', compact('collaboratorsTranslation'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CollaboratorsTranslationRequest $request)
    {
        CollaboratorsTranslation::create($request->validated());

        return redirect()->route('collaborators-translations.index')
            ->with('success', 'CollaboratorsTranslation created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $collaboratorsTranslation = CollaboratorsTranslation::find($id);

        return view('collaborators-translation.show', compact('collaboratorsTranslation'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $collaboratorsTranslation = CollaboratorsTranslation::find($id);

        return view('collaborators-translation.edit', compact('collaboratorsTranslation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CollaboratorsTranslationRequest $request, CollaboratorsTranslation $collaboratorsTranslation)
    {
        $collaboratorsTranslation->update($request->validated());

        return redirect()->route('collaborators-translations.index')
            ->with('success', 'CollaboratorsTranslation updated successfully');
    }

    public function destroy($id)
    {
        CollaboratorsTranslation::find($id)->delete();

        return redirect()->route('collaborators-translations.index')
            ->with('success', 'CollaboratorsTranslation deleted successfully');
    }
}
