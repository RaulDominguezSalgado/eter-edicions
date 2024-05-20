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
    public function home()
    {
        // Get the locale from the app or fallback to Catalan
        $locale = app()->getLocale() ?: 'ca';

        $page = [
            'title' => __('general.home'),
            'shortDescription' => '',
            'longDescription' => '',
            'web' => 'Èter Edicions'
        ];

        $bookController = new BookController();
        $books = $bookController->getNewestBooks($locale);

        $postController = new PostController();
        $posts = $postController->getLatestPosts($locale);

        $legalInfo = GeneralSettingController::getContactInfo();

        return view('public.home', compact('books', 'posts', 'page', 'locale', 'legalInfo'));
    }


    public function about()
    {
        // Get the locale from the app or fallback to Catalan
        $locale = app()->getLocale() ?: 'ca';

        $page = $this->getFullPage('about', $locale);

        return view('public.about', compact('page', 'locale'));
    }


    public function foreignRights()
    {
        // Get the locale from the app or fallback to Catalan
        $locale = app()->getLocale() ?: 'ca';

        $page = $this->getFullPage('foreign-rights', $locale);
        $pageEn = $this->getFullPage('foreign-rights', "en");

        return view('public.foreign-rights', compact('page', 'pageEn', 'locale'));
    }


    public function contact()
    {
        // Get the locale from the app or fallback to Catalan
        $locale = app()->getLocale() ?: 'ca';

        $page = $this->getFullPage('contact', $locale);

        return view('public.contact', compact('page', 'locale'));
    }

    public function agency()
    {
        // Get the locale from the app or fallback to Catalan
        $locale = app()->getLocale() ?: 'ca';

        $page = $this->getFullPage('agency', $locale);

        $collaboratorController = new CollaboratorController();
        $collaborators_lv = $collaboratorController->agency()[0];
        $collaborators = $collaboratorController->agency()[1];

        return view('public.agency', compact('collaborators_lv', 'collaborators', 'page', 'locale'));
    }


    public function sendContactForm()
    {
        return "email sent";
    }



    public function getFullPage($tag, $locale)
    {
        $page_lv = Page::where('tag', 'LIKE', $tag)->first();

        $translation = $page_lv->translations->where('lang', $locale)->first();

        // dd($translation);

        $page = ['id' => $page_lv->id,];

        if ($translation) {
            $page['title'] = $translation->meta_title;
            $page['longDescription'] = $translation->meta_description;
            $page['shortDescription'] = "";
            $webTitle = 'Èter Edicions';
            $page['slug'] = $translation->slug;
        }
        // dd($translation->contents);
        foreach ($translation->contents as $content) {
            $page['contents'][$content->key] = $content->content;
        }

        return $page;
    }
}
