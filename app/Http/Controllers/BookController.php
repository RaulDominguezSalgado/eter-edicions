<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Collection;
use App\Http\Requests\BookRequest;
use Exception;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Intervention\Image\Encoders\WebpEncoder;
use PhpParser\Node\Stmt\TryCatch;

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
            
            $book->update($new_data); //Actualizar el contenido del libro
            // dd($request->all());
            $this->setBookData($book, $request);


            // Controla la selección del usuario
            if ($request->input('action') == 'redirect') {
                return redirect()->route('books.index')
                ->with('success', 'Book updated successfully');
            }
            else if ($request->input('action') == 'stay') {
                return redirect()->route('books.edit', $book->id)
                ->with('success', 'Book updated successfully');
            }
        }
        catch (Exception $e) {
            abort(500, 'Server Error');
        }
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


            $related_books = [];

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
            return $bookResult;
        }
        catch (Exception $e) {
            abort(500, 'Server Error');
        }
    }

    /**
     * Display a listing of the resource for the public users.
     */
    private function getCollaboratorsArray($id)
    {
        try {
            $locale = 'ca';

            $book = Book::find($id);

            $authors = [];
            foreach ($book->authors()->get() as $author) {
                $collaborator = \App\Models\Collaborator::find($author->collaborator_id);
                $translation = $collaborator->translations()->where('lang', 'ca')->first();
                
                $authors[] = [
                    'id' => $author->id,
                    'collaborator_id' => $author->collaborator_id,
                    'first_name' => $translation->first_name,
                    'last_name' => $translation->last_name,
                    'full_name' => $translation->first_name." ".$translation->last_name,
                    'biography' => $translation->biography,
                    'image' => $collaborator->image,
                ];
            }

            $translators = [];
            foreach ($book->translators()->get() as $translator) {
                $collaborator = \App\Models\Collaborator::find($translator->collaborator_id);
                $translation = $collaborator->translations()->where('lang', 'ca')->first();
                $translators[] = [
                    'id' => $translator->id,
                    'collaborator_id' => $translator->collaborator_id,
                    'first_name' => $translation->first_name,
                    'last_name' => $translation->last_name,
                    'full_name' => $translation->first_name." ".$translation->last_name,
                    'biography' => $translation->biography,
                    'image' => $collaborator->image,
                ];
            }
            return [
                'authors' => $authors,
                'translators' => $translators,
            ];
        }
        catch (Exception $e) {
            abort(500, 'Server Error');
        }
    }

    private function getData($key = null, $value = null) {
        try {
            $locale = 'ca';

            if ($key == null || $value == null) {
                $query_data = Book::paginate();
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
                $collaborators = $this->getCollaboratorsArray($single_data->id);
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
        }
        catch (Exception $e) {
            abort(500, 'Server Error');
        }
    }

    public function editImage($rutaImagen){
        try {
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
        }
        catch (Exception $e) {
            abort(500, 'Server Error');
        }
    }
}
