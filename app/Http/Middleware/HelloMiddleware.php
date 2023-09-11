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
        return $next($request);
    }
}
