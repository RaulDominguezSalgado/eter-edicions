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
        return "PageController > about";
    }


    public function foreignRights(){
        return "PageController > foreignRights";
    }


    public function contact(){
        return "PageController > contact";
    }
}
