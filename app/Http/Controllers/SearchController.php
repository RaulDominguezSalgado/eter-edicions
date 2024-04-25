<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


/*
    Searchable items Models
*/
use \App\Models\Book;
use \App\Models\Author;
use \App\Models\Translator;
use \App\Models\Post;

/*
    Searchable items Controllers
*/
use \App\Http\Controllers\BookController;
use \App\Http\Controllers\CollaboratorsTranslationController;
use \App\Http\Controllers\AuthorController;
use \App\Http\Controllers\TranslatorController;
use \App\Http\Controllers\PostController;

class SearchController extends Controller
{
    public function index() {
        $term = app(Request::class)->input('search_term');
        $results = self::getResultsArray($term);
        return view('public.searchResults', compact('results'));
    }

    public static function getResultsArray($term) {
        return [
            'term' => $term,
            'books' => self::getResultsBooksArray($term),
            'authors' => self::getResultsAuthorsArray($term),
            'translators' => self::getResultsTranslatorsArray($term),
            'activities' => self::getResultsActivitiesArray($term),
            'articles' => self::getResultsArticlesArray($term),
        ];
    }



    public static function getResultsBooksArray ($term) {
        $returnable_array = array_merge(
            BookController::getData("title", $term, true),
            BookController::getData("description", $term, true)
        );
        $returnable_array = self::removeDuplicatesById($returnable_array);
        return $returnable_array;
    }

    public static function getResultsAuthorsArray ($term) {
        $returnable_array = array_merge(
            AuthorController::getData("first_name", $term, true),
            AuthorController::getData("last_name", $term, true)
        );
        $returnable_array = self::removeDuplicatesById($returnable_array);
        return $returnable_array;
    }

    public static function getResultsTranslatorsArray ($term) {
        $returnable_array = array_merge(
            TranslatorController::getData("first_name", $term, true),
            TranslatorController::getData("last_name", $term, true)
        );
        $returnable_array = self::removeDuplicatesById($returnable_array);
        return $returnable_array;
    }    

    public static function getResultsActivitiesArray ($term) {
        
    }
    
    public static function getResultsArticlesArray ($term) {
        
    }



    private static function removeDuplicatesById($array) {
        $unique_array = [];
        $ids_seen = [];
    
        foreach ($array as $item) {
            $id = $item['id'];
            if (!in_array($id, $ids_seen)) {
                $ids_seen[] = $id;
                $unique_array[] = $item;
            }
        }
    
        return $unique_array;
    }
}
