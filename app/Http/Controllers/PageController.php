<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home(){
        // $locale = config('app')['locale'];
        $locale = 'ca';
        $page = [
            'title' => 'Portada',
            'shortDescription' => '',
            'longDescription' => '',
            'web' => 'Èter Edicions'
        ];

        $books = [];
        $posts = [];
        $activities = [];


        return view('public.home', compact('books', 'posts', 'activities', 'page', 'locale'));
    }


    public function about(){

        // $locale = config('app')['locale'];
        $locale = 'ca';
        $page = [
            'title' => 'Qui som',
            'shortDescription' => '',
            'longDescription' => '',
            'web' => 'Èter Edicions'
        ];


        // $this->getFullPage();

        return view('public.home', compact('books', 'posts', 'activities', 'page', 'locale'));
    }


    public function foreignRights(){
        return "PageController > foreignRights";
    }


    public function contact(){
        return "PageController > contact";
    }




    private function getFullPage($page, $locale){
        // $collab = Collaborator::find($id);
        // $collaborator = [];

        $translation = $page->translations->where('lang', $locale)->first();
        dd($translation);
        // if ($translation) {
        //     $collaborator = [
        //         'id' => $collab->id,
        //         'image' => $collab->image,
        //         'first_name' => $translation->first_name,
        //         'last_name' => $translation->last_name,
        //         'lang' => $translation->lang,
        //         'biography' => $translation->biography,
        //         'slug' => $translation->slug,
        //         'social_networks' => json_decode($collab->social_networks, true)
        //     ];
        // }
        // if(!is_null($collab->author)){
        //     foreach($collab->author->books()->get() as $book){
        //         $collaborator['books'][$book->title] = [
        //             'id' => $book->id,
        //             'title' => $book->title,
        //             'image' => $book->image,
        //             'slug' => $book->slug
        //         ];
        //     }
        // }
        // if(!is_null($collab->translator)){
        //     foreach($collab->translator->books()->get() as $book){
        //         $collaborator['books'][$book->title] = [
        //             'id' => $book->id,
        //             'title' => $book->title,
        //             'image' => $book->image,
        //             'slug' => $book->slug
        //         ];
        //     }
        // }

        // return $collaborator;
    }
}
