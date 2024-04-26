<?php

namespace App\Http\Controllers;

use \App\Models\Page;
use App\Models\Book;
use App\Models\Post;

use App\Http\Controllers\BookController;
use App\Http\Controllers\PostController;

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

        $bookController = new BookController();
        $books = $bookController->getNewestBooks($locale);
        // dd($books);

        $postController = new PostController();
        $posts = $postController->getLatestPosts($locale);
        // dd($posts);

        return view('public.home', compact('books', 'posts', 'page', 'locale'));
    }


    public function about(){
        // $locale = config('app')['locale'];
        $locale = 'ca';

        $page = $this->getFullPage('about', $locale);

        return view('public.about', compact('page', 'locale'));
    }


    public function foreignRights(){
        // $locale = config('app')['locale'];
        $locale = 'ca';

        $page = $this->getFullPage('foreign-rights', $locale);
        $pageEn = $this->getFullPage('foreign-rights', "en");

        return view('public.foreign-rights', compact('page', 'pageEn', 'locale'));
    }


    public function contact(){
        // $locale = config('app')['locale'];
        $locale = 'ca';

        $page = $this->getFullPage('contact', $locale);

        return view('public.contact', compact('page', 'locale'));
    }


    public function sendContactForm(){
        return "email sent";
    }



    private function getFullPage($tag, $locale){
        $page_lv = Page::where('tag', 'LIKE', $tag)->first();

        $translation = $page_lv->translations->where('lang', $locale)->first();

        // dd($translation);

        $page = ['id' => $page_lv->id,];

        if ($translation) {
            $page['title'] = $translation->meta_title;
            $page['longDescription'] = $translation->meta_description;
            $page['shortDescription'] = "";
            $page['web'] = 'Èter Edicions';
            $page['slug'] = $translation->slug;
        }
        // dd($translation->contents);
        foreach($translation->contents as $content){
            $page['contents'][$content->key] = $content->content;
        }

        return $page;
    }
}