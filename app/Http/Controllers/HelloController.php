<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class HelloController extends Controller
{
    public function index(Request $request, Response $response) {
        $msg = "これはコントローラから渡された値です。";
        
        // クエリストリングの取得
        $id = $request->id ?? 'no id';
        $full_url = $request->fullUrl();

        $area = [
            [
              'name' => '北海道',
              'value' => 0
            ],
            [
              'name' => '東北',
              'value' => 1
            ],
            [
              'name' => '中部',
              'value' => 2
            ],
            [
              'name' => '関東',
              'value' => 3
            ],
            [
              'name' => '近畿',
              'value' => 4
            ],
            [
              'name' => '中国・四国',
              'value' => 5
            ],
            [
              'name' => '九州・沖縄',
              'value' => 6
            ],
        ];

        $data = ['one', 'two', 'three', 'four', 'five'];

        $users = $request->users;

        return view('hello.index', compact('msg', 'id', 'full_url', 'area', 'data', 'users'));
    }

    public function other(string $id = 'noname', string $pass = 'unknown') {
        return view('hello.other', compact('id', 'pass'));
    }

    public function create() {
        return view('hello.create');
    }
    
    public function post(Request $request) {
        $msg = $request->msg;
        return view('hello.create', compact('msg'));
    }
}
