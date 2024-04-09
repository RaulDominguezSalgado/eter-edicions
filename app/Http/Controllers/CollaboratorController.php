<?php

namespace App\Http\Controllers;

use App\Models\Collaborator;
use App\Models\CollaboratorsTranslations;
use App\Http\Requests\CollaboratorRequest;
use Illuminate\Validation\ValidationException;

/**
 * Class CollaboratorController
 * @package App\Http\Controllers
 */
class CollaboratorController extends Controller
{
    private $lang = "ca";
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $collaborators = Collaborator::paginate();
        $collaboratorsArray = [];

        //mostrar solo en español
        foreach ($collaborators as $collaborator) {
            $translation = $collaborator->translations()->where('lang', $this->lang)->first();
            if ($translation) {
                $collaboratorsArray[] = [
                    'id' => $collaborator->id,
                    'image' => $collaborator->image,
                    'name' => $translation->name,
                    'last_name' => $translation->last_name,
                    'lang' => $translation->lang,
                    'social_networks' => $collaborator->social_networks
                ];
            }
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
        return view('collaborator.index', compact('collaboratorsArray', 'collaborators'))
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
        try {
            // Validate the request data
            $validatedData = $request->validated();

            // Convert the social networks data to JSON
            // Convertir los datos de las redes sociales en formato JSON
            $redes_sociales = [];
            if ($request->filled('red_social')) {
                foreach ($request->input('red_social') as $index => $red_social) {
                    if ($request->filled('usuario_red_social.' . $index)) {
                        $redes_sociales[$red_social] = $request->input('usuario_red_social.' . $index);
                    }
                }
            }
            $redes_sociales_json = json_encode($redes_sociales);

            // Create the collaborator
            $collaboratorData = [
                'image' => $validatedData['image'],
                'social_networks' => $redes_sociales_json
            ];
            $collaborator = Collaborator::create($collaboratorData);

            $translationData = [
                'collaborator_id' => $collaborator->id,
                'name' => $validatedData['name'],
                'last_name' => $validatedData['last_name'],
                'biography' => $validatedData['biography'],
                'slug' => $validatedData['name'] . "-" . $validatedData['last_name'],
                'lang' => $validatedData['lang']
            ];
            CollaboratorsTranslations::create($translationData);
            return redirect()->route('collaborators.index')
                ->with('success', 'Collaborator created successfully.');
        } catch (ValidationException $e) {
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $collab = Collaborator::find($id);
        $collaborator = [];
        $translation = $collab->translations()->where('lang', $this->lang)->first();
        if ($translation) {
            $collaborator = [
                'id' => $collab->id,
                'image' => $collab->image,
                'name' => $translation->name,
                'last_name' => $translation->last_name,
                'lang' => $translation->lang,
                'biography' => $translation->biography,
                'social_networks' => $collab->social_networks
            ];
        }
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
