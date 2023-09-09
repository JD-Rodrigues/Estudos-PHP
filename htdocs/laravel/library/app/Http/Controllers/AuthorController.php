<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;

class AuthorController extends Controller
{
    public function index()
    {
        return Author::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return Author::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $id = $request->input('id');

        return Author::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $authorExists = Author::findOrFail($request->input('id'));

        $requestArray = $request->all();

        foreach($requestArray as $input=>$value) {
            if(array_key_exists($input, $authorExists->getAttributes())) {
                $authorExists->$input = $value;
            }
        }

        $authorExists->save();

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Example $example)
    {
        //
    }
}
