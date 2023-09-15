<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HelloMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        /*-----  以下、リクエストを受け取ってからコントローラーアクション実行の間に行われる処理  -----*/
        $users = [
            [
                'name' => '山田太郎',
                'mail' => 'tarou@yamada'
            ],
            [
                'name' => '田中花子',
                'mail' => 'tanaka@flower'
            ],
            [
                'name' => '鈴木幸子',
                'mail' => 'suzuki@happy'
            ],
        ];

        $request->mergeIfMissing(['users' => $users]);

        // コントローラーのアクション実行
        $response = $next($request);

        /*-----  以下、アクションとレスポンスの間に行われる処理  -----*/
        $content = $response->getContent();
        $pattern = '/<middleware>(.*)<\/middleware>/i';
        $replace = '<a href="http://$1">$1</a>';
        $content = preg_replace($pattern, $replace, $content);

        $response->setContent($content);
        return $response;
    }
}
