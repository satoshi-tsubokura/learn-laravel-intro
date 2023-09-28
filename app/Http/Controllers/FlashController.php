<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FlashController extends Controller
{
    public function getIndex() {
        return view('flash.practice');
    }

    public function postIndex(Request $request) {
        if (isset($request->email)) {
            session()->flash('flashmessage', '登録完了');
        } else {
            session()->flash('flashmessage', '登録失敗');
        }

        return redirect('flash/practice');
    }
}
