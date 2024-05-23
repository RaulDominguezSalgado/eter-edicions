<?php

namespace App\Http\Controllers;

use App\Http\Actions\ImageHelperEditor;
use App\Models\Post;
use App\Http\Requests\PostRequest;
use App\Models\Author;
use App\Models\Collaborator;
use App\Models\User;
use App\Models\Translator;
use App\Models\CollaboratorTranslation;

use App\Services\Translation\OrthographicRules;

use Carbon\Carbon;
use Exception;
use PHPUnit\Metadata\Uses;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

use Illuminate\Http\Exceptions\PostTooLargeException;

/**
 * Class PostController
 * @package App\Http\Controllers
 */
class PostController extends Controller
{
    private $lang = 'ca';
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $locale = app()->getLocale() ?? 'ca';

        $data = $request->validate([
            "title" => "",
            "description" => "",
            "content" => "",
            "publication_date-min" => "",
            "publication_date-max" => "",
            "published_by" => "",
            "search" => "",
        ]);
        if (isset($data["search"]["search"])) {
            // Changes before searching
            $posts = Post::query();
            foreach ($data as $key => $filtro) {
                if ($filtro != null && $filtro != "") {
                    switch ($key) {
                        case "publication_date-min":
                            $posts->where("publication_date", '>=', date($filtro));
                        break;
                        case "publication_date-max":
                            $posts->where("publication_date", '<=', date($filtro));
                        break;
                        case "published_by":
                            $posts->whereHas('user', function($query) use ($filtro) {
                                $query->whereRaw("CONCAT(first_name, ' ', last_name) LIKE ?", ["%{$filtro}%"]);
                            });
                        break;
                        default:
                            if ($key != "search") {
                                $posts->where($key, "like", "%{$filtro}%");
                            }
                        break;
                    }
                }

            }
            $posts = $posts->paginate();
            $postsArray = [];
            foreach ($posts as $post) {
                if ($post->author) {
                    $authorID = $post->author->collaborator->translations->first()->first_name . " " . $post->author->collaborator->translations->first()->last_name;
                } else {
                    $authorID = '';
                }

                if ($post->translator) {
                    $translator = $post->translator->collaborator->translations->first()->first_name . " " . $post->translator->collaborator->translations->first()->last_name;
                } else {
                    $translator = '';
                }

                $postsArray[] = [
                    'id' => $post->id,
                    'title' => $post->title,
                    'description' => $post->description,
                    'author_id' => $authorID,
                    'translator_id' => $translator,
                    'content' => $post->content,
                    'date' => substr($post->date, 0, 10), // Extracts 'YYYY-MM-DD'
                    'time' => substr($post->date, 10, 15),
                    'location' => $post->location,
                    'image' => $post->image,
                    'publication_date' => substr($post->publication_date, 0, 10), // Extracts 'YYYY-MM-DD'
                    'published_by' => $post->user->first_name . " " . $post->user->last_name
                ];
            }
            $old = $data;
            $i = (request()->input('page', 1) - 1) * $posts->perPage();

            return view('admin.post.index', compact('posts', 'old', 'postsArray', 'i'));
        }
        else if (isset($data["search"]["clear"])) {
            $posts = Post::paginate();
            $postsArray = [];
            foreach ($posts as $post) {
                if ($post->author) {
                    $authorID = $post->author->collaborator->translations->first()->first_name . " " . $post->author->collaborator->translations->first()->last_name;
                } else {
                    $authorID = '';
                }

                if ($post->translator) {
                    $translator = $post->translator->collaborator->translations->first()->first_name . " " . $post->translator->collaborator->translations->first()->last_name;
                } else {
                    $translator = '';
                }

                $postsArray[] = [
                    'id' => $post->id,
                    'title' => $post->title,
                    'description' => $post->description,
                    'author_id' => $authorID,
                    'translator_id' => $translator,
                    'content' => $post->content,
                    'date' => substr($post->date, 0, 10), // Extracts 'YYYY-MM-DD'
                    'time' => substr($post->date, 10, 15),
                    'location' => $post->location,
                    'image' => $post->image,
                    'publication_date' => substr($post->publication_date, 0, 10), // Extracts 'YYYY-MM-DD'
                    'published_by' => $post->user->first_name . " " . $post->user->last_name
                ];
            }
            //dd($postsArray);
            return view('admin.post.index', compact('postsArray', 'posts'))
                ->with('i', (request()->input('page', 1) - 1) * $posts->perPage());
        }
        else {
            $posts = Post::paginate();
            $postsArray = [];
            foreach ($posts as $post) {
                if ($post->author) {
                    $authorID = $post->author->collaborator->translations->first()->first_name . " " . $post->author->collaborator->translations->first()->last_name;
                } else {
                    $authorID = '';
                }

                if ($post->translator) {
                    $translator = $post->translator->collaborator->translations->first()->first_name . " " . $post->translator->collaborator->translations->first()->last_name;
                } else {
                    $translator = '';
                }

                $postsArray[] = [
                    'id' => $post->id,
                    'title' => $post->title,
                    'description' => $post->description,
                    'author_id' => $authorID,
                    'translator_id' => $translator,
                    'content' => $post->content,
                    'date' => substr($post->date, 0, 10), // Extracts 'YYYY-MM-DD'
                    'time' => substr($post->date, 10, 15),
                    'location' => $post->location,
                    'image' => $post->image,
                    'publication_date' => substr($post->publication_date, 0, 10), // Extracts 'YYYY-MM-DD'
                    'published_by' => $post->user->first_name . " " . $post->user->last_name
                ];
            }
            //dd($postsArray);
            return view('admin.post.index', compact('postsArray', 'posts'))
                ->with('i', (request()->input('page', 1) - 1) * $posts->perPage());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $post = new Post();
        $authors = Author::paginate();
        $users = User::all();
        $translators = Translator::all();
        return view('admin.post.create', compact('post', 'authors', 'users', 'translators'));
    }


