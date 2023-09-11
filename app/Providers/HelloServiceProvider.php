<?php

namespace App\Providers;

use App\Http\Composers\HelloComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\View as ViewView;

class HelloServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     * ビューコンポーザーは同じビューファイルを読み込んだ時に、リクエストやURLに限らず、常に必要な処理をして、ビューに渡すときに利用する
     * ビューがレンダリングされる直前に実行される
     * view createはビューがインスタンス化される直前に行われる
     */
    public function boot(): void
    {
        // クロージャーを用いたビューコンポーザーの登録
        // View::composer('hello.index', function(ViewView $view) {
        //     $view->with('view_message', 'composer message!');
        // });

        // コンポーザークラスを用いたビューコンポーザーの登録
        View::composer('hello.index', HelloComposer::class);
    }
}
