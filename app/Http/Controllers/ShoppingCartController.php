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

    private $locale = "ca";
    function addProduct(Request $request)
    {
        //Cart::destroy();
        $message = "";
        $book = Book::find($request->book_id);
        if ($book) {
            if ($book->stock > 0) {
                $authorNames = [];
                foreach ($book->authors as $author) {
                    $auth = \App\Models\CollaboratorTranslation::where('collaborator_id', $author->id)->where('lang', $this->locale)->first();
                    $authorNames[] = $auth->first_name . " " . $auth->last_name;
                }
                //dd($authorNames);
                $aditionalInfo = [
                    "author" => $authorNames,
                    "isbn" => $book->isbn,
                    "id" => $book->id,
                    "publisher" => $book->publisher,
                    "image" => $book->image,
                    "pvp" => $book->pvp,
                ];
                $item = Cart::instance('default')->add($book, $request->number_of_items, $aditionalInfo);
                if ($item) {
                    //added succesfully
                    Cart::instance('default')->setTax($item->rowId, $book->iva);
                    $message = "Llibre afegit a la cistella";
                    return redirect()->back()->with('success', $message);
                } else {
                    //error
                    $message = "No s'ha pogut afegir el llibre a la cistella";
                    return redirect()->back()->with('error', $message);
                }
            } else {
                $message = "No hi ha stock disponible per afegir aquest llibre";
                return redirect()->back()->with('error', $message);
            }
        } else {
            $message = "Llibre no trobat a la base de dades";
            return redirect()->back()->with('error', $message);
        }
    }

    /**
     * Function that shows all the products in the shopping cart and related products.
     * Checks if there's stock available in database
     */
    function viewCart()
    {
        $errors = $this->checkCartStock();
        $books = $this->convertCartToBooks(Cart::instance('default')->content());
        $controller = new BookController();
        $relatedBooks = $controller->getRelatedBooksFromMultiple($books, "ca");
        if (count($relatedBooks) < 1) {
        }
        // dump(Cart::content());
        // dump(Cart::instance('default')->content());
        // dump(Cart::instance('outOfStock')->content());
        return view('public.cart', compact('relatedBooks','errors'));
    }

    /**
     * function todo make more efficient
     */
    private function checkCartStock()
    {
        // Cart::destroy();
        // Cart::instance('default')->destroy();
        // Cart::instance('outOfStock')->destroy();
        $message = [];
        foreach (Cart::instance('default')->content() as $item) {
            $book = Book::find($item->options->id);
            if ($book) {
                if ($book->visible) {
                    if ($book->stock <= 0) {
                        $message []= "Hi han productes de la teva cistella que no tenim estoc disponible\n";
                        Cart::instance('outOfStock')->add($item);
                        Cart::instance('default')->remove($item->rowId);
                    } elseif ($book->stock < $item->qty) {
                        Cart::instance('default')->update($item->rowId, $book->stock);
                        $message []= "No hi ha suficient stock per aquesta acció. Només ens queden {$book->stock} unitats disponibles\n";
                    }
                } else {
                    $message []= "Hi han productes de la teva cistella que ja no es troben disponibles\n";
                    Cart::instance('notAvailable')->add($item);
                    Cart::instance('default')->remove($item->rowId);
                    // Cart::instance('outOfStock')->add($item);
                }
            }
        }


        foreach (Cart::instance('outOfStock')->content() as $item) {
            $book = Book::find($item->options->id);
            if ($book) {
                if ($book->visible) {
                    if ($book->stock > 0) {
                        if ($book->stock < $item->qty) { //In case that there's only fewer stock that the user required
                            $item->qty = $book->stock;
                            $message []= "No hi ha suficient stock per aquesta acció. Només ens queden {$book->stock} unitats disponibles\n";
                        } else if ($book->stock >= $item->qty) {
                            $message []= "Tenim mes stock d'alguns productes\n";
                        }
                        Cart::instance('default')->add($item);
                        Cart::instance('outOfStock')->remove($item->rowId);
                    }
                } else {
                    $message []= "Hi han productes de la teva cistella que ja no es troben disponibles\n";
                    Cart::instance('notAvailable')->add($item);
                    Cart::instance('outOfStock')->remove($item->rowId);
                    // Cart::instance('outOfStock')->add($item);
                }
            }else{
                //
                Cart::instance('outOfStock')->remove($item->rowId);
            }
        }

        foreach (Cart::instance('notAvailable')->content() as $item) {
            $book = Book::find($item->options->id);
            if ($book) {
                if ($book->visible) {
                    if ($book->stock > 0) {
                        if ($book->stock < $item->qty) { //In case that there's only fewer stock that the user required
                            $item->qty = $book->stock;
                            $message []= "No hi ha suficient stock per aquesta acció. Només ens queden {$book->stock} unitats disponibles\n";
                        } else if ($book->stock >= $item->qty) {
                            $message []= "Tenim mes stock d'alguns productes\n";
                        }
                            Cart::instance('default')->add($item);
                            Cart::instance('notAvailable')->remove($item->rowId);
                    } else{//pasa de not available a sin stock
                        Cart::instance('outOfStock')->add($item);
                        Cart::instance('notAvailable')->remove($item->rowId);
                    }
                } else {
                    //we don't make anything
                }
            }else{
                Cart::instance('notAvailable')->remove($item->rowId);
            }
        }
        // dd($message);
        return $message;
    }

    /**
     * TODO CHECK CORRECTLY
     */
    // private function checkCartAvailability()
    // {
    //     // Obtener los IDs de los elementos del carrito
    //     $cartItemIds = Cart::instance('default')->content()->pluck('id');

    //     // Obtener todos los libros necesarios basados en los IDs del carrito
    //     $books = Book::whereIn('id', $cartItemIds)->get();

    //     foreach (Cart::content() as $item) {
    //         $book = $books->firstWhere('id', $item->options->id);

    //         if ($book) {
    //             if (!$book->visible) {
    //                 Cart::instance('notAvailable')->add($item);
    //                 Cart::instance('default')->remove($item->rowId);
    //             } elseif ($book->stock <= 0) {
    //                 Cart::instance('outOfStock')->add($item);
    //                 Cart::instance('default')->remove($item->rowId);
    //             }
    //         }
    //     }

    //     return $books;
    // }

    // private function checkCartStock($books)
    // {
    //     $message = "";

    //     foreach (Cart::instance('default')->content() as $item) {
    //         if ($books->contains('id', $item->options->id)) {
    //             $book = $books->firstWhere('id', $item->options->id);

    //             if ($book->stock < $item->qty) {
    //                 $item->qty = $book->stock;
    //                 $message = "No hi ha suficient stock per aquesta acció. Només ens queden {$book->stock} unitats disponibles";
    //             }

    //             Cart::instance('default')->add($item);
    //         }
    //     }

    //     // Eliminar elementos de los carritos
    //     Cart::instance('default')->diff(Cart::instance('notAvailable'))->remove();
    //     Cart::instance('default')->diff(Cart::instance('outOfStock'))->remove();

    //     return $message;
    // }

    function viewCheckout()
    {
        return view('public.checkout');
    }

    /**
     * Function that converts shopping items into an array of books
     */
    private function convertCartToBooks($cartContent)
    {
        $books = [];
        foreach ($cartContent as $item) {
            $book = Book::find($item->id);
            if ($book) {
                $books[] = $book;
            }
        }
        return $books;
    }

    /**
     *
     */
    function destroy($rowId, Request $request)
    {
        $instance = "default";
        if ($request->instance) {
            $instance = $request->instance;
        }
        Cart::instance($instance)->remove($rowId);
        return redirect()->back()
            ->with('success', 'Llibre esborrat correctament');
    }

    /**
     *
     */
    function add($rowId)
    {
        $message = "";
        $item = Cart::instance('default')->get($rowId);
        $book = Book::findOrFail($item->options->id);
        if ($item && $book) {
            if ($book->visible) {
                if ($book->stock > $item->qty) {
                    Cart::instance('default')->update($rowId, $item->qty + 1);
                } else if ($book->stock == 0) {
                    $message = "No hi ha suficient stock per aquesta acció. Ja no ens queden unitats disponibles per al llibre \"{$item->name}\"";
                    Cart::instance('default')->remove($rowId);
                    Cart::instance('outOfStock')->add($item);
                } else {
                    Cart::instance('default')->update($rowId, $book->stock);
                    $message = "No hi ha suficient stock per aquesta acció. Només ens queden {$book->stock} unitats disponibles";
                }
            } else {
                $message = 'El llibre "' . $item->name . '" ja no es troba disponible';
                Cart::instance('default')->remove($rowId);
                Cart::instance('outOfStock')->add($item);
            }
        } else {
            $message = 'Error desconegut';
        }
        if ($message == "") {
            return redirect()->back()
                ->with('success', "Quantitat actualizada satisfactoriament");
        } else {
            return redirect()->back()
                ->with('error', $message);
        }
    }

    function less($rowId)
    {
        $message = "";
        $item = Cart::instance('default')->get($rowId);
        $book = Book::findOrFail($item->options->id);
        if ($item && $book) {
            if ($book->visible) {
                if ($book->stock >= $item->qty) {
                    Cart::instance('default')->update($rowId, $item->qty - 1);
                } else if ($book->stock == 0) {
                    $message = "No hi ha suficient stock per aquesta acció. Ja no ens queden unitats disponibles";
                    Cart::instance('default')->remove($rowId);
                    Cart::instance('outOfStock')->add($item);
                } else {
                    Cart::instance('default')->update($rowId, $book->stock);
                    $message = "No hi ha suficient stock per aquesta acció. Només ens queden {$book->stock} unitats disponibles";
                }
            } else {
                $message = 'El llibre "' . $item->name . '" ja no es troba disponible';
                Cart::instance('default')->remove($rowId);
                Cart::instance('outOfStock')->add($item);
            }
        } else {
            $message = 'Error desconegut';
        }
        if ($message == "") {
            return redirect()->back()
                ->with('success', "Quantitat actualizada satisfactoriament");
        } else {
            return redirect()->back()
                ->with('error', $message);
        }
    }
    // function add($rowId)
    // {
    //     $qty = Cart::get($rowId)->qty;
    //     Cart::update($rowId, $qty + 1);
    //     return redirect()->back()
    //         ->with('success', '');
    // }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $rowId = $request->input('rowId');
        $quantity = $request->input('quantity');

        $item = Cart::instance('default')->get($rowId);

        if ($item) {
            // Actualiza la cantidad del producto en el carrito
            Cart::instance('default')->update($rowId, $quantity);
        }

        // Devuelve la nueva información del carrito en formato JSON
        return response()->json([
            'item' => Cart::instance('default')->get($rowId),
            'total' => Cart::instance('default')->total(),
        ]);
    }
}