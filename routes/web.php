<?php

use App\Http\Composers\HelloComposer;
use App\Http\Controllers\CookieController;
use App\Http\Controllers\DBFacadesController;
use App\Http\Controllers\FlashController;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\HelloSingleController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RestdataController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/hello', [HelloController::class, 'index'])
    ->name('hello.index')
    ->middleware('helo');
Route::get('/hello/other/{id?}/{pass?}', [HelloController::class, 'other']);

Route::get('/msg/{msg?}', function (string $msg = 'no message') {
    $html= <<<EOF
    <html>
        <head>
        <title>Hello</title>
        <style>
            body {
            font-size:16pt;
            color: #999;
            }

            h1 {
            font-size: 100px;
            text-align: right;
            color: #eee;
            margin: -40px 0px 50px 0px;
            }
        </style>
        </head>
        <body>
        <h1>Hello</h1>
        <p>{$msg}</p>
        <p>これはサンプルで作ったページです</p>
        </body>
    </html>
    EOF;
    return $html;
})
->where('msg', '[A-Za-z_]+')// パラメーターを正規表現でチェックする
->name('msg'); 

Route::get('/user/{id}', function(int $id) {
    return $id;
});

Route::get('hello/create', [HelloController::class, 'create'])->name('hello.create');
Route::post('hello/create', [HelloController::class, 'post'])->name('hello.post');
Route::get('hello/login', [HelloController::class, 'login'])->middleware(['guest'])->name('hello.login');
Route::post('hello/login', [HelloController::class, 'auth'])->middleware(['guest'])->name('hello.auth');

// シングルアクションコントローラー
Route::get('/hello2', HelloSingleController::class);

Route::get('/cookie', [CookieController::class, 'index'])->name('cookie.index');
Route::post('/cookie', [CookieController::class, 'post'])->name('cookie.post');
Route::get('/db_facade', [DBFacadesController::class, 'index'])->name('db_facade.index');
Route::get('/db_facade/test', [DBFacadesController::class, 'test'])->name('db_facade.test');
Route::get('/db_facade/add', [DBFacadesController::class, 'add'])->name('db_facade.add');
Route::get('/db_facade/show/{id}', [DBFacadesController::class, 'show'])->name('db_facade.show');
Route::get('/db_facade/search', [DBFacadesController::class, 'search'])->name('db_facade.search');
Route::post('/db_facade/add', [DBFacadesController::class, 'store'])->name('db_facade.store');
Route::get('/db_facade/edit/{id}', [DBFacadesController::class, 'edit'])->name('db_facade.edit');
Route::put('/db_facade/edit/{id}', [DBFacadesController::class, 'update'])->name('db_facade.update');
Route::delete('/db_facade/delete/{id}', [DBFacadesController::class, 'destroy'])->name('db_facade.delete');

Route::get('/person', [PersonController::class, 'index'])->name('person.index');
Route::get('/person/find', [PersonController::class, 'find'])->name('person.find');
Route::post('/person/find', [PersonController::class, 'search'])->name('person.search');
Route::get('/person/add', [PersonController::class, 'add'])->name('person.add');
Route::post('/person/add', [PersonController::class, 'create'])->name('person.create');
Route::get('/person/edit/{person}', [PersonController::class, 'edit'])->name('person.edit');
Route::get('/person/edit/{person}', [PersonController::class, 'edit'])->name('person.edit');
Route::put('/person/edit/{person}', [PersonController::class, 'store'])->name('person.store');
Route::delete('/person/delete/{person}', [PersonController::class, 'destroy'])->name('person.destroy');

Route::get('/post', [PostController::class, 'index'])->name('post.index');
Route::get('/post/add', [PostController::class, 'add'])->name('post.add')->middleware(['auth']);
Route::post('/post/add', [PostController::class, 'create'])->name('post.create');
Route::get('/post/person/{person}', [PostController::class, 'person_index'])->name('post.person_index');
Route::get('/post/even', [PostController::class, 'even_index'])->name('post.even_index');
Route::resource('/rest', RestdataController::class);

Route::get('/flash/practice', [FlashController::class, 'getIndex']);
Route::post('/flash/practice', [FlashController::class, 'postIndex']);
require __DIR__.'/auth.php';
