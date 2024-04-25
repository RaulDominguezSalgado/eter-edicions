<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Http\Requests\AuthorRequest;

use \App\Models\CollaboratorTranslation;

/**
 * Class AuthorController
 * @package App\Http\Controllers
 */
class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $authors = Author::paginate();

        return view('author.index', compact('authors'))
            ->with('i', (request()->input('page', 1) - 1) * $authors->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $author = new Author();
        return view('author.create', compact('author'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AuthorRequest $request)
    {
        Author::create($request->validated());

        return redirect()->route('authors.index')
            ->with('success', 'Author created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $author = Author::find($id);

        return view('author.show', compact('author'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $author = Author::find($id);

        return view('author.edit', compact('author'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AuthorRequest $request, Author $author)
    {
        $author->update($request->validated());

        return redirect()->route('authors.index')
            ->with('success', 'Author updated successfully');
    }

    public function destroy($id)
    {
        Author::find($id)->delete();

        return redirect()->route('authors.index')
            ->with('success', 'Author deleted successfully');
    }




    /**
    * Method that generates the Author array used by the view
    */
    public static function getData($key = null, $value = null, $search = false) {
        // try {
            $locale = 'ca';
            $query_data = [];

            if ($key == null || $value == null) {
                $query_data = Author::paginate();
            }
            else if ($search) {
                switch ($key) {
                    case 'id':
                    case 'collaborator_id':
                    case  'represented_by_agency':
                        $query_data = Author::where($key, 'LIKE', '%' . $value . '%')->collavorator()->translation()->paginate();
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
                        ->with('collaborator.author')
                        ->paginate();
                    break;
                    default:
                        $query_data = [];
                    break;
                }
            }
            else {
                $query_data = Author::where($key, $value)->paginate();
            }
            $authors = [];
            foreach ($query_data as $single_data) {
                $authors[] = [
                    'id' => $single_data->collaborator()->first()->id,
                    'represented_by_agency' => $single_data->collaborator()->first()->represented_by_agency,
                    'image' => $single_data->collaborator()->first()->image,
                    'first_name' => $single_data->first_name,
                    'last_name' => $single_data->last_name,
                    'full_name' => $single_data->first_name." ".$single_data->last_name,
                    'biography' => $single_data->biography,
                    'slug' => \App\Http\Actions\FormatDocument::slugify($single_data),
                    'lang' => $single_data->lang,
                ];
            }

            return $authors;
        // }
        // catch (Exception $e) {
        //     abort(500, 'Server Error');
        // }
    }
}
