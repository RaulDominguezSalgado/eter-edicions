<?php

namespace App\Http\Controllers;

use App\Models\Translator;
use App\Models\CollaboratorTranslation;
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



    /**
    * Method that generates the Author array used by the view
    */
    public static function getData($key = null, $value = null, $search = false) {
        // try {
            $locale = 'ca';
            $query_data = [];

            if ($key == null || $value == null) {
                $query_data = Translator::paginate();
            }
            else if ($search) {
                switch ($key) {
                    case 'id':
                    case 'collaborator_id':
                        $query_data = Translator::where($key, 'LIKE', '%' . $value . '%')->collavorator()->translation()->paginate();
                    break;
                    case 'lang':
                    case 'first_name':
                    case 'last_name':
                    case 'biography':
                    case 'slug':
                    case 'meta_title':
                    case 'meta_description':
                        // Aux es un conjunto de traducciones de collaboradores los cuales tienen autores
                        $query_data = CollaboratorTranslation::where($key, 'LIKE', '%' . $value . '%')
                        ->where('lang', $locale)
                        ->with('collaborator.translator')
                        ->paginate();
                    break;
                    default:
                        $query_data = [];
                    break;
                }
            }
            else {
                $query_data = Translator::where($key, $value)->paginate();
            }
            $translators = [];
            foreach ($query_data as $single_data) {
                $translators[] = [
                    'id' => $single_data->collaborator()->first()->id,
                    'image' => $single_data->collaborator()->first()->image,
                    'first_name' => $single_data->first_name,
                    'last_name' => $single_data->last_name,
                    'full_name' => $single_data->first_name." ".$single_data->last_name,
                    'biography' => $single_data->biography,
                    'slug' => \App\Http\Actions\FormatDocument::slugify($single_data),
                    'lang' => $single_data->lang,
                ];
            }

            return $translators;
        // }
        // catch (Exception $e) {
        //     abort(500, 'Server Error');
        // }
    }
}
