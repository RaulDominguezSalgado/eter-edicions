<?php

namespace App\Http\Controllers;

use App\Models\Translator;
use App\Http\Requests\TranslatorRequest;

/**
 * Class TranslatorController
 * @package App\Http\Controllers
 */
class TranslatorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $translators = Translator::paginate();

        return view('translator.index', compact('translators'))
            ->with('i', (request()->input('page', 1) - 1) * $translators->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $translator = new Translator();
        return view('translator.create', compact('translator'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TranslatorRequest $request)
    {
        Translator::create($request->validated());

        return redirect()->route('translators.index')
            ->with('success', 'Translator created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $translator = Translator::find($id);

        return view('translator.show', compact('translator'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $translator = Translator::find($id);

        return view('translator.edit', compact('translator'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TranslatorRequest $request, Translator $translator)
    {
        $translator->update($request->validated());

        return redirect()->route('translators.index')
            ->with('success', 'Translator updated successfully');
    }

    public function destroy($id)
    {
        Translator::find($id)->delete();

        return redirect()->route('translators.index')
            ->with('success', 'Translator deleted successfully');
    }
}
