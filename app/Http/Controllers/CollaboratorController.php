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
    public static function listAll() {
        
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $collaborators = Collaborator::paginate();
        $collaboratorsArray = [];

        //mostrar solo en catalan
        foreach ($collaborators as $collaborator) {
            $translation = $collaborator->translations()->where('lang', 'es')->first();
            $collaboratorsArray[] = [
                'id' => $collaborator->id,
                'image' => $collaborator->image,
                'name' => $translation ? $translation->name : '',
                'last_name' => $translation ? $translation->last_name : '',
                'lang' => $translation ? $translation->lang : '', 
                'social_networks' => $collaborator->social_networks
            ];
        }

        //opcion 2 que me salgan todos los colaboradores en todos los idiomas
        // foreach ($collaborators as $collaborator) {
        //     foreach ($collaborator->translations as $collabtrad) {
        //         $collaboratorsArray[] = [
        //             'id' => $collaborator->id,
        //             'lang'=>$collabtrad->lang,
        //             'image' => $collaborator->image,
        //             'name' => $collabtrad->name,
        //             'last_name' => $collabtrad->last_name,
        //             'social_networks' => $collaborator->social_networks,
        //         ];
        //     }
        // }
        return view('collaborator.index', compact('collaboratorsArray','collaborators'))
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