    // public function editImage($rutaImagen)
    // {
    //     $manager = new ImageManager(new Driver());
    //     $image = $manager->read($rutaImagen);
    //     // Crop a 1.4 / 1 aspect ratio
    //     if ($image->width() > $image->height()) {
    //         $heightStd = $image->width() / 1.4;
    //         $cropNum = $image->height() - $heightStd;
    //         if ($cropNum > 0) {
    //             $image->crop($image->width(), $heightStd);
    //         }
    //     } else {
    //         $heightStd = $image->width() / 1.4;
    //         $cropNum = $image->height() - $heightStd;
    //         if ($cropNum > 0) {
    //             $image->crop($heightStd, $image->height());
    //         }
    //     }

    //     // Resize the image to 560x400
    //     $image->resize(560, 400);

    //     // If size > 560x400, resize to 720x1080
    //     if ($image->width() > 560 || $image->height() > 400) {
    //         $image->resize(720, 1080);
    //     }

    //     // Encode the image to webp format with 80% quality
    //     //$image->encode(new WebpEncoder(), 80);

    //     // Save the processed image
    //     $image->save($rutaImagen);
    // }
    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {
        // Validate the request data
        $validatedData = $request->validated();
        try{
            if ($request->hasFile('image')) {
                // Obtener el archivo de imagen
                $imagen = $request->file('image');
                $slug = \App\Http\Actions\FormatDocument::slugify($validatedData['title']);

                $nombreImagenOriginal = $slug . ".webp"; //. $imagen->getClientOriginalExtension();

                // Procesar y guardar la imagen
                //$rutaImagen = public_path('img/posts/' . $nombreImagenOriginal);
                //$imagen->move(public_path('img/posts/'), $nombreImagenOriginal);
                //$this->editImage($rutaImagen);

                // // Procesar y guardar la imagen
                $imagen->move(public_path('img/temp/'), $nombreImagenOriginal);
                // $this->editImage($nombreImagenOriginal, "collaborator");
                ImageHelperEditor::editImage($nombreImagenOriginal, "post");

                $validatedData['image'] = $nombreImagenOriginal;
            }

            // Set default values for date and time if not provided
            $date = $validatedData['date'] ?? null;
            $time = $validatedData['time'] ?? null;
            // Combine date and time
            if ($date && $time) {
                $datetime = $date ? Carbon::parse("$date $time") : null;
            } else {
                $datetime = null;
            }

            //dd(Carbon::createFromFormat(('Y-m-d H:i'), $validatedData['date'] . " " . $validatedData['time']));
            //$date = Carbon::createFromFormat('Y-m-d', $validatedData['date']);
            //$date = Carbon::parse($validatedData['date']);
            //$time = Carbon::createFromFormat('H:i', $validatedData['time']);
            // $time = Carbon::parse($validatedData['time']);
            // $datetime = $date->hour($time->hour)->minute($time->minute);

            //dd($request);
            $type = $request->input('select-type');
            if($type=="activity"){
                $translationData = [
                    'title' => $validatedData['title'],
                    'description' => $validatedData['description'],
                    //'author_id' => array_key_exists('author_id', $validatedData) ? $validatedData['author_id'] : '',
                    'content' => $validatedData['content'],
                    //'date' => Carbon::createFromFormat(('Y-m-d H:i'), $validatedData['date'] . " " . $validatedData['time']),
                    'date' => $datetime, // . ":00",
                    'location' => $validatedData['location'],
                    'image' => $validatedData['image'],
                    'slug' =>  strlen($validatedData['slug']) >= 1 ? $validatedData['slug'] : \App\Http\Actions\FormatDocument::slugify($validatedData['title']),
                    'meta_title' => strlen($validatedData['meta_title']) >= 1 ? $validatedData['meta_title'] : \App\Http\Actions\FormatDocument::slugify($validatedData['title']),
                    'meta_description' => strlen($validatedData['meta_description']) >= 1 ? $validatedData['meta_description'] : \App\Http\Actions\FormatDocument::slugify($validatedData['description']),
                    'publication_date' => $validatedData['publication_date'],
                    'published_by' => $validatedData['published_by']
                ];
            }else if($type=="article"){
                $translationData = [
                    'title' => $validatedData['title'],
                    'description' => $validatedData['description'],
                    //'author_id' => array_key_exists('author_id', $validatedData) ? $validatedData['author_id'] : '',
                    'author_id' => array_key_exists('author_id', $validatedData) ? $validatedData['author_id'] : null,
                    'translator_id' => array_key_exists('translator_id', $validatedData) ? $validatedData['translator_id'] : null,
                    'content' => $validatedData['content'],
                    //'date' => Carbon::createFromFormat(('Y-m-d H:i'), $validatedData['date'] . " " . $validatedData['time']),
                    'image' => $validatedData['image'],
                    'slug' =>  strlen($validatedData['slug']) >= 1 ? $validatedData['slug'] : \App\Http\Actions\FormatDocument::slugify($validatedData['title']),
                    'meta_title' => strlen($validatedData['meta_title']) >= 1 ? $validatedData['meta_title'] : \App\Http\Actions\FormatDocument::slugify($validatedData['title']),
                    'meta_description' => strlen($validatedData['meta_description']) >= 1 ? $validatedData['meta_description'] : \App\Http\Actions\FormatDocument::slugify($validatedData['description']),
                    'publication_date' => $validatedData['publication_date'],
                    'published_by' => $validatedData['published_by']
                ];
            }
            //if $validatedData['author'], $translationData[] = ['author_id' => $validatedData['author_id']]
            //if $validatedData['translator'], $translationData[] = ['translator_id' => $validatedData['translator_id']]

            Post::create($translationData);

            return redirect()->route('posts.index')
                ->with('success', 'Post created successfully.');
        }catch (PostTooLargeException $e) {
            // Handle the exception
            return redirect()->back()->withErrors(['file' => 'The file is too large. Please upload a file smaller than 32MB.']);
        }catch(Exception $e){
            return redirect()->back()
                ->with('error', $e->getMessage());
        }

    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $locale = app()->getLocale() ?? 'ca';

        $postObject = Post::find($id);
        $post = [];
        //dd($postObject);

        if ($postObject->author) {
            $authorID = $postObject->author->collaborator_id;
            $authorName = $postObject->author->collaborator->translations->first()->first_name . " " . $postObject->author->collaborator->translations->first()->last_name;
            $authorSlug = $postObject->author->collaborator->translations->first()->slug;
            $authorImage = $postObject->author->collaborator->image;
        } else {
            $authorID = '';
            $authorName = '';
            $authorSlug = '';
            $authorImage = '';
        }

        if ($postObject->translator) {
            $translatorID = $postObject->translator->collaborator->translations->first()->first_name . " " . $postObject->translator->collaborator->translations->first()->last_name;
            $translatorName = $postObject->translator->collaborator->translations->first()->first_name . " " . $postObject->author->collaborator->translations->first()->last_name;
            $translatorSlug = $postObject->translator->collaborator->translations->first()->slug;
            $translatorImage = $postObject->translator->collaborator->image;
        } else {
            $translatorID = '';
            $translatorName = '';
            $translatorSlug = '';
            $translatorImage = '';
        }
        $post = [
            'id' => $postObject->id,
            'title' => $postObject->title,
            'description' => $postObject->description,
            'author_id' => $authorID,
            'author_name' => $authorName,
            'author_slug' => $authorSlug,
            'author_image' => $authorImage,
            'translator_id' => $translatorID,
            'translator_name' => $authorName,
            'translator_slug' => $authorSlug,
            'translator_image' => $authorImage,
            'content' => $postObject->content,
            'date' => substr($postObject->date, 0, 10), // Extracts 'YYYY-MM-DD'
            'time' => substr($postObject->date, 10, 15),
            'location' => $postObject->location,
            'image' => $postObject->image,
            'publication_date' => substr($postObject->publication_date, 0, 10), // Extracts 'YYYY-MM-DD'
            'published_by' => $postObject->user->first_name . " " . $postObject->user->last_name
        ];

        //dd($post);
        return view('admin.post.show', compact('post', 'locale'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id) //todo
    {

        //$post = Post::find($id);
        //dd($post);

        $postObject = Post::find($id);
        $post = [];
        $isActivity=null;
        //dd($postObject);

        if ($postObject->author) {
            $authorID = $postObject->author_id;
            $isActivity=false;
        } else {
            $authorID = '';
        }

        if ($postObject->translator) {
            $translator = $postObject->translator_id;
            $isActivity=false;
        } else {
            $translator = '';
        }

        if($postObject->date){
            $date = substr($postObject->date, 0, 10);
            $time = Carbon::parse(substr($postObject->date, 10, 18))->format('H:i');
            $isActivity=true;
        }else{
            $date = '';
            $time = '';
        }

        $post = [
            'id' => $postObject->id,
            'title' => $postObject->title,
            'description' => $postObject->description,
            'author_id' => $authorID,
            'translator_id' => $translator,
            'content' => $postObject->content,
            'date' => $date,
            'isActivity'=>$isActivity,
            //'time' => substr($postObject->date, 10, 15),
            'time' => $time,
            'location' => $postObject->location,
            'image' => $postObject->image,
            'slug' => $postObject->slug,
            'meta_title' => $postObject->meta_title,
            'meta_description' => $postObject->meta_description,
            'publication_date' => substr($postObject->publication_date, 0, 10), // Extracts 'YYYY-MM-DD'
            'published_by' => $postObject->user->id
        ];
        //dd($post);
        $authors = Author::paginate();
        $users = User::all();
        $translators = CollaboratorTranslation::where('lang', $this->lang)->paginate();

        return view('admin.post.edit', compact('post', 'translators', 'authors', 'users'));
    }
    public function getTypeOfPost($post){

        return false;
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request, Post $post)
    {
        // dd(Carbon::createFromFormat(('Y-m-d H:i:s'), $request['date'] . " " . "09:30:00"));

        // $post->update($request->validated());

        // return redirect()->route('posts.index')
        //     ->with('success', 'Post updated successfully');
        $validatedData = $request->validated();


        $date = $validatedData['date'] ?? null;
        $time = $validatedData['time'] ?? null;


        $datetime = $date ? Carbon::parse("$date $time") : null;

        // Assign the datetime variable to the 'date' key in the validatedData array
        $validatedData['date'] = $datetime;

        $post->update($validatedData);
        if ($request->input('action') == 'show') {
            return redirect()->route('posts.show', $post->id)
                ->with('success', 'Post actualitzat correctament');
        }

        return redirect()->route('posts.index')

            ->with('success', 'Post actualitzat correctament');
    }

    public function destroy($id)
    {
        Post::find($id)->delete();

        return redirect()->route('posts.index')
            ->with('success', 'Post eliminat correctament');
    }



    public function posts()
    {
        $locale = "ca";

        $posts_lv = Post::whereNull('date')
            ->whereNull('location')
            ->orderBy('publication_date', 'desc')
            ->paginate(20);

        $posts = [];
        foreach ($posts_lv as $post_lv) {
            $posts[$post_lv->slug] = $this->getPreviewPost($post_lv, $locale);
        }


        $page = [
            'title' => ucfirst(trans_choice('words.article', 2)),
            'shortDescription' => '',
            'longDescription' => '',
            'web' => 'Èter Edicions'
        ];

        return view('public.posts', compact('posts', 'page', 'locale'));
    }

    public function activities()
    {
        $locale = "ca";

        $posts_lv = Post::whereNotNull('date')
            ->whereNotNull('location')
            ->orderBy('date', 'desc')
            ->paginate(20);

        // dd($activities_lv);

        $posts = [];
        foreach ($posts_lv as $post_lv) {
            $posts[$post_lv->slug] = $this->getPreviewActivity($post_lv, $locale);
        }

        $page = [
            'title' => ucfirst(trans_choice('words.activitat', 2)),
            'shortDescription' => '',
            'longDescription' => '',
            'web' => 'Èter Edicions'
        ];

        return view('public.activities', compact('posts', 'page', 'locale'));
    }

    public function postDetail($id)
    {
        $locale = "ca";


        $post_lv = Post::where('slug', $id)->first();

        $page = [
            'title' => $post_lv->meta_title,
            'shortDescription' => '',
            'longDescription' => $post_lv->meta_description,
            'web' => 'Èter Edicions'
        ];

        $post = [];

        if ($post_lv->date && $post_lv->location) {
            $post = $this->getFullActivity($post_lv, $locale);

            return view('public.activity', compact('post', 'page', 'locale'));
        } else {
            $post = $this->getFullPost($post_lv, $locale);

            return view('public.post', compact('post', 'page', 'locale'));
        }
    }



    private function getFullPost($post, $locale)
    {
        $author = $post->author;
        $translator = $post->translator;
        $user = $post->user;

        $authorName = !is_null($author) ? $author->collaborator->translations()->where('lang', $locale)->first()->first_name . " " . $author->collaborator->translations()->where('lang', $locale)->first()->last_name : "";
        $authorId = !is_null($author) ? $author->id : "";
        $authorImage = !is_null($author) ? $author->collaborator->image : "";

        $translatorName = !is_null($translator) ? $translator->collaborator->translations()->where('lang', $locale)->first()->first_name . " " . $translator->collaborator->translations()->where('lang', $locale)->first()->last_name : "";
        $translatorId = !is_null($translator) ? $translator->id : "";
        $translation = __('general.translation') . " " . (OrthographicRules::startsWithDe($translatorName) ? __('orthographicRules.with_d') : __('orthographicRules.with_de'));

        $userName = !is_null($user) ? $user->first_name . " " . $user->last_name : "";

        $postResult = [
            'id' => $post->id,
            'title' => $post->title,
            'author' => $authorName,
            'author_id' => $authorId,
            'author_image' => $authorImage,
            'translator' => $translatorName,
            'translator_id' => $translatorId,
            'translation' => $translation,
            'description' => $post->description,
            'content' => $post->content,
            'published_by' => $userName,
            'publication_date' => Carbon::createFromFormat('Y-m-d', $post->publication_date)->format('d/m/Y'),
            'image' => $post->image,
            'post_type' => trans_choice('words.article', 2),
            'slug' => $post->slug,
            'meta_title' => $post->meta_title,
            'meta_description' => $post->meta_description
        ];

        return $postResult;
    }

    private function getPreviewPost($post, $locale)
    {
        $postResult = [
            'id' => $post->id,
            'title' => $post->title,
            'description' => $post->description,
            'date' => Carbon::createFromFormat('Y-m-d', $post->publication_date)->format('d/m/Y'),
            'image' => $post->image,
            'post_type' => ucfirst(trans_choice('words.article', 2)),
            'slug' => $post->slug
        ];

        return $postResult;
    }


    private function getFullActivity($activity, $locale)
    {
        $user = $activity->user;

        $userName = !is_null($user) ? $user->first_name . " " . $user->last_name : "";
        $userId = !is_null($user) ? $user->id : "";

        $activityResult = [
            'id' => $activity->id,
            'title' => $activity->title,
            'description' => $activity->description,
            'content' => $activity->content,
            'date' => Carbon::createFromFormat('Y-m-d H:i:s', $activity->date)->format('d/m/Y'),
            'location' => $activity->location,
            'image' => $activity->image,
            'published_by' => $userName,
            'published_by_id' => $userId,
            'publication_date' => Carbon::createFromFormat('Y-m-d', $activity->publication_date)->format('d/m/Y'),
            'post_type' => ucfirst(trans_choice('words.activitat', 2)),
            'slug' => $activity->slug,
            'meta_title' => $activity->meta_title,
            'meta_description' => $activity->meta_description
        ];

        return $activityResult;
    }

    private function getPreviewActivity($activity, $locale)
    {
        // @dump($activity->date);

        $activityResult = [
            'id' => $activity->id,
            'title' => $activity->title,
            'description' => $activity->description,
            'date' => Carbon::createFromFormat('Y-m-d H:i:s', $activity->date)->format('d/m/Y'),
            'location' => str_contains($activity->location, ".") ? substr($activity->location, 0, strpos($activity->location, '.')) : $activity->location,
            'image' => $activity->image,
            'post_type' => ucfirst(trans_choice('words.activitat', 2)),
            'slug' => $activity->slug,
            'meta_title' => $activity->meta_title,
            'meta_description' => $activity->meta_description
        ];

        return $activityResult;
    }

    public function getPreviewGenericPost($post, $locale)
    {
        //dd($post);
        $postType = (is_null($post->date) && is_null($post->location)) ? ucfirst(trans_choice('words.article', 2)) : ucfirst(trans_choice('words.activitat', 2));
        $date = is_null($post->date) ? Carbon::createFromFormat('Y-m-d', $post->publication_date)->format('d/m/Y') : Carbon::createFromFormat('Y-m-d H:i:s', $post->date)->format('d/m/Y');
        // Verificar si la fecha de publicación está presente y formatearla
        //$date = is_null($post->date) ? Carbon::createFromFormat('Y-m-d H:i:s', $post->publication_date)->format('d/m/Y') : Carbon::createFromFormat('Y-m-d', $post->date)->format('d/m/Y');
        // @dump($post->date);
        // @dump(Carbon::createFromFormat('Y-m-d H:i:s', $post->date)->format('d/m/Y'));
        //dd($post);
        $postResult = [
            'id' => $post->id,
            'title' => $post->title,
            'description' => $post->description,
            'date' => $date,
            'location' => str_contains($post->location, ".") ? substr($post->location, 0, strpos($post->location, '.')) : $post->location,
            'image' => $post->image,
            'post_type' => $postType,
            'slug' => $post->slug,
            'meta_title' => $post->meta_title,
            'meta_description' => $post->meta_description
        ];

        // @dump($postResult);

        return $postResult;
    }


    public function getLatestPosts($locale)
    {

        $posts_lv = Post::orderBy('publication_date', 'desc')
            ->take(3)->get();

        // @dump($posts_lv);

        $posts = [];
        foreach ($posts_lv as $post_lv) {
            $posts[$post_lv->slug] = $this->getPreviewGenericPost($post_lv, $locale);
        }

        // @dump($posts);

        return $posts;
    }

    public function upload(Request $request)
    {
        if ($request->hasFile('upload')) {
            $file = $request->file('upload');

            // Validate file size
            $maxFileSize = config('app.max_file_size', 2048); // 2MB
            if ($file->getSize() > $maxFileSize * 1024) {
                return response()->json(['error' => 'File size exceeds the limit.'], 400);
            }

            // Validate file type
            $allowedExtensions = ['png', 'jpg', 'jpeg', 'gif', 'webp'];
            if (!in_array($file->getClientOriginalExtension(), $allowedExtensions)) {
                return response()->json(['error' => 'File type not allowed.'], 400);
            }

            $originName = $file->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME) . '_' . time() . '.webp';
            $file->move(base_path('public/img/posts'), $fileName);

            $url = asset('img/posts/' . $fileName);
            return response()->json(['filename' => $fileName, 'uploaded' => 1, 'url' => $url]);
        }

        return response()->json(['error' => 'No file uploaded.'], 400);
    }

    /**
    * Method that generates the Book array used by the view
    */
    public static function getData($type = null, $key = null, $value = null, $search = false) {
        // try {
            $locale = 'ca';

            if ($key == null || $value == null) {
                switch ($type) {
                    case null:
                        $query_data = Post::paginate();
                    break;
                    case 'activities':
                        $query_data = Post::whereNotNull('location')->whereNotNull('date')->paginate();
                    break;
                    case 'articles':
                        $query_data = Post::whereNull('location')->whereNull('date')->paginate();
                    break;
                }
            }
            else if ($search) {
                switch ($type) {
                    case null:
                        $query_data = Post::where($key, 'LIKE', '%' . $value . '%')->paginate();
                    break;
                    case 'activities':
                        $query_data = Post::whereNotNull('location')->whereNotNull('date')->where($key, 'LIKE', '%' . $value . '%')->paginate();
                    break;
                    case 'articles':
                        $query_data = Post::whereNull('location')->whereNull('date')->where($key, 'LIKE', '%' . $value . '%')->paginate();
                    break;
                }
            }
            else {
                switch ($type) {
                    case null:
                        $query_data = Post::where($key, $value)->paginate();
                    break;
                    case 'activities':
                        $query_data = Post::whereNotNull('location')->whereNotNull('date')->where($key, $value)->paginate();
                    break;
                    case 'articles':
                        $query_data = Post::whereNull('location')->whereNull('date')->where($key, $value)->paginate();
                    break;
                }
            }
            $posts = [];
            foreach ($query_data as $single_data) {
                $posts[] = [
                    'id' => $single_data->id,
                    'title' => $single_data->title,
                    'author_id' => $single_data->author_id,
                    'translator_id' => $single_data->translator_id,
                    'description' => $single_data->description,
                    'date' => $single_data->date,
                    'location' => $single_data->location,
                    'image' => $single_data->image,
                    'content' => $single_data->content,
                    'publication_date' => $single_data->publication_date,
                    'published_by' => $single_data->published_by,
                    'slug' => $single_data->slug,
                    'meta_name' => $single_data->meta_name,
                    'meta_description' => $single_data->meta_description,
                ];
            }
            return $posts;
        // }
        // catch (Exception $e) {
        //     abort(500, 'Server Error');
        // }
    }
}
