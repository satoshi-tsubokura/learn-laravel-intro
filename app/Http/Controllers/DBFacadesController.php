<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use stdClass;

class DBFacadesController extends Controller
{
    public function index(Request $request) {
        $validator = Validator::make($request->query(), [
            'id' => 'nullable|exists:people,id'
        ]);

        $msg = '';
        if (isset($request->id)) {
            if ($validator->passes()) {
                $people = DB::select('select * from people where id=:id', [':id' => $request->id]);
            } else {
                $people = [];
                $msg = '指定したidは存在しません。';
            }
        } else {
            $people = DB::select('select * from people');
        }
        // dd($people);
        return view('db_facade.index', compact('people', 'msg'));
    }

    public function add(): View {
        return view('db_facade.add');
    }

    public function store(Request $request): RedirectResponse {
        $bindValues = [
            ':name' => $request->name,
            ':mail' => $request->mail,
            ':age' => $request->age,
        ];

        $is_success = DB::insert('INSERT INTO people(name, mail, age) VALUES(:name, :mail, :age)', $bindValues);

        return redirect()->route('db_facade.index');
    }

    public function edit(Request $request, string $id) {
        $people = DB::select('select * from people where id=:id', ['id' => $id])[0];
        return view('db_facade.edit', compact('people'));
    }

    public function update(Request $request, string $id) {
        $bindValues = [
            ':id' => $id,
            ':name' => $request->name,
            ':mail' => $request->mail,
            ':age' => $request->age,
        ];
        DB::update('UPDATE people SET name=:name, mail=:mail, age=:age where id=:id', $bindValues);

        return redirect()->route('db_facade.index');
    }

    public function destroy(string $id) {
        DB::delete('DELETE FROM people where id=:id', ['id' => $id]);
        return redirect()->route('db_facade.index');
    }
}
