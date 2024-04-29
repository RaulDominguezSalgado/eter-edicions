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

    function addProduct(Request $request)
    {
        //Cart::destroy();
        $book = Book::find($request->book_id);
        if ($book) {
            $authorNames = $book->authors->map(function ($author) {
                return $author->first_name . ' ' . $author->last_name;
            });

            $AditionalInfo=[
                "author"=>$authorNames->implode(', '),
            ];
            $item = Cart::add($book, $request->number_of_items);
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

        //dump(Cart::content());
    }
}
