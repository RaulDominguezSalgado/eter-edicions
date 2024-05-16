<?php

use App\Http\Controllers\Settings\PasswordController;
use App\Http\Controllers\Settings\ProfileController;
use Illuminate\Support\Facades\Route;


/* MiddleWare */
use App\Http\Middleware\AdminCheck;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');

// Route::post('/cart/{id}', [App\Http\Controllers\BookController::class, 'updateBookstoreStock'])->name('stock.update');
Route::group(['middleware' => 'language.redirect'], function () {
    /* Rutas públicas en multi-idioma */
    foreach (config('languages') as $locale) {
        if (config('app')['locale'] == $locale) { //if the current language is the same language the app is set to

            // Home
            Route::get(__('/', [], $locale), [App\Http\Controllers\PageController::class, 'home'])->name("home_default.{$locale}");
            Route::get(__('paths.home', [], $locale), [App\Http\Controllers\PageController::class, 'home'])->name("home.{$locale}");

            // Catalog
            Route::get(__('paths.catalog', [], $locale), [App\Http\Controllers\BookController::class, 'catalog'])->name("catalog.{$locale}");
            Route::get(__('paths.catalog', [], $locale)  . '/{id}', [App\Http\Controllers\BookController::class, 'bookDetail'])->name("book-detail.{$locale}");
            Route::get(__('paths.catalog', [], $locale)  . '/{slug}/sample', [App\Http\Controllers\BookController::class, 'bookSample'])->name("book.sample");

            // Authors (collaborators)
            Route::get(__('paths.authors', [], $locale), [App\Http\Controllers\CollaboratorController::class, 'collaborators'])->name("collaborators.{$locale}");
            Route::get(__('paths.authors', [], $locale)  . '/{id}', [App\Http\Controllers\CollaboratorController::class, 'collaboratorDetail'])->name("collaborator-detail.{$locale}");

            // Agency
            Route::get(__('paths.agency', [], $locale), [App\Http\Controllers\PageController::class, 'agency'])->name("agency.{$locale}");

            // Activities
            Route::get(__('paths.activities', [], $locale), [App\Http\Controllers\PostController::class, 'activities'])->name("activities.{$locale}");
            Route::get(__('paths.activities', [], $locale)  . '/{id}', [App\Http\Controllers\PostController::class, 'postDetail'])->name("activity-detail.{$locale}");

            // Posts
            Route::get(__('paths.posts', [], $locale), [App\Http\Controllers\PostController::class, 'posts'])->name("posts.{$locale}");
            Route::get(__('paths.posts', [], $locale)  . '/{id}', [App\Http\Controllers\PostController::class, 'postDetail'])->name("post-detail.{$locale}");

            // About
            Route::get(__('paths.about', [], $locale), [App\Http\Controllers\PageController::class, 'about'])->name("about.{$locale}");

            // Bookstores
            Route::get(__('paths.bookstores', [], $locale), [App\Http\Controllers\BookstoreController::class, 'bookstores'])->name("bookstores.{$locale}");


            // Foreign Rights
            Route::get(__('paths.foreign-rights', [], $locale), [App\Http\Controllers\PageController::class, 'foreignRights'])->name("foreign-rights.{$locale}");


            // Contact
            Route::get(__('paths.contact', [], $locale), [App\Http\Controllers\PageController::class, 'contact'])->name("contact.{$locale}");
            Route::post(__('paths.contact', [], $locale), [App\Http\Controllers\PageController::class, 'sendContactForm'])->name("contact.send.{$locale}");

            // Search
            Route::get(__('paths.search', [], $locale), [\App\Http\Controllers\SearchController::class, 'index'])->name("search.{$locale}");

            // Checkout
            Route::get(__('paths.checkout', [], $locale), [\App\Http\Controllers\CheckoutController::class, 'index'])->name("checkout.{$locale}");
        } else {

            // Home
            Route::get("{$locale}/" . __('/', [], $locale), [App\Http\Controllers\PageController::class, 'home'])->name("home_default.{$locale}");
            Route::get("{$locale}/" . __('paths.home', [], $locale), [App\Http\Controllers\PageController::class, 'home'])->name("home.{$locale}");

            // Catalog
            Route::get("{$locale}/" . __('paths.catalog', [], $locale), [App\Http\Controllers\BookController::class, 'catalog'])->name("catalog.{$locale}");
            Route::get("{$locale}/" . __('paths.catalog', [], $locale) . '/{id}', [App\Http\Controllers\BookController::class, 'bookDetail'])->name("book-detail.{$locale}");
            // Route::get(__('paths.catalog', [], $locale)  . '/{slug}/sample', [App\Http\Controllers\BookController::class, 'bookSample'])->name("book.sample");

            // Authors (collaborators)
            Route::get("{$locale}/" . __('paths.authors', [], $locale), [App\Http\Controllers\CollaboratorController::class, 'collaborators'])->name("collaborators.{$locale}");
            Route::get("{$locale}/" . __('paths.authors', [], $locale)  . '/{id}', [App\Http\Controllers\CollaboratorController::class, 'collaboratorDetail'])->name("collaborator-detail.{$locale}");

            // Agency
            Route::get("{$locale}/" . __('paths.agency', [], $locale), [App\Http\Controllers\PageController::class, 'agency'])->name("agency.{$locale}");

            // Activities
            Route::get("{$locale}/" . __('paths.activities', [], $locale), [App\Http\Controllers\PostController::class, 'activities'])->name("activities.{$locale}");
            Route::get("{$locale}/" . __('paths.activities', [], $locale)  . '/{id}', [App\Http\Controllers\PostController::class, 'postDetail'])->name("activity-detail.{$locale}");

            // Posts
            Route::get("{$locale}/" . __('paths.posts', [], $locale), [App\Http\Controllers\PostController::class, 'posts'])->name("posts.{$locale}");
            Route::get("{$locale}/" . __('paths.posts', [], $locale)  . '/{id}', [App\Http\Controllers\PostController::class, 'postDetail'])->name("post-detail.{$locale}");

            // About
            Route::get("{$locale}/" . __('paths.about', [], $locale), [App\Http\Controllers\PageController::class, 'about'])->name("about.{$locale}");

            // Bookstores
            Route::get("{$locale}/" . __('paths.bookstores', [], $locale), [App\Http\Controllers\BookstoreController::class, 'bookstores'])->name("bookstores.{$locale}");


            // Foreign Rights
            Route::get("{$locale}/" . __('paths.foreign-rights', [], $locale), [App\Http\Controllers\PageController::class, 'foreignRights'])->name("foreign-rights.{$locale}");


            // Contact
            Route::get("{$locale}/" . __('paths.contact', [], $locale), [App\Http\Controllers\PageController::class, 'contact'])->name("contact.{$locale}");
            // Route::post("{$locale}/" . __('paths.contact', [], $locale), [App\Http\Controllers\PageController::class, 'sendContactForm'])->name("contact.send.{$locale}");

            // Search
            Route::get("{$locale}/" . __('paths.search', [], $locale), [\App\Http\Controllers\SearchController::class, 'index'])->name("search.{$locale}");

            // Checkout
            Route::get("{$locale}/" . __('paths.checkout', [], $locale), [\App\Http\Controllers\CheckoutController::class, 'index'])->name("checkout.{$locale}");
        }

        Route::post('/lang-switch', [\App\Http\Controllers\LanguageController::class, 'langSwitch'])->name('lang.switch');
    }
});

