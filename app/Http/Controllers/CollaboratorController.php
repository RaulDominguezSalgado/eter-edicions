<?php

namespace App\Http\Controllers;

use App\Http\Actions\ImageHelperEditor;
use App\Models\Collaborator;
use App\Models\CollaboratorTranslation;
use App\Http\Requests\CollaboratorRequest;
use App\Models\Author;
use App\Models\Language;
use App\Models\LanguageTranslation;
use Exception;
use Illuminate\Validation\ValidationException;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;
use Intervention\Image\Encoders\WebpEncoder;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\Builder;

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

        //mostrar solo en catalán
        foreach ($collaborators as $collaborator) {
            $translation = $collaborator->translations()->where('lang', $this->lang)->first();
            if ($translation) {
                $collaboratorsArray[] = [
                    'id' => $collaborator->id,
                    'image' => $collaborator->image,
                    'full_name' => $translation->last_name . ", " . $translation->first_name,
                    'lang' => $translation->lang,
                    'social_networks' => json_decode($collaborator->social_networks, true)
                ];
            }
        }
        return view('admin.collaborator.index', compact('collaboratorsArray', 'collaborators'))
            ->with('i', (request()->input('page', 1) - 1) * $collaborators->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $collaborator = new Collaborator();
        // $this->getCollaborator();
        $languages = LanguageTranslation::where('iso_translation', $this->lang)
            ->where(function ($query) {
                $query->where('iso_language', 'ca')
                    ->orWhere('iso_language', 'es');
            })
            ->get();
        return view('admin.collaborator.create', compact('collaborator', 'languages'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CollaboratorRequest $request)
    {
        try {
            // Validate the request data
            //dd($request);
            $validatedData = $request->validated();
            $translationData = [];
            $imageInserted = false;
            if ($request->hasFile('image')) {
                // Obtener el archivo de imagen
                $validatedData['image'] = "procesingImage.webp";
                $imageInserted = true;
            } else {
                $validatedData['image'] = "default.webp";
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

            foreach ($validatedData['translations'] as $language => $translation) {
                if ($translation) {
                    if ($language == "ca" && $imageInserted) {
                        $imagen = $request->file('image');
                        $slug = \App\Http\Actions\FormatDocument::slugify($translation['first_name']) . '-' . \App\Http\Actions\FormatDocument::slugify($translation['last_name']);

                        $nombreImagenOriginal = $slug . ".webp"; //. $imagen->getClientOriginalExtension();

                        // // Procesar y guardar la imagen
                        $imagen->move(public_path('img/temp/'), $nombreImagenOriginal);

                        ImageHelperEditor::editImage($nombreImagenOriginal, "collaborator");
                        // updating the collaborator
                        $c = Collaborator::find($collaborator->id);
                        $c->image = $nombreImagenOriginal;
                        $c->save();
                    }
                    $translationData = [
                        'collaborator_id' => $collaborator->id,
                        'first_name' => $translation['first_name'],
                        'last_name' => $translation['last_name'],
                        'biography' => $translation['biography'],
                        'slug' => \App\Http\Actions\FormatDocument::slugify($translation['first_name']) . "-" . \App\Http\Actions\FormatDocument::slugify($translation['last_name']),
                        'lang' => $language,
                        'meta_title' => \App\Http\Actions\FormatDocument::slugify($translation['first_name']) . "-" . \App\Http\Actions\FormatDocument::slugify($translation['last_name']),
                        'meta_description' => $translation['biography']
                    ];
                    CollaboratorTranslation::create($translationData);
                    // dd($translationData);
                }
            }

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
        $collaborator = $this->getFullCollaborator($id, $locale);

        return view('admin.collaborator.show', compact('collaborator'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $locale = $this->lang;

        // $languages= LanguageTranslation::where("iso_translation", $locale)->get();
        $languages = LanguageTranslation::where('iso_translation', $this->lang)
            ->where(function ($query) {
                $query->where('iso_language', 'ca')
                    ->orWhere('iso_language', 'es');
            })
            ->get();

        // dd($languages);
        $collaborator = $this->getCollaborator($id);
        // dd($collaborator);
        return view('admin.collaborator.edit', compact('collaborator', 'languages'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CollaboratorRequest $request, Collaborator $collaborator)
    {
        //$collaborator->update($request->validated());
        //dd($request);
        $validatedData = $request->validated();
        $imageUpdated = false;
        if ($request->hasFile('image')) {
            // Obtener el archivo de imagen
            $imageUpdated = true;
            // $imagen = $request->file('image');
            // $slug = \App\Http\Actions\FormatDocument::slugify($validatedData['first_name']) . '-' . \App\Http\Actions\FormatDocument::slugify($validatedData['last_name']);

            // $nombreImagenOriginal = $slug . ".webp"; //. $imagen->getClientOriginalExtension();

            // // // Procesar y guardar la imagen
            // $imagen->move(public_path('img/temp/'), $nombreImagenOriginal);
            // // $this->editImage($nombreImagenOriginal, "collaborator");
            // ImageHelperEditor::editImage($nombreImagenOriginal, "collaborator");
        }

        $validatedData['image'] = $collaborator->image;

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
        foreach ($validatedData['translations'] as $language => $data) {
            $translation = $collaborator->translations()->where('lang', $language)->first();
            if ($translation) {
                $slug = \App\Http\Actions\FormatDocument::slugify($data['first_name']) . '-' . \App\Http\Actions\FormatDocument::slugify($data['last_name']);
                if($imageUpdated && $language == "ca"){
                    $imagen = $request->file('image');

                    $nombreImagenOriginal = $slug . ".webp"; //. $imagen->getClientOriginalExtension();

                    // // Procesar y guardar la imagen
                    $imagen->move(public_path('img/temp/'), $nombreImagenOriginal);

                    ImageHelperEditor::editImage($nombreImagenOriginal, "collaborator");
                    // updating the collaborator
                    $c = Collaborator::find($collaborator->id);
                    $c->image = $nombreImagenOriginal;
                    $c->save();
                }
                $translation->update([
                    'first_name' => $data['first_name'],
                    'last_name' => $data['last_name'],
                    'biography' => $data['biography'],
                    'slug' =>$slug,
                    'lang' => $language,
                    'meta_title' => $slug,
                    'meta_description' => $data['biography']
                ]);
            }
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


    public function collaborators()
    {
        // $locale = Config::get('app.locale');
        $locale = app()->getLocale();
        // $locale = 'ca';

        $page = [
            'title' => ucfirst(trans_choice('general.authors', 2)) . " " . __('orthographicRules.and') . " " . strtolower(trans_choice('general.translators', 2)),
            'shortDescription' => '',
            'longDescription' => '',
            'web' => 'Èter Edicions'
        ];

        $collaborators_lv = Collaborator::paginate();

        $authors = [];
        $translators = [];

        foreach ($collaborators_lv as $collab) {
            $collaborator = $this->getFullCollaborator($collab->id, $locale);

            if ($collab->author) {
                $authors[] = $collaborator;
            }
            if ($collab->translator) {
                $translators[] = $collaborator;
            }
        }

        $collaboratorTypes = [
            'authors' => trans_choice('general.authors', 2),
            'translators' => trans_choice('general.translators', 2)
        ];

        return view('public.collaborators', compact('collaborators_lv', 'authors', 'translators', 'collaboratorTypes', 'page', 'locale'))
            ->with('i', (request()->input('page', 1) - 1) * $collaborators_lv->perPage());
    }

    public function collaboratorDetail($id)
    {
        // $locale = Config::get('app.locale');
        $locale = app()->getLocale();
        // $locale = 'ca';

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

    public function agency()
    {
        // $locale = Config::get('app.locale');
        $locale = app()->getLocale();
        // $locale = 'ca';

        // $pageController = new PageController();
        // $page = $pageController->getFullPage('agency', $locale);

        $authors_lv = Author::where('represented_by_agency', 'LIKE', 1)->paginate();

        $collaborators_lv = [];
        foreach ($authors_lv as $author) {
            $collaborators_lv[] = $author->collaborator;
        }

        // $authors = [];
        // $translators = [];

        $collaborators = [];

        foreach ($collaborators_lv as $collab) {
            $collaborator = $this->getFullCollaborator($collab->id, $locale);
            $collaborators[] = $collaborator;

            // if($collab->author){
            //     $authors[]=$collaborator;
            // }
            // if($collab->translator){
            //     $translators[]=$collaborator;
            // }
        }

        return [$collaborators_lv, $collaborators];
    }

    /**
     * Get all the relevant details of a collaborator
     *
     * @param int $id: the id of the collaborator
     * @param string $locale: the current language of the app
     *
     * @return array $collaborator
     */
    public function getCollaborator($id = 0)
    {
        $collab = Collaborator::find($id);
        // $collaborator = [];
        // if ($id = 0) {
        //     $collaborator = [
        //         'id' => null,
        //         'image' => null,
        //         'social_networks' => null,
        //         'translations' => []
        //     ];

        //     $translations = LanguageTranslation::where('iso_translation', $this->lang)
        //     ->where(function ($query) {
        //         $query->where('iso_language', 'ca')
        //             ->orWhere('iso_language', 'es');
        //     })
        //     ->get();
        //     foreach ($translations as $translation) {
        //         // Verificamos si la traducción es válida
        //         if ($translation) {
        //             $collaborator['translations'][$translation->lang] = [
        //             ];
        //         }
        //     }
        // } else {
        if ($collab) {
            $collaborator = [
                'id' => $collab->id,
                'image' => $collab->image,
                'social_networks' => json_decode($collab->social_networks, true),
                'translations' => []
            ];

            $translations = $collab->translations;

            foreach ($translations as $translation) {
                // Verificamos si la traducción es válida
                if ($translation) {
                    $collaborator['translations'][$translation->lang] = [
                        'first_name' => $translation->first_name,
                        'last_name' => $translation->last_name,
                        'biography' => $translation->biography,
                        'slug' => $translation->slug
                    ];
                }
            }
        }
        // }
        return $collaborator;
    }


    /**
     * Get all the relevant details of a collaborator
     *
     * @param int $id: the id of the collaborator
     * @param string $locale: the current language of the app
     *
     * @return array $collaborator
     */
    public function getFullCollaborator($id, $locale)
    {
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
        if (!is_null($collab->author)) {
            foreach ($collab->author->books()->where('visible', 'LIKE', 1)->get() as $book) {
                $collaborator['books'][$book->title] = [
                    'id' => $book->id,
                    'title' => $book->title,
                    'image' => $book->image,
                    'slug' => $book->slug
                ];
            }
        }
        if (!is_null($collab->translator)) {
            foreach ($collab->translator->books()->where('visible', 'LIKE', 1)->get() as $book) {
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
            // $locale = Config::get('app.locale');
            $locale = app()->getLocale();
            // $locale = 'ca';

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
                    'full_name' => $translation->first_name . " " . $translation->last_name,
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
                    'full_name' => $translation->first_name . " " . $translation->last_name,
                    'biography' => $translation->biography,
                    'image' => $collaborator->image,
                ];
            }
            return [
                'authors' => $authors,
                'translators' => $translators,
            ];
        } catch (Exception $e) {
            abort(500, 'Server Error');
        }
    }


    /**
     * Method that generates the Author array used by the view
     */
    public static function getData($key = null, $value = null, $search = false)
    {
        // try {
        // $locale = Config::get('app.locale');
        $locale = app()->getLocale();
        // $locale = 'ca';

        $query_data = [];

        if ($key == null || $value == null) {
            $query_data = Collaborator::paginate();
        } else if ($search) {
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
        } else {
            $query_data = Collaborator::where($key, $value)->paginate();
        }
        $collaborators = [];
        foreach ($query_data as $single_data) {
            $collaborators[] = [
                'id' => $single_data->collaborator()->first()->id,
                'image' => $single_data->collaborator()->first()->image,
                'first_name' => $single_data->first_name,
                'last_name' => $single_data->last_name,
                'full_name' => $single_data->first_name . " " . $single_data->last_name,
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
    // public function editImage($fileName, $typeImage)
    // {
    //     $reductionRate = 0.6;
    //     $manager = new ImageManager(new Driver());

    //     switch ($typeImage) {
    //         case "collaborator":
    //          $rutaImagen = public_path('img/collab/covers/');
    //     $rutaThumbnail = public_path('img/collab/thumbnails/');

    //     $image = $manager->read($rutaImagen . $fileName);
    //             $image_width = $image->width();
    //             $image_height = $image->height();

    //             $new_width = 668;
    //             $new_height = 446; //intval($new_width * (1 / 1.5));

    //             break;
    //         case "book":
    //             break;
    //         default:
    //             break;
    //     }
    //     if ($image_width > $new_width || $image_height > $new_height) {
    //         $image->cover($new_width, $new_height, "center");
    //     }
    //     // Encode the image to webp format with 80% quality
    //     $image->encode(new WebpEncoder(), 80);

    //     // Save the processed image
    //     $image->save($rutaImagen . $fileName);

    //     $image->cover($new_width * $reductionRate, $new_height * $reductionRate, "center");
    //     $image->save($rutaThumbnail . $fileName);
    // }
}
