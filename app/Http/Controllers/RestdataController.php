<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRestdataRequest;
use App\Http\Requests\UpdateRestdataRequest;
use App\Models\Restdata;

class RestdataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Restdata::all();

        return $data->toArray();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('rest.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRestdataRequest $request)
    {
        $validated = $request->validated();
        $rest = new Restdata();
        $rest->fill($validated)->save();

        return redirect()->route('rest.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Restdata $rest)
    {
        return $rest->toArray();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Restdata $rest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRestdataRequest $request, Restdata $rest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Restdata $rest)
    {
        //
    }
}
