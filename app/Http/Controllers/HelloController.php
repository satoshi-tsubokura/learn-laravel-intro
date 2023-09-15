<?php

namespace App\Http\Controllers;

use App\Http\Requests\HelloRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Fluent;

class HelloController extends Controller
{
    public function index(Request $request, Response $response) {
        // $msg = "これはコントローラから渡された値です。";
        
        // クエリストリングのバリデーション
        $validator = Validator::make($request->query(), [
          'id' => 'integer',
          'pass' => 'between:8, 15'
        ]);
          
        if ($validator->fails()) {
          $msg = 'クエリーに問題があります。';
        } else {
          $msg = 'ID,PASSを受け取りました。';
          $validated = $validator->validated();
        }
        // クエリストリングの取得
        $id = $validated['id'] ?? 'no id';
        $pass = $validated['pass'] ?? 'no pass';
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

        return view('hello.index', compact('msg', 'id', 'pass', 'full_url', 'area', 'data', 'users'));
    }

    public function other(string $id = 'noname', string $pass = 'unknown') {
        return view('hello.other', compact('id', 'pass'));
    }

    public function create() {
        return view('hello.create');
    }
    
    public function post(HelloRequest $request) {
      //   $validator = Validator::make($request->all(), [
      //     'name' => 'required|alpha_dash',
      //     'age' => 'nullable|integer|max:150|min:10',
      //     'contact' => 'required|in:email, tel',
      //     'concent' => 'accepted',
      //     'gender' => 'required|in:men,women,other',
      //     'start' => 'date_format:Y-m-d\TH:i',
      //     'end' => 'date_format:Y-m-d\TH:i|after_or_equal:start',
      //   ],
      //   [
      //     'tel.required' => '電話を選択した場合、入力必須です。',
      //     'mail.required' => 'メールアドレスを選択した場合、入力必須です。',
      //     '*.required' => ':attributeは入力必須です。',
      //       'age.max' => ':attributeは最大:maxまでです。',
      //       'age.min' => ':attributeは最小:minまでです。',
      //       'gender.in' => '性別欄から選択してください。'
      //   ],
      //   [
      //     'name' => '名前',
      //     'age' => '年齢'
      //   ]
      // );

      // $validator->sometimes('mail', 'required|email', function(Fluent $input) {
      //   return $input->contact === 'email';
      // });

      // $validator->sometimes('tel', 'required|regex:/\A\d{11}+\z/i', function(Fluent $input) {
      //   return $input->contact === 'tel';
      // });

      //   if ($validator->fails()) {
      //     return redirect()->route('hello.create')
      //                       ->withErrors($validator)
      //                       ->withInput();
      //   }
        
        $msg = 'メッセージは正しく入力されました。';
        return view('hello.create', compact('msg'));
    }
}
