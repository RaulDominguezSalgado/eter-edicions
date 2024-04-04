<?php

namespace App\Http\Controllers;

use App\Models\Book;
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
        $books_lv = Book::all();
        $books = [];
        foreach ($books_lv as $book) {
            $books[] = [
                'id' => $book->id,
                'isbn' => $book->isbn,
                'title' => "Titulo defecto", //TODO
                'publisher' => $book->publisher,
                'image' => $book->image,
                'pvp' => $book->pvp,
                'iva' => $book->iva,
                'discounted_price' => $book->discounted_price,
                'stock' => $book->stock,
                'visible' => $book->visible,
                'authors' => ["Author A", "Author K"], //TODO
                'illustrators' => ["Ilustrator 1", "Illustrator 2"],
                'translators' => ["Translators 1"],
            ];
        }

        return view('book.index', compact('books'));
    }

    /**
     * Display a listing of the resource.
     */
    public function catalogo()
    {
        $books_lv = Book::all();
        $books = [];
        foreach ($books_lv as $book) {
            $books[] = [
                'id' => $book->id,
                'isbn' => $book->isbn,
                'title' => "Titulo defecto", //TODO
                'publisher' => $book->publisher,
                'image' => $book->image,
                'pvp' => $book->pvp,
                'iva' => $book->iva,
                'discounted_price' => $book->discounted_price,
                'stock' => $book->stock,
                'visible' => $book->visible,
                'authors' => ["Author A", "Author K"], //TODO
                'illustrators' => ["Ilustrator 1", "Illustrator 2"],
                'translators' => ["Translators 1"],
            ];
        }

        return view('book.catalogo', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $book = new Book();
        return view('book.create', compact('book'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BookRequest $request)
    {
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

        Book::create($request->validated());

        return redirect()->route('books.index')
            ->with('success', 'Book created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $book = Book::find($id);

        return view('book.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $book = Book::find($id);

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
            'authors' => 'required',
            'illustrators' => 'required',
            'translators' => 'required',
            // Aquí puedes agregar reglas de validación para otros campos si es necesario
        ]);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $book->isbn . '.webp'; // Nuevo nombre de la imagen

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
}
