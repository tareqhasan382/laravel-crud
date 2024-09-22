<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

// update
// Route::get('/', function () {
//     return view('welcome',['posts'=>Post::all()]);
// })->name('home');
Route::get('/', function () {
    return view('welcome',['posts'=>Post::paginate(3)]);
})->name('home');
Route::get("/create",[PostController::class,"createPost"]);
Route::post("/store",[PostController::class,"postData"])->name('store');

Route::get("/edit/{id}",[PostController::class,"editData"])->name('edit');
Route::post("/update/{id}",[PostController::class,"updateData"])->name('update');
Route::get("/delete/{id}",[PostController::class,"deleteData"])->name('delete');