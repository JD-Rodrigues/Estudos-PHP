<?php

namespace App\Http\Controllers;
use App\Models\Livro;

use Illuminate\Http\Request;

class LivroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Livro::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return Livro::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
       
        return response()->json(Livro::find($request->input('id')));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $bookToUpdate = Livro::findOrFail($request->input('id'));

        $requestArray = $request->all();

        

        foreach($requestArray as $input=>$value){
            if(array_key_exists($input, $bookToUpdate->getAttributes())) {
                $bookToUpdate->$input = $value;
            }
        }

        $bookToUpdate->save();
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $bookToDelete = Livro::find($request->input('id'));

        $bookToDelete && $bookToDelete->delete();
    }
}
