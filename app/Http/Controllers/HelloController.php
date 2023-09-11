<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class HelloController extends Controller
{
    public function index(Request $request, Response $response) {
        $html= <<<EOF
        <html>
            <head>
            <title>Hello/Index</title>
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
            <h1>Hello/Index</h1>
            <h2>Request</h2>
            <pre>{$request}</pre>
            <pre>{$request->host()}</pre>
            <pre>{$request->httpHost()}</pre>
            <pre>{$request->schemeAndHttpHost()}</pre>
            <h2>Response</h2>
            <pre>{$response}</pre>
            </body>
        </html>
        EOF;
        
        // dd($request->url());
        // dd($request->fullUrl()); // クエリストリングを含む
        // dd($request->path()); // ドメインを除いたパスを取得する

        $response->setContent($html);
        return $response;
    }

    public function other(string $id = 'noname', string $pass = 'unknown') {
        $html= <<<EOF
        <html>
            <head>
            <title>Hello/Other</title>
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
            <h1>Hello/Other</h1>
            <p>これはHelloControllerのotherメソッドです。</p>
            <ul>
                <li>{$id}</li>
                <li>{$pass}</li>
            </ul>
            </body>
        </html>
        EOF;

        return $html;
    }
}
