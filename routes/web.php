<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\LabelController;
use App\Http\Controllers\VideoController;
use App\Models\Article;
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

// Route::get('/', function () {
//     return view('welcome');
// })->middleware('visitor');
Route::get('/blank', function () {
    // for ($i=4; $i < 14; $i++) {
    //     Article::find($i)->update(['category_id'=>2]);
    // }
})->name('blank');

Auth::routes();

Route::prefix('admin')->group(function () {
    Route::get('/main', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/event', [EventController::class, 'index'])->name('event');
    Route::get('/profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('profile');
    Route::put('/profile/{id}', [App\Http\Controllers\UserController::class, 'updateProfile'])->name('profile.update');
    Route::put('/profile/password/{id}', [App\Http\Controllers\UserController::class, 'updatePassword'])->name('profile.update.password');
    Route::put('/profile/image/{id}', [App\Http\Controllers\UserController::class, 'updateImage'])->name('profile.update.image');
    Route::resource('category', CategoryController::class);
    Route::resource('label', LabelController::class);
    Route::resource('article', ArticleController::class);
    Route::resource('video', VideoController::class);
});

Route::get('/', [App\Http\Controllers\PageController::class, 'index'])->name('user.home')->middleware('visitor');;
Route::get('/label/{name}', [App\Http\Controllers\PageController::class, 'search_label'])->name('user.search.label');
Route::get('/category/{name}', [App\Http\Controllers\PageController::class, 'search_category'])->name('user.search.category');
Route::get('/article', [App\Http\Controllers\PageController::class, 'article'])->name('user.article');
Route::get('/videos', [App\Http\Controllers\PageController::class, 'video'])->name('user.video');
Route::get('/event', [App\Http\Controllers\PageController::class, 'event'])->name('user.event');
Route::get('/instagram', [App\Http\Controllers\PageController::class, 'instagram'])->name('user.instagram');
Route::get('/{article}', [App\Http\Controllers\PageController::class, 'article_read'])->name('article.read');
Route::resource('event-c', EventController::class);


