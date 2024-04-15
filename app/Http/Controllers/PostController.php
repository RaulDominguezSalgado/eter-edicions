<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\PostRequest;
use App\Models\Author;
use App\Models\User;
use App\Models\Translator;
use App\Models\CollaboratorTranslation;
use PHPUnit\Metadata\Uses;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;
use Intervention\Image\Encoders\WebpEncoder;

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
    public function index()
    {
        $posts = Post::paginate();
        $postsArray = [];
        foreach ($posts as $post) {
            $postsArray[] = [
                'id' => $post->id,
                'title' => $post->title,
                'description' => $post->description,
                'author_id' => $post->author->collaborator->translations->first()->first_name . " " . $post->author->collaborator->translations->first()->last_name,
                'translator_id' => $post->translator->collaborator->translations->first()->first_name . " " . $post->translator->collaborator->translations->first()->last_name,
                'content' => $post->content,
                'date' => substr($post->date, 0, 10), // Extracts 'YYYY-MM-DD'
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


    public function editImage($rutaImagen){
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
            $image->resize(720, 1080);
        }

        // Encode the image to webp format with 80% quality
        $image->encode(new WebpEncoder(), 80);

        // Save the processed image
        $image->save($rutaImagen);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {
        // Validate the request data
        $validatedData = $request->validated();

        if ($request->hasFile('image')) {
            // Obtener el archivo de imagen
            $imagen = $request->file('image');
            $slug = \App\Http\Actions\FormatDocument::slugify($validatedData['title']);

            $nombreImagenOriginal = $slug . ".webp"; //. $imagen->getClientOriginalExtension();

            // Procesar y guardar la imagen
            $rutaImagen = public_path('img/posts/' . $nombreImagenOriginal);
            $imagen->move(public_path('img/posts/'), $nombreImagenOriginal);
            $this->editImage($rutaImagen);

            $validatedData['image'] = $nombreImagenOriginal;
        }

        $translationData = [
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'author_id' => $validatedData['author_id'],
            'translator_id' => $validatedData['translator_id'],
            'content' => $validatedData['content'],
            'date' => $validatedData['date'],
            'location' => $validatedData['location'],
            'image' => $validatedData['image'],
            'publication_date' => $validatedData['publication_date'],
            'published_by' => $validatedData['published_by']
        ];
        Post::create($translationData);

        return redirect()->route('posts.index')
            ->with('success', 'Post created successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $postObject = Post::find($id);
        $post = [];

        $post = [
            'id' => $postObject->id,
            'title' => $postObject->title,
            'description' => $postObject->description,
            'author_id' => $postObject->author->collaborator->translations->first()->first_name . " " . $postObject->author->collaborator->translations->first()->last_name,
            'translator_id' => $postObject->translator->collaborator->translations->first()->first_name . " " . $postObject->translator->collaborator->translations->first()->last_name,
            'content' => $postObject->content,
            'date' => substr($postObject->date, 0, 10), // Extracts 'YYYY-MM-DD'
            'location' => $postObject->location,
            'image' => $postObject->image,
            'publication_date' => substr($postObject->publication_date, 0, 10), // Extracts 'YYYY-MM-DD'
            'published_by' => $postObject->user->first_name . " " . $postObject->user->last_name
        ];


        return view('admin.post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)//todo
    {
        $post = Post::find($id);
        $authors = Author::paginate();
        $users = User::all();
        $collaboratorTranslations = CollaboratorTranslation::where('lang', $this->lang)->paginate();

        return view('admin.post.edit', compact('post', 'collaboratorTranslations','authors','users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request, Post $post)
    {
        $post->update($request->validated());

        return redirect()->route('posts.index')
            ->with('success', 'Post updated successfully');
    }

    public function destroy($id)
    {
        Post::find($id)->delete();

        return redirect()->route('posts.index')
            ->with('success', 'Post deleted successfully');
    }
}
