<?php

namespace App\Http\Controllers;

use App\Models\Illustrator;
use App\Http\Requests\IllustratorRequest;

/**
 * Class IllustratorController
 * @package App\Http\Controllers
 */
class IllustratorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $illustrators = Illustrator::paginate();

        return view('illustrator.index', compact('illustrators'))
            ->with('i', (request()->input('page', 1) - 1) * $illustrators->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $illustrator = new Illustrator();
        return view('illustrator.create', compact('illustrator'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(IllustratorRequest $request)
    {
        Illustrator::create($request->validated());

        return redirect()->route('illustrators.index')
            ->with('success', 'Illustrator created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $illustrator = Illustrator::find($id);

        return view('illustrator.show', compact('illustrator'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $illustrator = Illustrator::find($id);

        return view('illustrator.edit', compact('illustrator'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(IllustratorRequest $request, Illustrator $illustrator)
    {
        $illustrator->update($request->validated());

        return redirect()->route('illustrators.index')
            ->with('success', 'Illustrator updated successfully');
    }

    public function destroy($id)
    {
        Illustrator::find($id)->delete();

        return redirect()->route('illustrators.index')
            ->with('success', 'Illustrator deleted successfully');
    }
}
