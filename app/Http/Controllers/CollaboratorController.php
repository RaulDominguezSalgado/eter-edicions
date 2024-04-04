<?php

namespace App\Http\Controllers;

use App\Models\Collaborator;
use App\Http\Requests\CollaboratorRequest;

/**
 * Class CollaboratorController
 * @package App\Http\Controllers
 */
class CollaboratorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $collaborators = Collaborator::paginate();
        $collaboratorsArray = [];
        foreach ($collaborators as $collaborator) {
            $collaboratorsArray[] = [
                'id' => $collaborator->id,
                'image' => $collaborator->image,
                'name' => Collaborator::find($collaborator->id)->collaboratorsTranslation()->where('lang', 'es')->first()->name(),
                'last_name' => "name",
                'social_networks' => $collaborator->social_networks
            ];
        }
        return view('collaborator.index', compact('collaborators'))
            ->with('i', (request()->input('page', 1) - 1) * $collaborators->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $collaborator = new Collaborator();
        return view('collaborator.create', compact('collaborator'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CollaboratorRequest $request)
    {
        Collaborator::create($request->validated());

        return redirect()->route('collaborators.index')
            ->with('success', 'Collaborator created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $collaborator = Collaborator::find($id);

        return view('collaborator.show', compact('collaborator'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $collaborator = Collaborator::find($id);

        return view('collaborator.edit', compact('collaborator'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CollaboratorRequest $request, Collaborator $collaborator)
    {
        $collaborator->update($request->validated());

        return redirect()->route('collaborators.index')
            ->with('success', 'Collaborator updated successfully');
    }

    public function destroy($id)
    {
        Collaborator::find($id)->delete();

        return redirect()->route('collaborators.index')
            ->with('success', 'Collaborator deleted successfully');
    }
}
