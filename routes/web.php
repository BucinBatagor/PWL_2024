<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PhotoController;

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

// Basic Routing
Route::get('/hello', function () {
    return 'Hello World';
});
Route::get('/world', function () {
    return 'World';
});
Route::get('/', function () {
    return 'Selamat Datang';
});
Route::get('/about', function () {
    return 'Nizar Khawarizmi <br> 3202216105';
});

// Route Parameters
Route::get('/user/{name}', function($name){
    return 'Nama saya '.$name;
});
Route::get('/posts/{post}/comments/{comment}', function($postId, $commentId){
    return 'Pos ke-'.$postId." Komentar ke-: ".$commentId;
});
Route::get('/articles/{id}', function($id){
    return 'Halaman artikel dengan ID '.$id;
});

// Optional Parameters
Route::get('/user/{name?}', function($name='John'){
    return 'Nama saya '.$name;
});


// Membuat Route dari Controller WelcomeController
Route::get('hello', [WelcomeController::class,'hello']);

// Membuat Route dari Controllers PageController
Route::get('', [PageController::class,'index']);
Route::get('about', [PageController::class,'about']);
Route::get('articles/{id}', [PageController::class,'articles']);

// Membuat Route dari Controllers HomeController, AboutController, dan ArticleController
// Single Action Controller
Route::get('', [HomeController::class,'index']);
Route::get('about', [AboutController::class,'about']);
Route::get('articles/{id}', [ArticleController::class,'articles']);

// Membuat Route dari Controller PhotoController
Route::resource('photos', PhotoController::class);
Route::resource('photos', PhotoController::class)->only([
    'index', 'show'
]);
Route::resource('photos', PhotoController::class)->except([
    'create', 'store', 'update', 'destroy'
]);

Route::get('/greeting', [WelcomeController::class,'greeting']);