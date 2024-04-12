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
    private $lang = "ca";
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = $this->create_array(Book::paginate());
        return view('admin.book.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.book.edit');
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

        return view('admin.book.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $book = $this->create_array(Book::find($id))[0];
        return view('admin.book.edit', compact('book'));
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

        return redirect()->route('admin.books.index')
            ->with('success', 'Book updated successfully');
    }

    public function destroy($id)
    {
        Book::find($id)->delete();

        return redirect()->route('admin.books.index')
            ->with('success', 'Book deleted successfully');
    }

    private function create_array($query_data) {
        $books = [];
        foreach ($query_data as $single_data) {
            $collections_names = [];
            if (!empty($single_data->collections)) {
                foreach ($single_data->collections as $collection) {
                    $collections_names[] = $collection->name;
                }
            }

            $collaborators = [
                'authors' => Array(),
                'translators' => Array(),
                'illustrators' => Array(),
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


    private function create_collection_array($query_data) {
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

        $books = $this->create_array(Book::paginate());
        $collections = $this->create_collection_array(Collection::all());
        return view('public.catalog', compact('books', 'collections', 'page', 'locale'));
    }



    /**
     * Display a listing of the resource for the public users.
     */
    public function bookDetail($id)
    {
        return "BookController > bookDetail({$id})";
    }
}
