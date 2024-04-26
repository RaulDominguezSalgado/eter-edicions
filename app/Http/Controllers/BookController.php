<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Bookstore;
use App\Models\Collection;
use App\Http\Requests\BookRequest;
use App\Models\Collaborator;
use App\Models\CollaboratorTranslation;
use App\Models\CollectionTranslation;
use App\Models\Language;
use App\Models\LanguageTranslation;
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
        $authors=CollaboratorTranslation::where("lang",$this->lang)->get();
        $translators=CollaboratorTranslation::where("lang",$this->lang)->get();
        $languages = LanguageTranslation::where("iso_translation",$this->lang)->get();
        $collections= CollectionTranslation::where("lang", $this->lang)->get();
            return view('admin.book.create', compact('book','authors','translators','languages','collections'));
        } catch (Exception $e) {
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
            } else if ($request->input('action') == 'stay') {
                return redirect()->route('books.edit', $book->id)
                    ->with('success', 'Book created successfully');
            }
        } catch (Exception $e) {
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
        /*try {*/
            /* Get the book data */
            $book = $this->getData('id', $id)[0];

            /* Get all collaborators data */
            $collaborators = [];
            $collaborators_raw = \App\Models\Collaborator::with('translations')->get();
            foreach ($collaborators_raw as $collaborator_raw) {
                foreach ($collaborator_raw->translations->where('lang', 'ca') as $translation) {
                    $collaborators[] = [
                        'id' => $collaborator_raw->id,
                        'full_name' => $translation->first_name." ".$translation->last_name,
                    ];
                }
            }


            /* Get all languages data */
            $languages_raw = \App\Models\Language::get();
            $languages = [];
            foreach ($languages_raw as $language) {
                $languages[] = $language->iso;
            }


            /* Get all collections data */
            $collections_raw = \App\Models\Collection::with('translations')->get();
            $collections = [];
            foreach ($collections_raw as $collection) {
                foreach ($collection->translations->where('lang', 'ca') as $translation) {
                    $collections[] = [
                        'id' => $collection->id,
                        'name' => $translation->name,
                    ];
                }
            }


            return view('admin.book.edit', compact('book', 'collaborators', 'languages', 'collections'));
        /*} catch (Exception $e) {
            abort(500, 'Server Error');
        }*/
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BookRequest $request, Book $book)
    {
        try {
            // \App\Models\Book::class;
            $new_data = $request->validated();

            if ($request->input('visible') != null) {
                $request->merge([
                    'visible' => $request->input('visible') == 'on' ? 1 : 0,
                ]);
                $new_data['visible'] = $new_data['visible']  == 'on' ? 1 : 0;
            }
            else {
                $request->merge([
                    'visible' => 0,
                ]);
                $new_data['visible'] = 0;
            }

            if ($request->input('slug_options') && $request->input('title') != null) {
                $request->merge([
                    'slug' => \App\Http\Actions\FormatDocument::slugify($request['title'])
                ]);
                $new_data['slug'] = \App\Http\Actions\FormatDocument::slugify($request['title']);
            }



            $book->update($new_data);

            $this->setBookData($book, $request);

            // Controla la selección del usuario
            if ($request->input('action') == 'redirect') {
                return redirect()->route('books.index')
                    ->with('success', 'Book created successfully');
            } else if ($request->input('action') == 'stay') {
                return redirect()->route('books.edit', $book->id)
                    ->with('success', 'Book created successfully');
            }
        } catch (Exception $e) {
            abort(500, 'Server Error');
        }
    }

    public function destroy($id)
    {
        try {
            Book::find($id)->delete();

            return redirect()->route('admin.books.index')
                ->with('success', 'Book deleted successfully');
        } catch (Exception $e) {
            abort(500, 'Server Error');
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

    public function redirectViewStock($id)
    {
        $locale = "ca";

        // Obtener el libro con el ID especificado
        $book = $this->getFullBook(Book::findOrFail($id), $locale);
        $bookstores=Bookstore::all();
        //dd($book);
        // Devolver la vista con los datos del libro
        return view('admin.book.stock', compact('book','bookstores'));
    }

    public function editStock($id)
    {
        $locale = "ca";

        $book = $this->getFullBook(Book::findOrFail($id), $locale);
        $bookstores=Bookstore::all();

        return view('admin.user.edit', compact('book'));
    }

    public function updateBookstoreStock(StockRequest $request, $bookId)
    {
        // dd($request);
        // if($request){

        // }
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
                ];
            }
            return $books;
        // }
        // catch (Exception $e) {
        //     abort(500, 'Server Error');
        // }
    }

    /**
     * Method used to genrerate the images needed for Books Post Type
     */
    public function editImage($rutaImagen){
        // try {
            $manager = new ImageManager(new Driver());
            $image = $manager->read($rutaImagen);
            // Crop a 1.4 / 1 aspect ratio
            if ($image->width() > $image->height()) {
                $heightStd = $image->width() / 1.4;
                $cropNum = $image->height() - $heightStd;
                if ($cropNum > 0) {
                    $image->crop($image->width(), $heightStd);
                }
            } else {
                $heightStd = $image->width() / 1.4;
                $cropNum = $image->height() - $heightStd;
                if ($cropNum > 0) {
                    $image->crop($heightStd, $image->height());
                }
            }

            // Resize the image to 560x400
            $image->resize(560, 400);

            // If size > 560x400, resize to 720x1080
            if ($image->width() > 560 || $image->height() > 400) {
                $image->resize(560, 400);
            }

            // Encode the image to webp format with 80% quality
            $image->encode(new WebpEncoder(), 80);

            // Save the processed image
            $image->save($rutaImagen);
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
    private function setBookData ($book, $request) {
        try {
            $book->authors()->detach(); // Eliminamos los autores actuales
            if ($request->has('authors')) { // Y les añadimos los del formulario si se han dado
                $authors = array_unique($request->input('authors'));
                foreach ($authors as $collaborator_id) {
                    $author = \App\Models\Author::where('collaborator_id',$collaborator_id)->first();
                    
                    if (!$author) {
                        \App\Models\Author::create([
                            'id' => $collaborator_id,
                            'collaborator_id' => $collaborator_id,
                            'represented_by_agency' => true,
                        ]);
                        $author = \App\Models\Author::where('id',$collaborator_id)->first();
                        // dd($author);
                    }
                    
                    $book->authors()->attach($collaborator_id);
                }
            }
            
            $book->translators()->detach(); // Eliminamos los autores actuales
            if ($request->has('translators')) { // Y les añadimos los del formulario si se han dado
                $translators = array_unique($request->input('translators'));
                foreach ($translators as $collaborator_id) {
                    $translator = \App\Models\Translator::where('collaborator_id',$collaborator_id)->first();
                    
                    if (!$translator) {
                        \App\Models\Translator::create([
                            'id' => $collaborator_id,
                            'collaborator_id' => $collaborator_id,
                        ]);
                        $translator = \App\Models\Translator::where('id',$collaborator_id)->first();
                        // dd($author);
                    }
                    
                    $book->translators()->attach($collaborator_id);
                }
            }

            $book->collections()->detach(); // Eliminamos las colecciones actuales
            if ($request->has('collections')) { // Y les añadimos los del formulario si se han dado
                $collections = array_unique($request->input('collections'));
                foreach ($collections as $collection_id) {
                    $book->collections()->attach($collection_id);
                }
            }

            $book->languages()->detach(); // Eliminamos el idioma actuale
            if ($request->has('languages')) { // Y le añadimos el del formulario si se ha dado
                
                $book->languages()->attach($request->input('languages'));
            }

            if ($request->hasFile('image_file')) {
                // Obtener el archivo de imagen
                $imagen = $request->file('image_file');
                $slug = \App\Http\Actions\FormatDocument::slugify($request['title']);

                $nombreImagenOriginal = $slug . ".webp"; //. $imagen->getClientOriginalExtension();

                // // Procesar y guardar la imagen
                $rutaImagen = public_path('img/books/covers/' . $nombreImagenOriginal);
                $imagen->move(public_path('img/books/covers/'), $nombreImagenOriginal);
                $this->editImage($rutaImagen);

                $rutaMiniatura = public_path('img/books/thumbnails/' . $nombreImagenOriginal);
                copy($rutaImagen, $rutaMiniatura);
                $this->editImage($rutaMiniatura);

                $book->image = $nombreImagenOriginal;
            } else {
                $book->image = "default.webp";
            }
        }
        catch (Exception $e) {
            abort(500, 'Server Error');
        }
    }
}
