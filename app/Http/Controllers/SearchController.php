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
            'collaborators' => self::getResultsCollaboratorsArray($term),
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

    public static function getResultsCollaboratorsArray ($term) {
        $returnable_array = array_merge(
            CollaboratorController::getData("first_name", $term, true),
            CollaboratorController::getData("last_name", $term, true)
        );
        $returnable_array = self::removeDuplicatesById($returnable_array);
        return $returnable_array;
    }

    public static function getResultsActivitiesArray ($term) {
        PostController::getData('activities');
        $returnable_array = array_merge(
            PostController::getData("activities", "title", $term, true),
            PostController::getData("activities", "description", $term, true)
        );
        $returnable_array = self::removeDuplicatesById($returnable_array);
        return $returnable_array;
    }
    
    public static function getResultsArticlesArray ($term) {
        PostController::getData('articles');
        $returnable_array = array_merge(
            PostController::getData("articles", "title", $term, true),
            PostController::getData("articles", "description", $term, true)
        );
        $returnable_array = self::removeDuplicatesById($returnable_array);
        return $returnable_array;
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