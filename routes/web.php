<?php

use App\Http\Controllers\CookieController;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\HelloSingleController;
use Illuminate\Support\Facades\Route;

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

// シングルアクションコントローラー
Route::get('/hello2', HelloSingleController::class);

Route::get('/cookie', [CookieController::class, 'index'])->name('cookie.index');
Route::post('/cookie', [CookieController::class, 'post'])->name('cookie.post');