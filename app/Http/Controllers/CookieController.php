<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CookieController extends Controller
{
    public function index(Request $request) {
        if ($request->hasCookie('msg')) {
            $msg = 'Cookie: ' . $request->cookie('msg');
        } else {
            $msg = '※クッキーはありません。';
        }

        return view('cookie.index', ['msg' => $msg]);
    }

    public function post(Request $request) {
        $rule = ['msg' => 'required'];
        $validated = $request->validate($rule);

        $msg = $validated['msg'];

        // $response = new Response(view('cookie.index', ['msg' => "「{$msg}をクッキーに保存しました。」"]));
        // $response->setContent(view('cookie.index', ['msg' => "「{$msg}をクッキーに保存しました。」"]));
        // $response->cookie('msg', $msg, 100);

        return response(view('cookie.index', ['msg' => "「{$msg}をクッキーに保存しました。」"]))->cookie('msg', $msg, 100);
    }
 }
