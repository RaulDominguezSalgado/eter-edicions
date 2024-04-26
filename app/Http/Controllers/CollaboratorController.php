<?php

namespace App\Http\Controllers;

use App\Models\Collaborator;
use App\Models\CollaboratorTranslation;
use App\Http\Requests\CollaboratorRequest;
use App\Models\Author;
use Exception;
use Illuminate\Validation\ValidationException;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;
use Intervention\Image\Encoders\WebpEncoder;
use Illuminate\Database\QueryException;
/**
 * Class CollaboratorController
 * @package App\Http\Controllers
 */
class CollaboratorController extends Controller
{
    private $lang = "ca";

    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $collaborators = Collaborator::paginate();
        $collaboratorsArray = [];

        //mostrar solo en español
        foreach ($collaborators as $collaborator) {
            $translation = $collaborator->translations()->where('lang', $this->lang)->first();
            if ($translation) {
                $collaboratorsArray[] = [
                    'id' => $collaborator->id,
                    'image' => $collaborator->image,
                    'full_name' => $translation->last_name.", ".$translation->first_name,
                    'lang' => $translation->lang,
                    'social_networks' => json_decode($collaborator->social_networks,true)
                ];
            }
        }

        //opcion 2 que me salgan todos los colaboradores en todos los idiomas
        // foreach ($collaborators as $collaborator) {
        //     foreach ($collaborator->translations as $collabtrad) {
        //         $collaboratorsArray[] = [
        //             'id' => $collaborator->id,
        //             'lang'=>$collabtrad->lang,
        //             'image' => $collaborator->image,
        //             'name' => $collabtrad->name,
        //             'last_name' => $collabtrad->last_name,
        //             'social_networks' => $collaborator->social_networks,
        //         ];
        //     }
        // }
        return view('admin.collaborator.index', compact('collaboratorsArray', 'collaborators'))
            ->with('i', (request()->input('page', 1) - 1) * $collaborators->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $collaborator = new Collaborator();
        return view('admin.collaborator.create', compact('collaborator'));
    }