/* Rutas públicas de colaboradores */
// Route::get('authors', [App\Http\Controllers\AuthorController::class, '']);

// Route::post('/lang-switch', [\App\Http\Controllers\LanguageController::class, 'langSwitch'])->name('lang.switch');

/* Admin Backoffice */
Route::middleware(['auth.authenticated', 'verified'])->group(function (){
    //Dashboard route
    Route::prefix('admin')->group(function () {
        Route::get('/', function () {
            return view('components.layouts.admin.dashboard');
        })->name('admin_dashboard');

    //Profile settings route
    Route::get('/settings/profile-information', ProfileController::class)->name('user-profile-information.edit');
    Route::get('/settings/password', PasswordController::class)->name('user-password.edit');

    //Posts route
    Route::resource('posts', App\Http\Controllers\PostController::class);
    // Route::post('/upload',[App\Http\Controllers\PostController::class])->name('ckeditor.upload');

    //Admin routes
    Route::middleware(['auth.admin'])->group(function(){
        Route::resource('books', App\Http\Controllers\BookController::class);
        Route::resource('collaborators', App\Http\Controllers\CollaboratorController::class);
        Route::resource('collections', App\Http\Controllers\CollectionController::class);
        Route::resource('users', App\Http\Controllers\UserController::class);
        Route::resource('authors', App\Http\Controllers\AuthorController::class);
        Route::resource('translators', App\Http\Controllers\TranslatorController::class);
        Route::resource('bookstores', App\Http\Controllers\BookstoreController::class);

        Route::resource('orders', App\Http\Controllers\OrderController::class);
        Route::post('orders', [App\Http\Controllers\OrderController::class, "index"])->name("orders.index.post");
        Route::resource('ilustrators', App\Http\Controllers\IllustratorController::class);
        Route::get('/stock/{id}', [App\Http\Controllers\BookController::class, 'editStock'])->name('stock.edit');
        Route::put('/stock/{id}', [App\Http\Controllers\BookController::class, 'updateStock'])->name('stock.update');
        // Route::put('/books/{book}/stock/update', [App\Http\Controllers\BookController::class, 'updateBookstoreStock'])->name('book.stock.update');
    });
    })->middleware(['auth', 'verified']);
});

