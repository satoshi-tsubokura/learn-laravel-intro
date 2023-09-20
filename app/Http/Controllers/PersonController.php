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
        // $person = Person::find($input);
        $people = Person::whereLike('name', $input)->get();
        // dd($people);
        // $people = Person::ageGreaterThan((int) $input)
        //                 ->ageLessThan((int) $input + 10)
        //                 ->get();
        return view('person.find', compact('people', 'input'));
    }

    public function add(Request $request) {
        return view('person.add');
    }

    public function create(Request $request) {
        $validated = $request->validate(Person::$rules);

        $person = new Person();
        // $person->name = $request->name;
        // $person->mail = $request->mail;
        // $person->age = $request->age;
        $person->fill($validated);
        $person->save();
        return redirect()->route('person.add');
    }

    public function edit(Request $request, Person $person) {
        return view('person.edit', compact('person'));
    }

    public function store(Request $request, Person $person) {
        $validated = $request->validate(Person::$rules);

        $person->name = $validated['name'];
        $person->mail = $validated['mail'];
        $person->age = $validated['age'];

        $person->save();

        return redirect()->route('person.index');
    }

    public function destroy(Request $request, Person $person) {
        $person->delete();
        return redirect()->route('person.index');
    }
}
