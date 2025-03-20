<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Middleware\Admin;

route::get('/',[HomeController::class, 'home']);

route::get('/dashboard',[HomeController::class, 'login_home'])->middleware(['auth', 'verified'])->name('dashboard');
route::get('/myorders',[HomeController::class, 'myorders'])->middleware(['auth', 'verified']);



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


route::get('admin/dashboard',[HomeController::class, 'index'])
        ->middleware('auth','admin');

route::get('view_category',[AdminController::class, 'view_category'])
        ->middleware('auth','admin');

route::post('add_category',[AdminController::class, 'add_category'])
        ->middleware('auth','admin');


route::get('delete_category/{id}',[AdminController::class, 'delete_category'])
        ->middleware('auth','admin');

route::get('edit_category/{id}',[AdminController::class, 'edit_category'])
        ->middleware('auth','admin');

route::post('update_category/{id}',[AdminController::class, 'update_category'])
        ->middleware('auth','admin');

route::get('add_product',[AdminController::class, 'add_product'])
        ->middleware('auth','admin');

route::post('upload_product',[AdminController::class, 'upload_product'])
        ->middleware('auth','admin');
route::get('view_product',[AdminController::class, 'view_product'])
        ->middleware('auth','admin');
route::get('delete_product/{id}',[AdminController::class, 'delete_product'])
        ->middleware('auth','admin');

route::get('update_product/{id}',[AdminController::class, 'update_product'])
        ->middleware('auth','admin');
route::post('edit_product/{id}',[AdminController::class, 'edit_product'])
        ->middleware('auth','admin');
route::get('product_search',[AdminController::class, 'product_search'])
        ->middleware('auth','admin');



route::get('product_details/{id}',[HomeController::class, 'product_details']);


route::get('add_cart/{id}',[HomeController::class, 'add_cart'])->middleware(['auth', 'verified']);


route::get('mycart',[HomeController::class, 'mycart'])->middleware(['auth', 'verified']);


Route::delete('remove-cart/{id}', [HomeController::class, 'remove_cart'])->name('remove.cart')->middleware(['auth', 'verified']);


Route::post('confirm_order', [HomeController::class, 'confirm_order'])->middleware(['auth', 'verified']);

Route::controller(HomeController::class)->group(function(){

    Route::get('stripe', 'stripe');

    Route::post('stripe', 'stripePost')->name('stripe.post');

});



Route::post('/confirm_order', [OrderController::class, 'confirmOrder'])->name('confirm.order');

Route::get('/shop', [HomeController::class, 'shop']);
Route::get('/why', [HomeController::class, 'why']);
Route::get('/testimonial', [HomeController::class, 'testimonial']);
Route::get('/contact', [HomeController::class, 'contact']);





//for admin
Route::get('view_orders', [AdminController::class, 'view_orders'])->middleware(['auth', 'admin']);

Route::get('on_the_way/{id}', [AdminController::class, 'on_the_way'])->middleware(['auth', 'admin']);

Route::get('delivered/{id}', [AdminController::class, 'delivered'])->middleware(['auth', 'admin']);


Route::get('print_pdf/{id}', [AdminController::class, 'print_pdf'])->middleware(['auth', 'admin']);





//for see messege of clients
//Store Contact Message
Route::get('view_messege', [AdminController::class, 'view_messege'])->middleware(['auth', 'admin']);

Route::post('/contact/store', [ContactController::class, 'store'])->name('contact.store');
Route::delete('/contact/{id}', [ContactController::class, 'destroy'])->name('contact.destroy');
