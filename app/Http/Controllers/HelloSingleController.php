<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloSingleController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return <<<EOF
        <html>
            <head>
            <title>Single Action</title>
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
            <h1>Single Action</h1>
            <p>これはSingleActionコントローラーです。</p>
            </body>
        </html>
        EOF;
    }
}
