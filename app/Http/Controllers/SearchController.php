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
    public static $unwanted_chars = array(
        'Š'=>'S', 'š'=>'s', 'Ž'=>'Z', 'ž'=>'z', 'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E',
        'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U',
        'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss', 'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c',
        'è'=>'e', 'é'=>'e', 'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o', 'ô'=>'o', 'õ'=>'o',
        'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'þ'=>'b', 'ÿ'=>'y'
    );

    /**
     * Public index view for searches
     */
    public function index() {
        $term = app(Request::class)->input('search_term');
        $results = self::getResultsArray($term);
        return view('public.searchResults', compact('results'));
    }

    /**
     * Public search method
     */
    public static function getResultsArray($term) {
        if (isset($term)) {
            return [
                'term' => $term,
                'books' => self::getResultsBooksArray($term),
                'collaborators' => self::getResultsCollaboratorsArray($term),
                'activities' => self::getResultsActivitiesArray($term),
                'articles' => self::getResultsArticlesArray($term),
            ];
        }
    }


    /**
     * Method to search Books
     */
    public static function getResultsBooksArray ($term) {
        $returnable_array = array_merge(
            BookController::getData("title", $term, true),
            BookController::getData("description", $term, true)
        );
        $returnable_array = self::removeDuplicatesById($returnable_array);
        return $returnable_array;
    }

    /**
     * Method to search Collaborators
     */
    public static function getResultsCollaboratorsArray ($term) {
        $returnable_array = array_merge(
            CollaboratorController::getData("first_name", $term, true),
            CollaboratorController::getData("last_name", $term, true)
        );
        $returnable_array = self::removeDuplicatesById($returnable_array);
        return $returnable_array;
    }

    /**
     * Method to search Activities
     */
    public static function getResultsActivitiesArray ($term) {
        PostController::getData('activities');
        $returnable_array = array_merge(
            PostController::getData("activities", "title", $term, true),
            PostController::getData("activities", "description", $term, true)
        );
        $returnable_array = self::removeDuplicatesById($returnable_array);
        return $returnable_array;
    }
    
    /**
     * Method to search Articles
     */
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

    /**
     * Searches for the $searchValue in $text. Returns a string with $searchValue and 20 words before and after it
     *
     * @param string $text the text to search the value in
     * @param string $searchValue the value to search
     * @param mixed $numberOfWords the number of words before and after the search value or false if is not necessary to cut the text
     *
     * @return array []
     */
    public static function searchDetails(string $text, string $searchValue = null, mixed $numberOfWords = false){
        if ($searchValue) {
            $position = self::wordInText($text, $searchValue);

            if (!$position[0]) {
                return null;
            }
            else {
                $beforeString = substr($text, 0, $position[1]);
                $afterString = substr($text, ($position[1] + $position[2]));
                
                if ($numberOfWords) {
                    $done = false;
                    while (substr_count($beforeString, ' ') > $numberOfWords - 1) {
                        $done = true;
                        $beforeString = substr($beforeString, strpos($beforeString, " ") + 1);
                    }
                    if ($done) {
                        $beforeString = "...".$beforeString;
                    }
    
                    $done = false;
                    while (substr_count($afterString, ' ') > $numberOfWords - 1) {
                        // dd(substr_count($afterString, ' '));
                        $done = true;
                        $afterString = substr($afterString, 0, strrpos($afterString, " "));
                    }
                    if ($done) {
                        $afterString = $afterString."...";
                    }
                }
                
                // dd($beforeString, $searchValue, $afterString);
    
                return [
                    $beforeString,
                    substr($text, $position[1], $position[2]),
                    $afterString,
                ];
            }
        }
        
        /*$unwanted_array = array(
            'Š'=>'S', 'š'=>'s', 'Ž'=>'Z', 'ž'=>'z', 'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E',
            'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U',
            'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss', 'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c',
            'è'=>'e', 'é'=>'e', 'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o', 'ô'=>'o', 'õ'=>'o',
            'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'þ'=>'b', 'ÿ'=>'y'
        );

        $haystack = strtolower(strtr($text, $unwanted_array));
        $needle = strtolower(strtr($searchValue, $unwanted_array));

        if (!str_contains($haystack, $needle)) {
            return null;
        }
        else {
            $segments = explode($needle, $haystack, 2);
            $before = preg_split('/\s+/', $segments[0]);
            $after = preg_split('/\s+/', $segments[1]);


            $beforeBoolean = false;
            if(count($before) > $numberOfWords){
                $beforeBoolean = true;
            }

            $before = array_slice($before, -($numberOfWords));
            if($beforeBoolean){
                array_unshift($before , '...');
            }








            $afterBoolean = false;
            if(count($after) > $numberOfWords){
                $afterBoolean = true;
            }

            $after = array_slice($after, 0, $numberOfWords);
            if($afterBoolean){
                array_push($after , '...');
            }

            return [$before, $searchValue, $after];
        }*/
    }

    /**
     * Method that returns the position of a needle inside a haystack if it is
     * inside or false if is not
     */
    private static function wordInText($haystack, $needle) {
        $pattern = '/[^a-zA-Z0-9àâáçéèèêëìîíïôòóùûüÂÊÎÔúÛÄËÏÖÜÀÆæÇÉÈŒœÙñý\'’,. ]*' . preg_quote($needle, '/') . '[^a-zA-Z0-9àâáçéèèêëìîíïôòóùûüÂÊÎÔúÛÄËÏÖÜÀÆæÇÉÈŒœÙñý\'’,. ]*/iu';
        if (preg_match($pattern, $haystack, $matches, PREG_OFFSET_CAPTURE)) {
            $position = $matches[0][1];
            $length = mb_strlen($needle, 'UTF-8');
            return array(true, $position, $length);
        }
        return array(false, -1, -1);
        // $auxHaystack = mb_strtolower(strtr($haystack, self::$unwanted_chars), 'UTF-8');
        // $auxNeedle = mb_strtolower(strtr($needle, self::$unwanted_chars), 'UTF-8');
        // dd(strlen($haystack), strlen($auxHaystack));
        // return strpos($auxHaystack, $auxNeedle);
    }
}
