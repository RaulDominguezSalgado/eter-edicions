<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Bookstore;
use App\Models\Collection;
use App\Http\Requests\BookRequest;
use Exception;
use Intervention\Image\Drivers\Gd\Driver;
use App\Http\Requests\StockRequest;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Intervention\Image\Encoders\WebpEncoder;
use PhpParser\Node\Stmt\TryCatch;
use App\Models\BookBookstore;

/**
 * Class BookController
 * @package App\Http\Controllers
 */
class BookController extends Controller
{
    private $lang = 'ca';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $books = $this->getData();
            return view('admin.book.index', compact('books'));
        }
        catch (Exception $e) {
            abort(500, 'Server Error');
        }
    }

    /**
     * Display a listing of the resource for the public users.
     */
    public function catalogo()
    {
        try {
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
        catch (Exception $e) {
            abort(500, 'Server Error');
        }
    }

    /* Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            $book = [
                'id' => '',
                'title' => '',
                'description' => '',
                'slug' => '',
                'lang' => '',
                'isbn' => '',
                'publisher' => '',
                'image' => '',
                'pvp' => '',
                'iva' => '',
                'discounted_price' => '',
                'stock' => '',
                'visible' => '',
                'sample_url' => '',
                'number_of_pages' => '',
                'publication_date' => '',
                'collections' => [],
                'collaborators' => [
                    'authors' => [],
                    'translators' => [],
                ],
                'original_title' => '',
                'original_publication_date' => '',
                'original_publisher' => '',
                'legal_diposit' => '',
                'headline' => '',
                'size' => '',
                'enviromental_footprint' => '',
                'meta_title' => '',
                'meta_description' => '',
            ];
            return view('admin.book.create', compact('book'));
        }
        catch (Exception $e) {
            abort(500, 'Server Error');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BookRequest $request)
    {
        try {
            // \App\Models\Book::class;
            $data = $request->validated();
            $slug = (\App\Http\Actions\FormatDocument::slugify($request->title));
            $data['slug'] = $slug;
            // dd($data);

            if (!isset($data['sample'])) {
                $data['sample'] = '';
            }

            if (!isset($data['publisher'])) {
                $data['publisher'] = 'Eter Edicions';
            }

            if (!isset($data['image'])) {
                $data['image'] = 'default.webp';
            }

            if (!isset($data['pvp'])) {
                $data['pvp'] = 0;
            }

            if (!isset($data['iva'])) {
                $data['iva'] = 4;
            }

            if (!isset($data['stock'])) {
                $data['stock'] = 0;
            }

            if (!isset($data['meta_title'])) {
                $data['meta_title'] = $data['title'];
            }

            if (!isset($data['meta_description'])) {
                $data['meta_description'] = $data['description'];
            }



            $book = Book::create($data);

            $this->setBookData($book, $request);

            // Controla la selección del usuario
            if ($request->input('action') == 'redirect') {
                return redirect()->route('books.index')
                ->with('success', 'Book created successfully');
            }
            else if ($request->input('action') == 'stay') {
                return redirect()->route('books.edit', $book->id)
                ->with('success', 'Book created successfully');
            }
        }
        catch (Exception $e) {
            abort(500, 'Server Error');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $book = $this->getData()[0];
            if (request()->is('admin*')) {
                return redirect()->route('books.edit', $book->id);
            }
            else {
                return view('book.show', compact('book'));
            }
        }
        catch (Exception $e) {
            abort(500, 'Server Error');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        try {
            $book = $this->getData('id', $id)[0];
            return view('admin.book.edit', compact('book'));
        }
        catch (Exception $e) {
            abort(500, 'Server Error');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BookRequest $request, Book $book)
    {
        try {
            // \App\Models\Book::class;
            $data = $request->validated();
            $slug = (\App\Http\Actions\FormatDocument::slugify($request->title));
            $data['slug'] = $slug;
            // dd($data);

            if (!isset($data['sample'])) {
                $data['sample'] = '';
            }

            if (!isset($data['publisher'])) {
                $data['publisher'] = 'Eter Edicions';
            }

            if (!isset($data['image'])) {
                $data['image'] = 'default.webp';
            }

            if (!isset($data['pvp'])) {
                $data['pvp'] = 0;
            }

            if (!isset($data['iva'])) {
                $data['iva'] = 4;
            }

            if (!isset($data['stock'])) {
                $data['stock'] = 0;
            }

            if (!isset($data['meta_title'])) {
                $data['meta_title'] = $data['title'];
            }

            if (!isset($data['meta_description'])) {
                $data['meta_description'] = $data['description'];
            }



            $book = Book::create($data);

            $this->setBookData($book, $request);

            // Controla la selección del usuario
            if ($request->input('action') == 'redirect') {
                return redirect()->route('books.index')
                ->with('success', 'Book created successfully');
            }
            else if ($request->input('action') == 'stay') {
                return redirect()->route('books.edit', $book->id)
                ->with('success', 'Book created successfully');
            }
        }
        catch (Exception $e) {
            abort(500, 'Server Error');
        }
    }

    public function destroy($id)
    {
        try {
            Book::find($id)->delete();

            return redirect()->route('admin.books.index')
                ->with('success', 'Book deleted successfully');
        }
        catch (Exception $e) {
            abort(500, 'Server Error');
        }
    }

    /**
     * Display a listing of the resource for the public users.
     */
    public function catalog()
    {
        try {
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
            $books[$book_lv->slug] = $this->getPreviewBook($book_lv, $locale);
        }

            // $books = $this->getFullBook($books_lv, $locale);

        $collections = [];
        $collectionController = new CollectionController();
        foreach (Collection::all() as $collection) {
            $collections[] = $collectionController->getFullCollection($collection->id, $locale);
        }

            // return dd($books);
            // dd($collections);


            return view('public.catalog', compact('books', 'collections', 'page', 'locale'));
        }
        catch (Exception $e) {
            abort(500, 'Server Error');
        }
    }



    /**
     * Display a listing of the resource for the public users.
     */
    public function bookDetail($id)
    {
        try {
            $locale = 'ca';
            $page = [
                'title' => 'Portada',
                'shortDescription' => '',
                'longDescription' => '',
                'web' => 'Èter Edicions'
            ];

            $book_lv = Book::find($id);

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


        //RELATED BOOKS
        $related_books = $this->getRelatedBooks($book_lv, $locale);


        $page = [
            'title' => $book_lv->title,
            'shortDescription' => '',
            'longDescription' => '',
            'web' => 'Èter Edicions'
        ];

        // dd($authors);
        // dd($translators);
        // dd($related_books);

            return view('public.book', compact('book', 'authors', 'translators', 'related_books', 'page', 'locale'));
        }
        catch (Exception $e) {
            abort(500, 'Server Error');
        }
    }




    /**
     *
     */
    private function getFullBook($book, $locale)
    {
        try {
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

        // $bookResult['bookstores'] = [];
        // dd($book->bookstores);
        foreach ($book->bookstores as $bookstore) {
            $bookResult['bookstores'][$bookstore->name] = [
                "id" => $bookstore->id,
                "name" => $bookstore->name,
                "stock" => $bookstore->pivot->stock,
                "address" => $bookstore->address,
                "city" => $bookstore->city,
            ];
        }

        //dd($bookResult);

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


    /**
     *
     */
    private function getPreviewBook($book, $locale)
    {
        // dd($books);

        // foreach ($books as $book) {
        $bookResult = [
            'id' => $book->id,
            'isbn' => $book->isbn,
            'title' => $book->title,
            'image' => $book->image,
            'pvp' => $book->pvp,
            'discounted_price' => $book->discounted_price ?? 0,
            'stock' => $book->stock,
            'slug' => $book->slug,
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

        // dd($bookResult);

        return $bookResult;
    }

    /**
     *
     *
     * Algorithm recommendation criteria:
     * 1. Related books --> books that are related, manually established by admins
     * 2. Books by the same authors. Authors are sorted based on how many books they have written
     * 3. Books from the same collections
     * 4. Books by the same translators. Translators are sorted based on how many books they have written
     * 5. Newest books
     */
    private function getRelatedBooks($book, $locale)
    {
        $result = [];

        // Related books (manual)
        $relatedBooks = [];


        //Books by the same authors
        $authors = [];
        foreach ($book->authors as $author) {
            // Count the number of books associated with the author
            $bookCount = $author->books()->where('visible', 1)->count();

            // Store the author and their book count in an array
            $authors[$author->id] = [
                'author_id' => $author->id,
                'book_count' => $bookCount,
            ];
        }
        // Sort authors based on the book count in descending order
        usort($authors, function ($a, $b) {
            return $b['book_count'] <=> $a['book_count'];
        });

        foreach ($authors as $author) {
            foreach (\App\Models\Author::find($author['author_id'])->books()->get()->where('visible', "LIKE", 1)->where('title', "!=", $book->title) as $authorBook) {
                // $bookResult = $this->getPreviewBook($authorBook, $locale);
                // dd($bookResult);
                $result[$authorBook->title] = $this->getPreviewBook($authorBook, $locale);
            }
        }


        //Books from the same collections
        foreach ($book->collections as $collection) {
            foreach ($collection->books()->get()->where('visible', "LIKE", 1)->where('title', "!=", $book->title) as $collectionBook) {
                $result[$collectionBook->title] = $this->getPreviewBook($collectionBook, $locale);
            }
        }


        //Books by the same translators
        $translators = [];
        foreach ($book->translators as $translator) {
            // Count the number of books associated with the translators
            $bookCount = $translator->books()->where('visible', 1)->count();

            // Store the translators and their book count in an array
            $translators[$translator->id] = [
                'translator_id' => $translator->id,
                'book_count' => $bookCount,
            ];
        }
        // Sort translators based on the book count in descending order
        usort($translators, function ($a, $b) {
            return $b['book_count'] <=> $a['book_count'];
        });

        // dd($translators[0]['translator_id']);
        // dd(\App\Models\Translator::find($translators[0]['translator_id'])->books()->get());

        foreach ($translators as $translator) {
            foreach (\App\Models\Translator::find($translator['translator_id'])->books()->get()->where('visible', "LIKE", 1)->where('title', "!=", $book->title) as $translatorBook) {
                $result[$translatorBook->title] = $this->getPreviewBook($translatorBook, $locale);
            }
        }


        // Get the newest 4 books
        $newestBooks = Book::where('visible', 1)
            ->where('title', "!=", $book->title)
            ->orderBy('publication_date', 'desc')
            ->take(4)
            ->get();
        foreach ($newestBooks as $book) {
            $result[$book->title] = $this->getPreviewBook($book, $locale);
        }


        //Get the first 4 books (they will always be the more relevant)
        $result = array_slice($result, 0, 3);

        return $result;
    }


    public function getNewestBooks($locale){
        $books_lv = Book::where('visible', 1)
        ->orderBy('publication_date', 'desc')
        ->take(4)
        ->get();

        $books = [];
        foreach($books_lv as $book_lv){
            $books[$book_lv->slug] = $this->getPreviewBook($book_lv, $locale);
        }

        return $books;
    }



    public function redirectViewStock($id)
    {
        $locale = "ca";

        // Obtener el libro con el ID especificado
        $book = $this->getFullBook(Book::findOrFail($id), $locale);
        //dd($book);
        // Devolver la vista con los datos del libro
        return view('admin.book.stock', compact('book'));
    }

    //STOCK
    public function editStock($id)
    {
        $locale = "ca";

        $book = $this->getFullBook(Book::findOrFail($id), $locale);


        return view('admin.user.edit', compact('book'));
    }

    public function updateBookstoreStock(StockRequest $request, $bookId)
    {
        $book = Book::findOrFail($bookId);

        $book->stock = intval($request->input('stock'));

        $book->save();


        $bookstoresRequest = $request->input('bookstores');

        $bookstores = $book->bookstores;

        foreach ($bookstores as $bookstore) {

            $stock = isset($bookstoresRequest[$bookstore->id]) ? intval($bookstoresRequest[$bookstore->id]['stock']) : 0;

            $bookstore->books()->sync([$book->id => ['stock' => $stock]]);
        }

        return redirect()->back()->with('success', 'Stock updated successfully.');
    }


}
