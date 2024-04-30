<?php

namespace App\Http\Controllers;

use App\Http\Actions\ImageHelper;
use App\Models\Book;
use App\Models\Bookstore;
use App\Models\Collection;
use App\Http\Requests\BookRequest;
use Illuminate\Http\Request;
use App\Models\Collaborator;
use App\Models\CollaboratorTranslation;
use App\Models\CollectionTranslation;
use App\Models\Language;
use App\Models\LanguageTranslation;

use Exception;
use Illuminate\Database\QueryException;

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

    /*
        CRUD METHODS
    */

    /**
     * Display a listing of the resource.
     * Used in the backoffice for the books listing
     */
    public function index()
    {
        // try {
        $books = $this->getData();
        return view('admin.book.index', compact('books'));
        // } catch (Exception $e) {
        //     abort(500, 'Server Error');
        // }
    }

    /* Show the form for creating a new resource.
     */
    public function create()
    {
        $locale = $this->lang;

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

            /* Get all collaborators data */
            $collaboratorController = new CollaboratorController();
            foreach (\App\Models\Collaborator::all() as $collaborator) {
                $collaborators[$collaborator->id] = $collaboratorController->getFullCollaborator($collaborator->id, $locale);
            }


            /* Get all languages data */
            foreach (\App\Models\Language::all() as $language_lv) {
                // $languages[] = $language_lv->iso;

                $langTranslation = \App\Models\LanguageTranslation::where('iso_language', $language_lv->iso)->where('iso_translation', $locale)->first();
                $langName = $langTranslation->translation;

                $languages[] = ["iso" => $langTranslation->iso_language, "name" => $langName];
            }


            /* Get all collections data */
            $collectionController = new CollectionController();
            foreach (Collection::all() as $collection) {
                $collectionTranslation = $collectionController->getFullCollection($collection->id, $locale);
                if($collectionTranslation){
                    $collections[$collection->id] = $collectionTranslation;
                }
            }

            return view('admin.book.create', compact('book', 'collaborators', 'languages', 'collections'));
        } catch (Exception $e) {
            abort(500, $e->getMessage());
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

            if ($request->input('visible') != null) {
                $request->merge([
                    'visible' => $request->input('visible') == 'on' ? 1 : 0,
                ]);
                $data['visible'] = $data['visible']  == 'on' ? 1 : 0;
            } else {
                $request->merge([
                    'visible' => 0,
                ]);
                $data['visible'] = 0;
            }

            $request->slug ? $data['slug'] = $request->slug : $data['slug'] = \App\Http\Actions\FormatDocument::slugify($request->title);
            // $slug = (\App\Http\Actions\FormatDocument::slugify($request->title));
            // $data['slug'] = $slug;
            // dump($data);

            if (!isset($data['sample'])) {
                $data['sample'] = '';
            }

            if (!isset($data['publisher'])) {
                $data['publisher'] = 'Èter Edicions';
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

            // // Controla la selección del usuario
            // if ($request->input('action') == 'redirect') {
            //     return redirect()->route('books.index')
            //         ->with('success', 'Book created successfully');
            // } else if ($request->input('action') == 'stay') {
            return redirect()->route('books.edit', $book->id)
                ->with('success', 'Book created successfully');
            // }
        } catch (QueryException $e) {
            return back()->withError("Error a la base de dades en la creació del llibre.\n" . substr($e->getMessage(), 0, strpos($e->getMessage(), "(")))->withInput();
        } catch (Exception $e) {
            return back()->withError($e->getMessage())->withInput();
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
            } else {
                return view('book.show', compact('book'));
            }
        } catch (Exception $e) {
            abort(500, 'Server Error');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        try {
            $locale = $this->lang;

            /*try {*/
            $book_lv = Book::findOrFail($id);

            /* Get the book data */
            $book = $this->getFullBook($book_lv, $locale);

            /* Get all collaborators data */
            $collaboratorController = new CollaboratorController();
            foreach (\App\Models\Collaborator::all() as $collaborator) {
                $collaborators[$collaborator->id] = $collaboratorController->getFullCollaborator($collaborator->id, $locale);
            }


            /* Get all languages data */
            foreach (\App\Models\Language::all() as $language_lv) {
                // $languages[] = $language_lv->iso;

                $langTranslation = \App\Models\LanguageTranslation::where('iso_language', $language_lv->iso)->where('iso_translation', $locale)->first();
                $langName = $langTranslation->translation;

                $languages[] = ["iso" => $langTranslation->iso_language, "name" => $langName];
            }


            /* Get all collections data */
            $collectionController = new CollectionController();
            foreach (Collection::all() as $collection) {
                $fullCollection = $collectionController->getFullCollection($collection->id, $locale);
                if ($fullCollection) {
                    $collections[$collection->id] = $fullCollection;
                }
            }


            return view('admin.book.edit', compact('book', 'collaborators', 'languages', 'collections'));
        } catch (Exception $e) {
            abort(500, 'Server Error');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BookRequest $request, Book $book)
    {
        // dump($request);
        // dump($book);
        // try {
            // \App\Models\Book::class;
            $new_data = $request->validated();

            // dump($new_data);

            if ($request->input('visible') != null) {
                $request->merge([
                    'visible' => $request->input('visible') == 'on' ? 1 : 0,
                ]);
                $new_data['visible'] = $new_data['visible']  == 'on' ? 1 : 0;
            } else {
                $request->merge([
                    'visible' => 0,
                ]);
                $new_data['visible'] = 0;
            }

            if (!$request->input('slug') && $request->input('title') != null) {
                $request->merge([
                    'slug' => \App\Http\Actions\FormatDocument::slugify($request['title'])
                ]);
                $new_data['slug'] = \App\Http\Actions\FormatDocument::slugify($request['title']);
            }

            // dump($new_data);

            $book->update($new_data);

            $this->setBookData($book, $request);

            // // Controla la selección del usuario
            // if ($request->input('action') == 'redirect') {
            //     return redirect()->route('books.index')
            //         ->with('success', 'Book created successfully');
            // } else if ($request->input('action') == 'stay') {

            return redirect()->route('books.edit', $book->id)
                ->with('success', 'Llibre actualitzat correctament');
        // } catch (Exception $e) {
        //     return back()->withError($e->getMessage())->withInput();
        // }
    }

    public function destroy($id)
    {
        try {
            Book::find($id)->delete();

            return redirect()->route('books.index')
                ->with('success', 'Book deleted successfully');
        } catch (Exception $e) {
            dump($e->getMessage());
            // abort(500, 'Server Error');
        }
    }






    /*
        FRONT END RELAtED METHODS
    */

    /**
     * Display a listing of the resource for the public users.
     */
    public function catalog()
    {
        try {
            // $locale = config('app')['locale'];
            $locale = 'ca';
            $page = [
                'title' => 'Catàleg',
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
        } catch (Exception $e) {
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
        } catch (Exception $e) {
            abort(500, 'Server Error');
        }
    }

    public function bookSample($filename)
    {
        // return "{$slug}.pdf";
        return redirect('/files/samples/' . $filename);
    }


    /**
     * Get all the details of a book
     *
     * @param Book $book the book to get the details of
     * @param string $locale the current language of the website
     *
     * @return array[] $bookResult associative array with all the data of the book
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
                'publication_date' => $book->publication_date ? $book->publication_date->format('d-m-Y') : '',
                'original_publication_date' => $book->original_publication_date,
                'pvp' => $book->pvp,
                'iva' => $book->iva,
                'discounted_price' => $book->discounted_price ?? 0,
                'legal_diposit' => $book->legal_diposit,
                'enviromental_footprint' => $book->enviromental_footprint,
                'stock' => $book->stock,
                'visible' => $book->visible,
                'slug' => $book->slug,
                'meta_title' => $book->meta_title,
                'meta_description' => $book->meta_description
            ];

            foreach ($book->authors()->get() as $author) {

                $collaboratorTranslation = \App\Models\CollaboratorTranslation::where('collaborator_id', $author->id)->where('lang', $locale)->first();
                $collaboratorName = $collaboratorTranslation->first_name . " " . $collaboratorTranslation->last_name;

                $bookResult['authors'][] = ["id" => $collaboratorTranslation->collaborator_id, "name" => $collaboratorName];
            }

            foreach ($book->translators()->get() as $translator) {

                $collaboratorTranslation = \App\Models\CollaboratorTranslation::where('collaborator_id', $translator->id)->where('lang', $locale)->first();
                $collaboratorName = $collaboratorTranslation->first_name . " " . $collaboratorTranslation->last_name;

                $bookResult['translators'][] = ["id" => $collaboratorTranslation->collaborator_id, "name" => $collaboratorName];
            }

            foreach ($book->languages()->orderby('id', 'desc')->get() as $lang) {

                $langTranslation = \App\Models\LanguageTranslation::where('iso_language', $lang->iso)->where('iso_translation', $locale)->first();
                $langName = $langTranslation->translation;

                $bookResult['lang'][] = ["iso" => $langTranslation->iso_language, "name" => $langName];
            }

            foreach ($book->collections()->get() as $collection) {
                $collection = \App\Models\CollectionTranslation::where('collection_id', $collection->id)->where('lang', $locale)->first();

                $bookResult['collections'][] = ["id" => $collection->id, "name" => $collection->name];
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

            return $bookResult;
        } catch (Exception $e) {
            abort(500, 'Server Error');
        }
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
     * Get an array of books related to $book
     *
     * Algorithm recommendation criteria:
     * 1. Related books --> books that are related, manually established by admins
     * 2. Books by the same authors. Authors are sorted based on how many books they have written
     * 3. Books from the same collections
     * 4. Books by the same translators. Translators are sorted based on how many books they have written
     * 5. Newest books
     *
     * @param Book $book the method will return books related to this book
     * @param string $locale the iso code for the current language of the website
     *
     * @return array an array with a preview of 3 related books
     */
    private function getRelatedBooks(Book $book, string $locale)
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

    /**
     * Get an array of related books based on an array of books.
     * Example of usage: to get recommendations based on the products of the shopping cart
     *
     * @param array $books an array of Book objects
     * @param string $locale
     *
     * @return array an array with a preview of 3 related books
     */
    public function getRelatedBooksFromMultiple(array $books, string $locale){
        $result = [];
        foreach($books as $book){
            array_merge($result, $this->getRelatedBooks($book, $locale));
        }

        $result = array_slice($result, 0, 3);

        return $result;
    }


    public function getNewestBooks($locale)
    {
        $books_lv = Book::where('visible', 1)
            ->orderBy('publication_date', 'desc')
            ->take(4)
            ->get();

        $books = [];
        foreach ($books_lv as $book_lv) {
            $books[$book_lv->slug] = $this->getPreviewBook($book_lv, $locale);
        }

        return $books;
    }








    /*
        AJUSTES DE STOCK
    */

    // public function redirectViewStock($id)
    // {
    //     $locale = "ca";

    //     // Obtener el libro con el ID especificado
    //     $book = $this->getFullBook(Book::findOrFail($id), $locale);
    //     $bookstores = Bookstore::all();
    //     //dd($book);
    //     // Devolver la vista con los datos del libro
    //     return view('admin.book.stock', compact('book', 'bookstores'));
    // }

    public function editStock($id)
    {
        $locale = "ca";

        // Obtener el libro con el ID especificado
        $book = $this->getFullBook(Book::findOrFail($id), $locale);
        $bookstores = Bookstore::all();
        //dd($book);
        // Devolver la vista con los datos del libro
        return view('admin.book.stock', compact('book', 'bookstores'));
    }

    public function updateStock(Request $request, $bookId)
    {
        // dump($request);
        try {
            //Update stock in warehouse --> stock field in book row
            $book = Book::findOrFail($bookId);
            $book->stock = intval($request->input('stock'));
            $book->save();

            $bookstores = $request->input('bookstores');
            // dump($bookstores);
            $book->bookstores()->detach();
            foreach($bookstores as $bookstore){
                // dump($bookstore);
                if(intval($bookstore['stock']) > 0){
                    $bookstore_lv = Bookstore::find($bookstore['bookstore_id']);
                $bookstore_lv->books()->sync([$book->id=>['stock' => $bookstore['stock']]]);
                }
            }

            return redirect()->route('stock.edit', $book->id)
                ->with('success', 'Stock actualitzat correctament');
        }
        catch(QueryException $e){
            // dump($e->getMessage());
            return back()->withError("Error a la base de dades en la creació del llibre.\n" . substr($e->getMessage(), 0, strpos($e->getMessage(), "(")))->withInput();
        }
        catch (Exception $e) {
            // dump($e->getMessage());
            return back()->withError($e->getMessage())->withInput();
        }
    }





    /**
    * Method that generates the Book array used by the view
    */
    public static function getData($key = null, $value = null, $search = false) {
        // try {
            $locale = 'ca';

            if ($key == null || $value == null) {
                $query_data = Book::paginate();
            }
            else if ($search) {
                $query_data = Book::where($key, 'LIKE', '%' . $value . '%')->paginate();
            }
            else {
                $query_data = Book::where($key, $value)->paginate();
            }
            $books = [];
            foreach ($query_data as $single_data) {
                $collections_names = [];
                if (!empty($single_data->collections)) {
                    foreach ($single_data->collections as $collection) {
                        // dd($collection);
                        $name = $collection->translations()->first()->name;
                        $collections_names[] = [
                            'id' => $collection->id,
                            'name' => $name,
                        ];
                    }
                    // dd($collections_names);
                }
                $collaborators = \App\Http\Controllers\CollaboratorController::getCollaboratorsArray($single_data->id);
                // dd($single_data);
                $books[] = [
                    'id' => $single_data->id,
                    'title' => $single_data->title,
                    'description' => $single_data->description,
                    'slug' => $single_data->slug,
                    'lang' => $single_data->languages()->first()->iso,
                    'isbn' => $single_data->isbn,
                    'publisher' => $single_data->publisher,
                    'image' => $single_data->image,
                    'pvp' => $single_data->pvp,
                    'iva' => $single_data->iva,
                    'discounted_price' => $single_data->discounted_price,
                    'stock' => $single_data->stock,
                    'visible' => $single_data->visible,
                    'sample_url' => $single_data->sample,
                    'number_of_pages' => $single_data->number_of_pages,
                    'publication_date' => date('Y-m-d', strtotime($single_data->publication_date)),
                    'collections' => $collections_names,
                    'collaborators' => $collaborators,
                    'original_title' => $single_data->original_title,
                    'original_publication_date' => date('Y-m-d', strtotime($single_data->original_publication_date)),
                    'original_publisher' => $single_data->original_publisher,
                    'legal_diposit' => $single_data->legal_diposit,
                    'headline' => $single_data->headline,
                    'size' => $single_data->size,
                    'enviromental_footprint' => $single_data->enviromental_footprint,
                    'meta_title' => $single_data->meta_title,
                    'meta_description' => $single_data->meta_description,
                    'filter' => $key ? ['key' => $key, 'value' => self::searchDetails($single_data->$key, $value, 5)] :  ''
                ];
            }
            return $books;
        // }
        // catch (Exception $e) {
        //     abort(500, 'Server Error');
        // }
    }

    /*
        Metodo para uso de store y update
        (genera los cambios no ofrecidos por los
        metodos update y store de los modelos)
    */
    private function setBookData($book, $request)
    {
        try {
            if ($request->has('authors')) {
                $authors = array_unique($request->input('authors'));
                foreach ($authors as $collaborator_id) {
                    $author = \App\Models\Author::where('collaborator_id', $collaborator_id)->first();
                    if (!$author) {
                        \App\Models\Author::create([
                            'id' => $collaborator_id,
                            'collaborator_id' => $collaborator_id,
                            // 'represented_by_agency' => true,
                        ]);
                    }
                }
                $book->authors()->sync($authors);
            }


            if ($request->has('translators')) {
                $translators = array_unique($request->input('translators'));
                foreach ($translators as $collaborator_id) {
                    $translator = \App\Models\Translator::where('collaborator_id', $collaborator_id)->first();
                    if (!$translator) {
                        \App\Models\Translator::create([
                            'id' => $collaborator_id,
                            'collaborator_id' => $collaborator_id,
                        ]);
                    }
                }
                $book->translators()->sync($translators);
            }
            else{
                $book->translators()->detach();
            }


            $request->has('collections') ? $book->collections()->sync(array_unique($request->input('collections'))) : '';

            $request->has('lang') ? $book->languages()->sync(array_unique($request->input('lang'))) : '';

            if ($request->has('extras')) {
                foreach ($request->input('extras') as $extra) {
                    $extras_bd = \App\Models\BookExtra::where('book_id', 'LIKE', $book->id)
                        ->where('key', 'LIKE', $extra['key'])->first();
                    if (!$extras_bd) {
                        if ($extra['key'] && $extra['value']) {
                            \App\Models\BookExtra::create([
                                'book_id' => $book->id,
                                'key' => $extra['key'],
                                'value' => $extra['value']
                            ]);
                        }
                    }
                }
            }

            if ($request->hasFile('image_file')) {
                // Obtener el archivo de imagen
                $imagen = $request->file('image_file');
                $slug = \App\Http\Actions\FormatDocument::slugify($request['title']);

                $nombreImagenOriginal = $slug . ".webp"; //. $imagen->getClientOriginalExtension();

                // // Procesar y guardar la imagen
                $imagen->move(public_path('img/temp/'), $nombreImagenOriginal);
                $imageHelper = new ImageHelper();
                $imageHelper->editImage($nombreImagenOriginal, "book");

                $book->image = $nombreImagenOriginal;
                $book->save();
            } else {
                if (!$request->image) {
                    $book->image = "default.webp";
                }
            }

            if ($request->hasFile('sample')) {
                $sample = $request->file('sample');
                $slug = \App\Http\Actions\FormatDocument::slugify($request['title']);
                // dump($sample);

                $sampleFilename = $slug . ".pdf";

                $uploadManager = new UploadManager();
                $uploadManager->uploadFile($sample, "files/samples", $sampleFilename);
                $book->sample = $sampleFilename;
                $book->save();
            }
        } catch (Exception $e) {
            // abort(500, 'Server Error');
            // dd($e);
            return back()->withError($e->getMessage())->withInput();
        }
    }


    /**
     * Method used to generate the images needed for Books Post Type
     */
    public function editImage($filename)
    {
        $imageHelper = new ImageHelper();
        $imageHelper->editImage($filename, "book");
    }

    /**
     * Searches for the $searchValue in $text. Returns a string with $searchValue and 20 words before and after it
     *
     * @param string $text the text to search the value in
     * @param string $searchValue the value to search
     * @param int $numberOfWords the number of words before and after the search value
     *
     * @return array []
     */
    private static function searchDetails($text, $searchValue, int $numberOfWords){
        // we should make a class out of this
        $unwanted_array = array(    'Š'=>'S', 'š'=>'s', 'Ž'=>'Z', 'ž'=>'z', 'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E',
                            'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U',
                            'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss', 'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c',
                            'è'=>'e', 'é'=>'e', 'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o', 'ô'=>'o', 'õ'=>'o',
                            'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'þ'=>'b', 'ÿ'=>'y' );

        $haystack = strtolower(strtr($text, $unwanted_array));
        $needle = strtolower(strtr($searchValue, $unwanted_array));

        if (!str_contains($haystack, $needle)) {
            return null;
        }

        $segments = explode($needle, $haystack, 2);
        $beforeWordsArray = preg_split('/\s+/', $segments[0]);
        $afterWordsArray = preg_split('/\s+/', $segments[1]);

        $beforeArrayBiggerThanNumberOfWords = false;
        if(count($beforeWordsArray) > $numberOfWords){
            $beforeArrayBiggerThanNumberOfWords = true;
        }
        $beforeWordsArray = array_slice($beforeWordsArray, -($numberOfWords));
        if($beforeArrayBiggerThanNumberOfWords){
            array_unshift($beforeWordsArray , '...');
        }

        $afterArrayBiggerThanNumberOfWords = false;
        if(count($afterWordsArray) > $numberOfWords){
            $afterArrayBiggerThanNumberOfWords = true;
        }
        $afterWordsArray = array_slice($afterWordsArray, 0, $numberOfWords);
        if($afterArrayBiggerThanNumberOfWords){
            array_push($afterWordsArray , '...');
        }

        return [$beforeWordsArray, $searchValue, $afterWordsArray];
    }
}