    public function editImage($rutaImagen, $rutaThumbnail){
        $manager = new ImageManager(new Driver());
        $image = $manager->read($rutaImagen);

        $width = $image->width();
        $height = $image->height();

        $widthStd = $height / 1.5;
        $cropNum = $width - $widthStd;

        if ($cropNum > 0) {
            $image->crop($widthStd, $height, position: 'center');
        }

        // Resize the image to 560x400
        $image->resize(560, 400);

        // // If size > 560x400, resize to 720x1080
        // if ($image->width() > 560 || $image->height() > 400) {
        //     $image->resize(560, 400);
        // }

        // Encode the image to webp format with 80% quality
        $image->encode(new WebpEncoder(), 80);

        // Save the processed image
        $image->save($rutaImagen);

        //saving thumbanil
        $image->resize(315,210 );
        $image->save($rutaThumbnail);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(CollaboratorRequest $request)
    {
        try {
            // Validate the request data
            $validatedData = $request->validated();
            if ($request->hasFile('image')) {
                // Obtener el archivo de imagen
                $imagen = $request->file('image');
                $slug = \App\Http\Actions\FormatDocument::slugify($validatedData['first_name']) . '-' . \App\Http\Actions\FormatDocument::slugify($validatedData['last_name']);

                $nombreImagenOriginal = $slug . ".webp"; //. $imagen->getClientOriginalExtension();

                // // Procesar y guardar la imagen
                $rutaImagen = public_path('img/collab/covers/' . $nombreImagenOriginal);
                $rutaMiniatura = public_path('img/collab/thumbnails/' . $nombreImagenOriginal);
                $imagen->move(public_path('img/collab/covers/'), $nombreImagenOriginal);
                $this->editImage($rutaImagen, $rutaMiniatura);

                $validatedData['image'] = $nombreImagenOriginal;
            }else{
                $validatedData['image']="default.webp";
            }
            $redes_sociales = [];
            if ($request->filled('red_social')) {
                foreach ($request->input('red_social') as $index => $red_social) {
                    if ($request->filled('usuario_red_social.' . $index)) {
                        $redes_sociales[$red_social] = $request->input('usuario_red_social.' . $index);
                    }
                }
            }
            $redes_sociales_json = json_encode($redes_sociales);

            // Create the collaborator
            $collaboratorData = [
                'image' => $validatedData['image'],
                'social_networks' => $redes_sociales_json
            ];
            $collaborator = Collaborator::create($collaboratorData);

            $translationData = [
                'collaborator_id' => $collaborator->id,
                'first_name' => $validatedData['first_name'],
                'last_name' => $validatedData['last_name'],
                'biography' => $validatedData['biography'],
                'slug' => \App\Http\Actions\FormatDocument::slugify($validatedData['first_name']) . "-" . \App\Http\Actions\FormatDocument::slugify($validatedData['last_name']),
                'lang' => $validatedData['lang'],
                'meta_title'=>\App\Http\Actions\FormatDocument::slugify($validatedData['first_name']) . "-" . \App\Http\Actions\FormatDocument::slugify($validatedData['last_name']),
                'meta_description'=>$validatedData['biography']
            ];
            CollaboratorTranslation::create($translationData);
            return redirect()->route('collaborators.index')
                ->with('success', 'Collaborator created successfully.');
        } catch (ValidationException $e) {
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $locale = $this->lang;

        $collaborator=$this->getFullCollaborator( $id, $locale);
        $collaborator=$this->getFullCollaborator( $id, $locale);

        return view('admin.collaborator.show', compact('collaborator'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $locale = $this->lang;

        $collaborator = $this->getFullCollaborator($id, $locale);

        return view('admin.collaborator.edit', compact('collaborator'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CollaboratorRequest $request, Collaborator $collaborator)
    {
        //$collaborator->update($request->validated());

        $validatedData = $request->validated();
        if ($request->hasFile('image')) {
            // Obtener el archivo de imagen
            $imagen = $request->file('image');
            $slug = \App\Http\Actions\FormatDocument::slugify($validatedData['first_name']) . '-' . \App\Http\Actions\FormatDocument::slugify($validatedData['last_name']);

            $nombreImagenOriginal = $slug . ".webp"; //. $imagen->getClientOriginalExtension();

            // // Procesar y guardar la imagen
            $rutaImagen = public_path('img/collab/covers/' . $nombreImagenOriginal);
            $rutaMiniatura = public_path('img/collab/thumbnails/' . $nombreImagenOriginal);
            $imagen->move(public_path('img/collab/covers/'), $nombreImagenOriginal);
            $this->editImage($rutaImagen,$rutaMiniatura);

            $validatedData['image'] = $nombreImagenOriginal;
        }else{
            $validatedData['image']=$collaborator->image;
        }
        $redes_sociales = [];
        if ($request->filled('red_social')) {
            foreach ($request->input('red_social') as $index => $red_social) {
                if ($request->filled('usuario_red_social.' . $index)) {
                    $redes_sociales[$red_social] = $request->input('usuario_red_social.' . $index);
                }
            }
        }
        $redes_sociales_json = json_encode($redes_sociales);

        $collaborator->update([
            'image' => $validatedData['image'],
            'social_networks' => $redes_sociales_json
        ]);

        $translation=$collaborator->translations()->where('lang',$this->lang)->first();
        if($translation){
            $translation->update( [
                'collaborator_id' => $collaborator->id,
                'first_name' => $validatedData['first_name'],
                'last_name' => $validatedData['last_name'],
                'biography' => $validatedData['biography'],
                'slug' => \App\Http\Actions\FormatDocument::slugify($validatedData['first_name']) . "-" . \App\Http\Actions\FormatDocument::slugify($validatedData['last_name']),
                'lang' => $validatedData['lang'],
                'meta_title'=>\App\Http\Actions\FormatDocument::slugify($validatedData['first_name']) . "-" . \App\Http\Actions\FormatDocument::slugify($validatedData['last_name']),
                'meta_description'=>$validatedData['biography']
            ]);
        }
        return redirect()->route('collaborators.index')
            ->with('success', 'Collaborator updated successfully');
    }

    public function destroy($id)
    {
        try {
            Collaborator::find($id)->delete();
            return redirect()->route('collaborators.index')->with('success', 'Col·laborador eliminat correctament');
        } catch (QueryException $e) {
            return redirect()->route('collaborators.index')->with('error', 'No es possible eliminar aquest autor, ja que té dades relacionades');
        }
    }


    public function collaborators(){
        $locale = 'ca';
        $page = [
            'title' => 'Autors i traductors',
            'shortDescription' => '',
            'longDescription' => '',
            'web' => 'Èter Edicions'
        ];

        $collaborators_lv = Collaborator::paginate();

        $authors = [];
        $translators = [];

        foreach($collaborators_lv as $collab){
            $collaborator=$this->getFullCollaborator($collab->id, $locale);

            if($collab->author){
                $authors[]=$collaborator;
            }
            if($collab->translator){
                $translators[]=$collaborator;
            }
        }

        $collaboratorTypes = [
            'authors' => 'Autors',
            'translators' => "Traductors"
        ];

        return view('public.collaborators', compact('collaborators_lv', 'authors', 'translators', 'collaboratorTypes', 'page', 'locale'))
            ->with('i', (request()->input('page', 1) - 1) * $collaborators_lv->perPage());
    }

    public function collaboratorDetail($id){
        $locale = 'ca';
        $page = [
            'title' => 'Autors i traductors',
            'shortDescription' => '',
            'longDescription' => '',
            'web' => 'Èter Edicions'
        ];

        // $collaborator_lv = Collaborator::find($id);
        // return dd($book_lv->id);

        $collaborator = $this->getFullCollaborator($id, $locale);

        // dd($collaborator);

        $page = [
            'title' => $collaborator['first_name'] . " " . $collaborator['last_name'],
            'shortDescription' => '',
            'longDescription' => '',
            'web' => 'Èter Edicions'
        ];

        // dd($page);

        return view('public.collaborator', compact('collaborator', 'page', 'locale'));
    }

    public function agency(){
        $locale = 'ca';
        $page = [
            'title' => 'Autors i traductors',
            'shortDescription' => '',
            'longDescription' => '',
            'web' => 'Èter Edicions'
        ];

        $authors_lv = Author::where('represented_by_agency', 'LIKE', 1)->paginate();

        $collaborators_lv = [];
        foreach($authors_lv as $author){
            $collaborators_lv[]=$author->collaborator;
        }

        // $authors = [];
        // $translators = [];

        $collaborators = [];

        foreach($collaborators_lv as $collab){
            $collaborator=$this->getFullCollaborator($collab->id, $locale);
            $collaborators[]=$collaborator;

            // if($collab->author){
            //     $authors[]=$collaborator;
            // }
            // if($collab->translator){
            //     $translators[]=$collaborator;
            // }
        }

        return view('public.agency', compact('collaborators_lv', 'collaborators', 'page', 'locale'));
    }


    public function getFullCollaborator($id, $locale){
        $collab = Collaborator::find($id);
        // $collaborator = [];
        $translation = $collab->translations->where('lang', $locale)->first();
        if ($translation) {
            $collaborator = [
                'id' => $collab->id,
                'image' => $collab->image,
                'first_name' => $translation->first_name,
                'last_name' => $translation->last_name,
                'lang' => $translation->lang,
                'biography' => $translation->biography,
                'slug' => $translation->slug,
                'social_networks' => json_decode($collab->social_networks, true)
            ];
        }
        if(!is_null($collab->author)){
            foreach($collab->author->books()->where('visible', 'LIKE', 1)->get() as $book){
                $collaborator['books'][$book->title] = [
                    'id' => $book->id,
                    'title' => $book->title,
                    'image' => $book->image,
                    'slug' => $book->slug
                ];
            }
        }
        if(!is_null($collab->translator)){
            foreach($collab->translator->books()->where('visible', 'LIKE', 1)->get() as $book){
                $collaborator['books'][$book->title] = [
                    'id' => $book->id,
                    'title' => $book->title,
                    'image' => $book->image,
                    'slug' => $book->slug
                ];
            }
        }

        return $collaborator;
    }

    /**
     * Display a listing of the resource for the public users.
     */
    public static function getCollaboratorsArray($id)
    {
        try {
            $locale = 'ca';

            $book = \App\Models\Book::find($id);

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


    /**
    * Method that generates the Author array used by the view
    */
    public static function getData($key = null, $value = null, $search = false) {
        // try {
            $locale = 'ca';
            $query_data = [];

            if ($key == null || $value == null) {
                $query_data = Collaborator::paginate();
            }
            else if ($search) {
                switch ($key) {
                    case 'id':
                    case 'collaborator_id':
                        $query_data = Collaborator::where($key, 'LIKE', '%' . $value . '%')->translation()->paginate();
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
                        ->paginate();
                    break;
                    default:
                        $query_data = [];
                    break;
                }
            }
            else {
                $query_data = Collaborator::where($key, $value)->paginate();
            }
            $collaborators = [];
            foreach ($query_data as $single_data) {
                $collaborators[] = [
                    'id' => $single_data->collaborator()->first()->id,
                    'image' => $single_data->collaborator()->first()->image,
                    'first_name' => $single_data->first_name,
                    'last_name' => $single_data->last_name,
                    'full_name' => $single_data->first_name." ".$single_data->last_name,
                    'biography' => $single_data->biography,
                    'slug' => \App\Http\Actions\FormatDocument::slugify($single_data),
                    'lang' => $single_data->lang,
                ];
            }

            return $collaborators;
        // }
        // catch (Exception $e) {
        //     abort(500, 'Server Error');
        // }
    }
}
