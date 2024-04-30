<?php

namespace App\Http\Controllers;

use App\Models\Book;
use CodersFree\Shoppingcart\Cart as ShoppingcartCart;
use CodersFree\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

/**
 * Class ShoppingCartController
 * @package App\Http\Controllers
 */
class ShoppingCartController extends Controller
{
    //public function add($id, $name = null, $qty = null, $price = null, array $options = [], $taxrate = null)

    private $locale = "ca";
    function addProduct(Request $request)
    {
        //Cart::destroy();
        $book = Book::find($request->book_id);
        if ($book) {
            $authorNames = "";
            $index = 0;
            foreach ($book->authors as $author) {
                $auth =\App\Models\CollaboratorTranslation::where('collaborator_id', $author->id)->where('lang', $this->locale)->first();
                $authorNames .= $auth->first_name . " " . $auth->last_name;

                if (++$index !== count($book->authors)) {
                    $authorNames .= ', ';
                }
            }
            $aditionalInfo = [
                "author" => $authorNames,
                "isbn" => $book->isbn,
                "publisher" => $book->publisher,
                "image"=>$book->image,
            ];
            $item = Cart::add($book, $request->number_of_items, $aditionalInfo);
            if ($item) {
                //added succesfully
                Cart::setTax($item->rowId, $book->iva);
                $succesMessage = "Llibre afegit a la cistella";
                return redirect()->back()->with('success', $succesMessage);
            } else {
                //error
                $errorMessage = "No s'ha pogut afegir el llibre a la cistella";
                return redirect()->back()->with('error', $errorMessage);
            }
        }
    }

    function getAllItems()
    {
        $books = $this->convertCartToBooks(Cart::content());
        $controller = new BookController();
        $relatedBooks = $controller->getRelatedBooksFromMultiple($books,"ca");
        return view('public.cart', compact('relatedBooks'));
        //dump(Cart::content());
    }
    
    private function convertCartToBooks($cartContent){
        $books = [];
        foreach($cartContent as $item){
            $book = Book::find($item->id);
            if($book){
                $books[] = $book;
            }
        }
        return $books;
    }
    function destroy($id){
        Cart::remove($id);
        return redirect()->back()
            ->with('success', 'Order deleted successfully');
    }
    function getFullCart(){

    }
}
