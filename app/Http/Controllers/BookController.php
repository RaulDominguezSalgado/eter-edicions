<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Collection;
use App\Http\Requests\BookRequest;
use App\Models\Collaborator;
use App\Models\CollaboratorTranslation;
use App\Models\CollectionTranslation;
use App\Models\Language;
use App\Models\LanguageTranslation;
use Illuminate\Support\Facades\Storage;

/**
 * Class BookController
 * @package App\Http\Controllers
 */
class BookController extends Controller
{
    private $lang='ca';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books_lv = Book::paginate();
        $books = [];
        $authors= [];
        $translators= [];
        foreach ($books_lv as $book) {
            foreach($book->authors as $author){
                $authors[]=[
                    $author->collaborator->translations->first()->first_name
                ];
            }
            foreach($book->translators as $translator){
                $translators[]=[
                    $translator->collaborator->translations->first()->first_name
                ];
            }

            $books[] = [
                'id' => $book->id,
                'isbn' => $book->isbn,
                'title' => $book->title,
                'publisher' => $book->publisher,
                'image' => $book->image,
                'pvp' => $book->pvp,
                'iva' => $book->iva,
                'discounted_price' => $book->discounted_price,
                'stock' => $book->stock,
                'visible' => $book->visible,

                'authors' => $authors,
                'translators' => $translators,
            ];

            //dd($books);
        }