//Route::get('{slug}');

Route::post('/cart/less/{item}', [App\Http\Controllers\ShoppingCartController::class, 'less'])->name('cart.less');
Route::post('/cart/add/{item}', [App\Http\Controllers\ShoppingCartController::class, 'add'])->name('cart.add');
Route::post('/cart/add', [App\Http\Controllers\ShoppingCartController::class, 'addProduct'])->name('cart.insert');
Route::get('/cart', [App\Http\Controllers\ShoppingCartController::class, 'viewCart'])->name('cart.view');
Route::get('/cart/checkout', [App\Http\Controllers\ShoppingCartController::class, 'viewCheckout'])->name('cart.view_checkout');
Route::delete('/cart/{item}', [App\Http\Controllers\ShoppingCartController::class, 'destroy'])->name('cart.remove');

Route::get('cart/payment', function () {
    return redirect(route('cart.view'));
});
Route::post('cart/payment',[App\Http\Controllers\PaymentController::class, 'payment'])->name('payment');
Route::get('cart/payment/succes',[App\Http\Controllers\PaymentController::class, 'success'])->name('payment.success');
Route::get('cart/payment/cancel',[App\Http\Controllers\PaymentController::class, 'cancel'])->name('payment.cancel');

// Checkout absolute routes
// Route::post("/checkout/change-step/", [App\Http\Controllers\CheckoutController::class, 'changeStep'])->name('checkout.changeStep');
Route::post("/checkout", [\App\Http\Controllers\CheckoutController::class, 'toPayment'])->name("checkout.toPayment");
// Route::get("/checkout/{orderId}", [\App\Http\Controllers\CheckoutController::class, 'showPaymentMethodView'])->name("checkout.payment_method");


Route::get('/orders/{orderId}/pdf',[App\Http\Controllers\PaymentController::class, 'generateOrderPdf'])->name('orders.pdf');
