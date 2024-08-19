<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController ;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[ PostsController::class ,'index' ])->name('posts.index');

Route::get('/edit', function () {
    return view('editPost');
});

Route::get('/add',[PostsController::class , 'create'])->name('post.add');

Route::post('/addPost', [PostsController::class,'store'])->name('post.store');

Route::delete('/index/{id}', [PostsController::class,'destroy'])->name('post.destroy');

Route::get('/edit/{id}', [PostsController::class,'edit'])->name('post.edit');

Route::put('/edit/{id}', [PostsController::class,'update'])->name('post.update');


Route::get('/show/{id}', [PostsController::class,'show'])->name('post.show');