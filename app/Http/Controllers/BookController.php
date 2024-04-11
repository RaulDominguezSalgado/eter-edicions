<?php

namespace App\Http\Controllers;

use App\Models\Book;
use \App\Models\BooksTranslation;
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
     * Display a listing of the resource for the public users.
     */
    public function catalogo()
    {
        $books = $this->create_array(Book::paginate());
        return view('book.catalogo', compact('books'));
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

    private function create_array($query_data) {
        $books = [];
        foreach ($query_data as $single_data) {
            if (gettype($single_data->collections) == 'array') {
                $collections_names = [];
                foreach ($single_data->collections as $collection) {
                    $collections_names[] = $collection->name;
                }
            }
            else {
                $collections_names = $single_data->collections;
            }

            $collaborators = [
                'authors' => [],
                'translators' => [],
                'illustrators' => [],
            ];
            if (gettype($single_data->author) == 'array') {
                foreach ($single_data->author as $author) {
                    $collaborators['authors'] = [
                        'id' => $author->id,
                        'name' => $author->name,
                        'collaborator_id' => $author->collaborator_id,
                    ];
                }
            }
            else {
                $collaborators['authors'] = $single_data->author;
            }
            if (gettype($single_data->translator) == 'array') {
                foreach ($single_data->translator as $translator) {
                    $collaborators['translators'] = [
                        'id' => $translator->id,
                        'name' => $translator->name,
                        'collaborator_id' => $translator->collaborator_id,
                    ];
                }
            }
            else {
                $collaborators['translator'] = $single_data->translator;
            }
            if (gettype($single_data->illustrator) == 'array') {
                foreach ($single_data->illustrator as $illustrator) {
                    $collaborators['illustrators'] = [
                        'id' => $illustrator->id,
                        'name' => $illustrator->name,
                        'collaborator_id' => $illustrator->collaborator_id,
                    ];
                }
            }
            else {
                $collaborators['illustrator'] = $single_data->illustrator;
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
}
