<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\FishesController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\OrdersController;


Route::get('/', [PostController::class, 'index']);
Route::get('/nasz_sklep', function () {
    return view('nasz_sklep');
});
Route::get('/fishes', [FishesController::class, 'index'])->name("fishes");
Route::get('/comments', [CommentsController::class, 'index'])->name("comments");
Route::get('/orders', function () {
    return view('ordersForm');
})->name("ordersForm");
Route::get('/kontakt', function () {
    return view('kontakt');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //ryby
    Route::get('/createFish', [FishesController::class, 'create'])->name("createFish");
    Route::post('/createFish', [FishesController::class, 'store'])->name("storeFish");
    Route::get('/deleteFish/{id}', [FishesController::class, 'destroy'])->name('deleteFish');
    Route::get('/editFish/{id}', [FishesController::class, 'edit'])->name('editFish');
    Route::post('/updateFish/{id}', [FishesController::class, 'update'])->name('updateFish');

    // opinie
    Route::get('/create', [CommentsController::class, 'create'])->name("create");
    Route::post('/create', [CommentsController::class, 'store'])->name("store");
    Route::get('/delete/{id}', [CommentsController::class, 'destroy'])->name('delete');
    Route::get('/edit/{id}', [CommentsController::class,'edit'])->name('edit');
    Route::post('/update/{id}', [CommentsController::class,'update'])->name('update');

    //zamowienia
    Route::post('/createOrder', [OrdersController::class, 'store'])->name('storeOrder');
});

//posty
Route::get('/get-more-posts', [PostController::class, 'getMorePosts']);
Route::get('/post/{id}', [PostController::class, 'show'])->name('showPost');

require __DIR__.'/auth.php';