        return view('admin.book.index', compact('books'));
    }

    /**
     * Display a listing of the resource for the public users.
     */
    public function catalogo()
    {
        $books_lv = Book::all();
        $books = [];
        $authors= [];
        $illustrators= [];
        foreach ($books_lv as $book) {
            foreach($book->authors as $author){
                $authors[]=[
                    $author->collaborator->translations->first()->first_name
                ];
            }
            foreach($book->illustrators as $illustrator){
                $illustrators[]=[
                    $illustrator->collaborator->translations->first()->first_name
                ];
            }
            $books[] = [
                'id' => $book->id,
                'isbn' => $book->isbn,
                'title' => $book->title,
                'publisher' => $book->publisher,
                'image' => $book->image,
                'pvp' => $book->pvp,
                'iva' => $book->iva,
                'discounted_price' => $book->discounted_price,
                'stock' => $book->stock,
                'visible' => $book->visible,

                'authors' => $authors, //TODO
                'illustrators' => $illustrators,
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
        $authors=CollaboratorTranslation::where("lang",$this->lang)->get();
        $translators=CollaboratorTranslation::where("lang",$this->lang)->get();
        $languages = LanguageTranslation::where("iso_translation",$this->lang)->get();
        $collections= CollectionTranslation::where("lang", $this->lang)->get();
        return view('admin.book.create', compact('book','authors','translators','languages','collections'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BookRequest $request)
    {
        dd($request);
         $validatedData = $request->validate([]);
        //     'isbn' => 'required|string',
        //     'title' => 'required|string',
        //     'original_title' => 'nullable|string',
        //     'headline' => 'nullable|string',
        //     'description' => 'nullable|string',
        //     'publisher' => 'nullable|string',
        //     'original_publisher' => 'nullable|string',
        //     'image' => 'nullable|string',
        //     'number_of_pages' => 'nullable|integer',
        //     'size' => 'nullable|string',
        //     'publication_date' => 'nullable|date',
        //     'original_publication_date' => 'nullable|date',
        //     'pvp' => 'nullable|numeric',
        //     'discounted_price' => 'nullable|numeric',
        //     'legal_diposit' => 'nullable|string',
        //     'enviromental_footprint' => 'nullable|string',
        //     'stock' => 'nullable|integer',
        //     'slug' => 'nullable|string',
        //     'sample_url' => 'nullable|string',
        //     'visible' => 'required|boolean',
        //     'meta_title' => 'nullable|string',
        //     'meta_description' => 'nullable|string',
        //     'authors' => 'nullable|array',
        //     'translators' => 'nullable|array',
        //     'languages' => 'nullable|array',
        //     'collections' => 'nullable|array',
        // ]);


        $book = Book::create($validatedData);

        if ($request->has('authors')) {
            $book->authors()->attach($request->input('authors'));
        }

        if ($request->has('translators')) {
            $book->translators()->attach($request->input('translators'));
        }

        if ($request->has('languages')) {
            $book->languages()->attach($request->input('languages'));
        }

        if ($request->has('collections')) {
            $book->collections()->attach($request->input('collections'));
        }
        return redirect()->route('books.index')->with('success', '¡Libro creado con éxito!');

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $book = Book::find($id);

        return view('admin.book.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $book = $this->getFullBook(Book::find($id),$this->lang);

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

        return redirect()->route('admin.books.index')
            ->with('success', 'Book updated successfully');
    }

    public function destroy($id)
    {
        Book::find($id)->delete();

        return redirect()->route('admin.books.index')
            ->with('success', 'Book deleted successfully');
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
        foreach ($books_lv as $book_lv) {
            $books[$book_lv->slug] = $this->getFullBook($book_lv, $locale);
        }

        // $books = $this->getFullBook($books_lv, $locale);

        $collections = [];
        $collectionController = new CollectionController();
        foreach(Collection::all() as $collection){
            $collections[] = $collectionController->getFullCollection($collection->id, $locale);
        }

        // return dd($books);
        // dd($collections);


        return view('public.catalog', compact('books', 'collections', 'page', 'locale'));
    }



    /**
     * Display a listing of the resource for the public users.
     */
    public function bookDetail($id)
    {
        // return dd($id);

        // $locale = config('app')['locale'];
        $locale = 'ca';
        $page = [
            'title' => 'Portada',
            'shortDescription' => '',
            'longDescription' => '',
            'web' => 'Èter Edicions'
        ];

        $book_lv = Book::find($id);
        // return dd($book_lv->id);

        if (!$book_lv->visible) {
            return view('components.404');
        }

        $book = $this->getFullBook($book_lv, $locale);


        $authors = [];
        foreach ($book_lv->authors()->get() as $author) {
            $collaboratorController = new CollaboratorController();
            $collaborator = $collaboratorController->getFullCollaborator($author->id, $locale);

            $authors[] = $collaborator;
        }

        $translators = [];
        foreach ($book_lv->translators()->get() as $translator) {
            $collaboratorController = new CollaboratorController();
            $collaborator = $collaboratorController->getFullCollaborator($translator->id, $locale);

            $translators[] = $collaborator;
        }


        $related_books = [];

        // dd($authors);
        // dd($translators);

        return view('public.book', compact('book', 'authors', 'translators', 'related_books', 'page', 'locale'));
    }




    /**
     *
     */
    private function getFullBook($book, $locale)
    {
        // dd($books);

        // foreach ($books as $book) {
        $bookResult = [
            'id' => $book->id,
            'isbn' => $book->isbn,
            'title' => $book->title,
            'original_title' => $book->original_title,
            'headline' => $book->headline,
            'description' => $book->description,
            'publisher' => $book->publisher,
            'original_publisher' => $book->original_publisher,
            'image' => $book->image,
            'sample' => $book->sample,
            'number_of_pages' => $book->number_of_pages,
            'size' => $book->size,
            'publication_date' => $book->publication_date->format('Y'),
            'original_publication_date' => $book->original_publication_date,
            'pvp' => $book->pvp,
            'discounted_price' => $book->discounted_price ?? 0,
            'legal_diposit' => $book->legal_diposit,
            'enviromental_footprint' => $book->enviromental_footprint,
            'stock' => $book->stock,
            'slug' => $book->slug,
            'meta_title' => $book->meta_title,
            'meta_description' => $book->meta_description
        ];

        foreach ($book->authors()->get() as $author) {

            $collaboratorTranslation = \App\Models\CollaboratorTranslation::where('collaborator_id', $author->id)->where('lang', $locale)->first();
            $collaboratorName = $collaboratorTranslation->first_name . " " . $collaboratorTranslation->last_name;

            $bookResult['authors'][] = $collaboratorName;
        }

        foreach ($book->translators()->get() as $translator) {

            $collaboratorTranslation = \App\Models\CollaboratorTranslation::where('collaborator_id', $translator->id)->where('lang', $locale)->first();
            $collaboratorName = $collaboratorTranslation->first_name . " " . $collaboratorTranslation->last_name;

            $bookResult['translators'][] = $collaboratorName;
        }

        foreach ($book->languages()->orderby('id', 'desc')->get() as $lang) {

            $langTranslation = \App\Models\LanguageTranslation::where('iso_language', $lang->iso)->where('iso_translation', $locale)->first();
            $langName = $langTranslation->translation;

            $bookResult['lang'][] = $langName;
        }

        foreach ($book->collections()->get() as $collection) {
            $collectionName = \App\Models\CollectionTranslation::where('collection_id', $collection->id)->where('lang', $locale)->first()->name;

            $bookResult['collections'][] = $collectionName;
        }

        foreach ($book->extras()->get() as $extra) {
            $bookResult['extras'][$extra->key] = [
                "key" => $extra->key,
                "value" => $extra->value
            ];
        }

        // $bookResult['technical_sheet'] = [
        //     'isbn' => ["key" => "ISBN", "value" => $book->isbn],
        //     'authors' => ["key"=>"Authorship", "value"=>$bookResult['authors']],
        //     'translators' => ["key"=>"Translation", "value"=>$bookResult['translators']],
        //     'number_of_pages' => ["key" => "Number of pages", "value" => $book->number_of_pages],
        //     'publication_date' => ["key" => "Publication date", "value" => $book->publication_date->format('Y')],
        //     'pvp' => ["key" => "PVP", "value" => $book->pvp],
        //     'discounted_price' => ["key" => "Discounted price", "value" => $book->discounted_price ?? 0],
        //     'legal_diposit' => ["key" => "Legal diposit", "value" => $book->legal_diposit],
        //     'enviromental_footprint' => ["key" => "Enviromental footprint", "value" => $book->enviromental_footprint],
        // ];

        // dd($bookResult);

        return $bookResult;
    }
}
