<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    public function index(Request $request) {
        $people = Person::limit(10)->get();

        return view('person.index', compact('people'));
    }

    public function find(Request $request) {
        return view('person.find', ['input' => '']);
    } 

    public function search(Request $request) {
        $input = $request->input;
        $person = Person::find($input);
        return view('person.find', compact('person', 'input'));
    }
}
