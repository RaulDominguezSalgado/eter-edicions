<?php

namespace App\Http\Controllers;

use App\Models\Book;
use \App\Models\BookTranslation;
use App\Models\Collection;
use App\Http\Requests\BookRequest;
use Illuminate\Support\Facades\Storage;

/**
 * Class BookController
 * @package App\Http\Controllers
 */
class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = $this->create_array(Book::paginate());
        return view('book.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('book.edit');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BookRequest $request)
    {
        Book::create($request->validated());

        return redirect()->route('books.index')
            ->with('success', 'Book created successfully.');
        // columnes --> books, books_translation
        // books_translation -> slug, metaTitle, metaDescription

        //if ($request->lang != "ar-sy"){
        // metaTitle = $request->name . "| Èter Edicions"
        // metaDescription = $request->metaDescription
        // slug = "book/" . $book->id
        //}

        //else {
        // metaTitle = $request->name . "| Èter Edicions"
        // metaDescription = $request->metaDescription
        // slug = $request->name toLowerCase str_replace(" ", "-")
        //}
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $book = Book::where('slug', $slug)->first();
        if (request()->is('admin*')) {
            return redirect()->route('books.edit', $book->id);
        }
        $book = $this->create_array(Book::paginate())[0];

        return view('book.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $book = $this->create_array(Book::find($id))[0];
        return view('book.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BookRequest $request, Book $book)
    {
        $request->validate([
            'isbn' => 'required',
            'title' => 'required',
            'publisher' => 'required',
            'image' => 'required',
            'pvp' => 'required',
            'iva' => 'required',
            'discounted_price' => 'required',
            'stock' => 'required',
            'visible' => 'required',
        ]);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $book->isbn . '.webp';

            // Guardar la nueva imagen
            $image->storeAs('public/images/books', $imageName);

            // Eliminar la imagen anterior si existe
            Storage::delete('public/images/books/' . $book->image);

            // Actualizar el nombre de la imagen en el modelo
            $book->image = $imageName;
        }

        // Actualizar otros campos del libro
        $book->update($request->validated());

        return redirect()->route('books.index')
            ->with('success', 'Book updated successfully');
    }

    public function destroy($id)
    {
        Book::find($id)->delete();

        return redirect()->route('books.index')
            ->with('success', 'Book deleted successfully');
    }

    private function create_array($query_data)
    {
        $books = [];
        foreach ($query_data as $single_data) {
            $collections_names = [];
            if (!empty($single_data->collections)) {
                foreach ($single_data->collections as $collection) {
                    $collections_names[] = $collection->name;
                }
            }

            $collaborators = [
                'authors' => array(),
                'translators' => array(),
                'illustrators' => array(),
            ];
            if (!empty($single_data->author)) {
                foreach ($single_data->author as $author) {
                    $collaborators['authors'] = [
                        'id' => $author->id,
                        'name' => $author->name,
                        'collaborator_id' => $author->collaborator_id,
                    ];
                }
            }
            if (!empty($single_data->translator)) {
                foreach ($single_data->translator as $translator) {
                    $collaborators['translators'] = [
                        'id' => $translator->id,
                        'name' => $translator->name,
                        'collaborator_id' => $translator->collaborator_id,
                    ];
                }
            }
            if (!empty($single_data->illustrator)) {
                foreach ($single_data->illustrator as $illustrator) {
                    $collaborators['illustrators'] = [
                        'id' => $illustrator->id,
                        'name' => $illustrator->name,
                        'collaborator_id' => $illustrator->collaborator_id,
                    ];
                }
            }

            $books[] = [
                'id' => $single_data->id,
                'title' => $single_data->title,
                'description' => $single_data->description,
                'slug' => $single_data->slug,
                'lang' => $single_data->lang,
                'isbn' => $single_data->isbn,
                'publisher' => $single_data->publisher,
                'image' => $single_data->image,
                'pvp' => $single_data->pvp,
                'iva' => $single_data->iva,
                'discounted_price' => $single_data->discounted_price,
                'stock' => $single_data->stock,
                'visible' => $single_data->visible,
                'sample_url' => $single_data->sample_url,
                'page_num' => $single_data->page_num,
                'publication_date' => $single_data->publication_date,
                'collections_names' => $collections_names,
                'collaborators' => $collaborators,
            ];
        }
        return $books;
    }


    private function create_collection_array($query_data)
    {
        $collections = [
            1 => ["name" => "Col·lecció 1"],
            2 => ["name" => "Col·lecció 2"],
            3 => ["name" => "Col·lecció 3"]
        ];

        // foreach ($query_data as $single_data) {
        // }

        return $collections;
    }


    /**
     * Display a listing of the resource for the public users.
     */
    public function catalog()
    {
        // $locale = config('app')['locale'];
        $locale = 'ca';
        $page = [
            'title' => 'Portada',
            'shortDescription' => '',
            'longDescription' => '',
            'web' => 'Èter Edicions'
        ];

        $books_lv = Book::where('visible', "LIKE", 1)
            ->orderBy('publication_date', 'desc')
            ->paginate(20);

        $books = [];
        foreach ($books_lv as $book) {
            $result = [
                'id' => $book->id,
                'isbn' => $book->isbn,
                'title' => $book->title,
                'authors' => $book->authors()->get(),
                'translators' => $book->translators()->get(),
                'lang' => \App\Models\LanguageTranslation::where('iso_language', $book->lang)->where('iso_translation', $locale)->first(),
                'headline' => $book->headline,
                'description' => $book->description,
                'publisher' => $book->publisher,
                'image' => $book->image,
                'sample' => $book->sample,
                'number_of_pages' => $book->number_of_pages,
                'publication_date' => $book->publication_date->format('Y'),
                'pvp' => $book->pvp,
                'discounted_price' => $book->discounted_price ?? 0,
                'legal_diposit' => $book->legal_diposit,
                'enviromental_footprint' => $book->enviromental_footprint,
                'slug' => $book->slug,
                'meta_title' => $book->meta_title,
                'meta_description' => $book->meta_description
            ];

            foreach($book->authors()->get() as $author){

                // $collaboratorName = \App\Models\CollaboratorTranslation::where('collaborator_id', \App\Models\Collaborator::find($author->collaborator_id)->id)
                //     ->where('lang', $locale)
                //     ->first()
                //     ->first_name
                //     . " "
                //     . \App\Models\CollaboratorTranslation::where('collaborator_id', \App\Models\Collaborator::find($author->collaborator_id)->id)
                //     ->where('lang', $locale)
                //     ->first()->last_name;

                $collaboratorId = \App\Models\Collaborator::find($author->collaborator_id)->id;
                $collaboratorTranslation = \App\Models\CollaboratorTranslation::where('collaborator_id', $collaboratorId)->where('lang', $locale)->first();
                $collaboratorName = $collaboratorTranslation->first_name . " " . $collaboratorTranslation->last_name;

                $result['authors']=$collaboratorName;
            }

            foreach($book->translators()->get() as $translator){

                // $collaboratorId = \App\Models\Collaborator::find($translator->collaborator_id)->id;
                // $collaboratorTranslation = \App\Models\CollaboratorTranslation::where('collaborator_id', $collaboratorId)->where('lang', $locale)->first();
                // $collaboratorName = $collaboratorTranslation->first_name . " " . $collaboratorTranslation->last_name;

                $result['translators']=$translator;
            }

            $books[$book->slug] = $result;
        }

        // $collections = $this->create_collection_array(Collection::all());

        return dd($books);


        // return view('public.catalog', compact('books', 'collections', 'page', 'locale'));
    }



    /**
     * Display a listing of the resource for the public users.
     */
    public function bookDetail($id)
    {
        return "BookController > bookDetail({$id})";
    }
}
