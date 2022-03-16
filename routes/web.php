<?php

use App\Http\Controllers\Blog\Admin\CategoryController;
use App\Http\Controllers\Blog\Admin\PostController;
use App\Http\Controllers\RestTestController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//Route::prefix('blog')->group(function () {
//    Route::resource('posts', PostController::class)->names('blog.posts');
//});

//admin panel
Route::prefix('admin/blog')->group(function () {

    $methods = ['index', 'create', 'store', 'edit', 'update'];
    Route::resource('categories', CategoryController::class)
        ->only($methods)
        ->names('blog.admin.categories');

    Route::resource('posts', PostController::class)
        ->except(['show'])
        ->names('blog.admin.posts');

});

