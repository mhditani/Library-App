<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;

// Route::get('/', function () {
//     return view('home.index');
// });
route::get('/',[HomeController::class, 'index']);
route::get('/view_home',[HomeController::class, 'index']);




Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});



route::get('/home',[AdminController::class, 'index']);
route::get('/category_page',[AdminController::class, 'category_page']);
route::post('/add_category',[AdminController::class, 'add_category']);
route::get('/cat_delete/{id}',[AdminController::class, 'cat_delete']);
route::get('/edit_category/{id}',[AdminController::class, 'edit_category']);
route::post('/update_category/{id}',[AdminController::class, 'update_category']);
route::get('/add_book',[AdminController::class, 'add_book']);
route::post('/store_book',[AdminController::class, 'store_book']);
route::get('/show_book',[AdminController::class, 'show_book']);
route::get('/delete_book/{id}',[AdminController::class, 'delete_book']);
route::get('/edit_book/{id}',[AdminController::class, 'edit_book']);
route::post('/update_book/{id}',[AdminController::class, 'update_book']);
route::get('/book_detalis/{id}',[HomeController::class, 'book_detalis']);
route::get('/borrow_book/{id}',[HomeController::class, 'borrow_book']);
route::get('/borrow_request',[AdminController::class, 'borrow_request']);
route::get('/approve_book/{id}',[AdminController::class, 'approve_book']);
route::get('/return_book/{id}',[AdminController::class, 'return_book']);
route::get('/reject_book/{id}',[AdminController::class, 'reject_book']);
route::get('/book_history',[HomeController::class, 'book_history']);
route::get('/cancel_req/{id}',[HomeController::class, 'cancel_req']);
route::get('/explore',[HomeController::class, 'explore']);
route::get('/search',[HomeController::class, 'search']);
route::get('/cat_search/{id}',[HomeController::class, 'cat_search']);
route::get('/homeview',[AdminController::class, 'homeview']);

























