<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use stdClass;

class DBFacadesController extends Controller
{
    public function index(Request $request) {
        $validator = Validator::make($request->query(), [
            'id' => 'nullable|exists:people,id'
        ]);
        $page = $request->page ?? 1;
        $msg = '';
        if (isset($request->id)) {
            if ($validator->passes()) {
                $people = DB::select('select * from people where id=:id', [':id' => $request->id]);
            } else {
                $people = [];
                $msg = '指定したidは存在しません。';
            }
        } else {
            // $people = DB::select('select * from people');
            // クエリビルダを用いた方法 (戻り値はIlluminate\Support\Collection クラス)
            $people = DB::table('people') // クエリビルダの作成
                        ->orderBy('age', 'desc')
                        ->limit(4)
                        ->offset(($page-1)*2)
                        ->get(['id', 'name', 'mail', 'age']); // 全レコード取得
            $people_count = DB::table('people')->count();
            $msg = "登録人数: {$people_count}人";
        }
        // dd($people);
        return view('db_facade.index', compact('people', 'msg'));
    }

    public function add(): View {
        return view('db_facade.add');
    }

    public function store(Request $request): RedirectResponse {
        $bindValues = [
            'name' => $request->name,
            'mail' => $request->mail,
            'age' => $request->age,
        ];

        // $is_success = DB::insert('INSERT INTO people(name, mail, age) VALUES(:name, :mail, :age)', $bindValues);
        $is_success = DB::table('people')->insert($bindValues);

        return redirect()->route('db_facade.index');
    }

    public function edit(Request $request, string $id) {
        $people = DB::table('people')
                    ->find($id);
        return view('db_facade.edit', compact('people'));
    }

    public function update(Request $request, string $id) {
        $bindValues = [
            'name' => $request->name,
            'mail' => $request->mail,
            'age' => $request->age,
        ];
        // DB::update('UPDATE people SET name=:name, mail=:mail, age=:age where id=:id', $bindValues);
        $is_success = DB::table('people')
                        ->where('id', $id)
                        ->update($bindValues);

        return redirect()->route('db_facade.index');
    }

    public function destroy(string $id) {
        // DB::delete('DELETE FROM people where id=:id', ['id' => $id]);
        $deleted_num = DB::table('people')
                            ->delete($id);
        return redirect()->route('db_facade.index');
    }

    public function show(string $id) {
        // $person = DB::table('people')->where('id', $id)->first();
        // $person = DB::table('people')->find($id);
        $people = DB::table('people')->where('id', '<=', $id)->get();

        return view('db_facade.show', compact('people'));
    }

    public function search(Request $request) {
        $name = $request->name ?? '';
        $age_or_more = $request->age_or_more ?? -1;
        $age_or_less = $request->age_or_less ?? 99999;
        $people = DB::table('people')
                    // whereRawは:ageのようなプレースホルダを埋め込めない ?のみ可能     
                    ->whereRaw('(age >= ? and age <= ?)', [$age_or_more, $age_or_less])
                    ->where(function (Builder $query) use ($name) {
                        $query->where('name', 'like', '%' . $name . '%')
                                ->orWhere('mail', 'like', '%' . $name . '%');
                    })
                    ->get();       
        return view('db_facade.show', compact('people'));
    }

    // クエリビルダのテストコード
    public function test(Request $request) {
        // 一件分しか取得しない
        // $email = DB::table('people')->value('mail');
        // dd($email);

        // $email_list = DB::table('people')->pluck('mail', 'name');
        // foreach ($email_list as $name=>$mail) {
        //     echo "{$name}: {$mail} <br>";
        // }

        // // 指定した数のレコードごとに特定の処理を行う
        // // 速度と予期せぬバグの防止のため、chunkではなく、chunkByIdを使うこと
        // $users = DB::table('people')
        //             ->orderby('id')
        //             ->chunkById(100, function(Collection $people) {
        //                 foreach($people as $person) {
        //                     echo "{$person->name}: {$person->mail}<br>";
        //                 }
        //                 echo "-----------------------------------------------------------------<br>";
        //             });
        
        // レコードの存在確認
        // $is_exists = DB::table('people')
        //                 ->where('age', '>=', 50)
        //                 ->exists();
        // dd($is_exists);

        $people = DB::table('people')->distinct()->get();
        foreach($people as $person) {
            echo "{$person->name}: {$person->mail}<br>";
        }
    }
}
