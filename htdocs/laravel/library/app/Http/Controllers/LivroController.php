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
        try {
            $validated = $request->validate([
                'nome'=>'string|max:255|required',
                'author_id'=>'required|integer',
                'ano_de_lancamento'=>'required|integer'
            ]);

            return Livro::create($request->all());

        } catch (\Throwable $e) {

            return response()->json(['errors' => $e->getMessage()], 422);

        }        
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {   
        try {
            $validated = $request->validate([
                'id'=>'required|integer',
            ]);

            return response()->json(Livro::find($request->input('id')));

        } catch (\Throwable $e) {
            return response()->json(['errors' => $e->getMessage()], 422);
        }        
       
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {           

        try {
            
            $request->validate([
                'id'=>'integer|required',
                'nome'=>'string|max:255',
                'author_id'=>'integer',
                'ano_de_lancamento'=>'integer'
            ]);

            $bookToUpdate = Livro::findOrFail($request->input('id'));

            $inputs = $request->all();

            if($bookToUpdate) {
                foreach($inputs as $input=>$value){
                    if(array_key_exists($input, $bookToUpdate->getAttributes())) {
                        $bookToUpdate->$input = $value;
                    }
                }
            }
    
            $bookToUpdate->save();
            return $bookToUpdate;

        } catch (\Throwable $e) {
            return response()->json(['errors' => $e->getMessage()], 422);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        try {
            $request->validate(['id'=>'integer|required']);

            $bookToDelete = Livro::find($request->input('id'));

            $bookToDelete->delete();

            return [
                'livro deletado:'=>$bookToDelete
            ];
        } catch (\Throwable $th) {
            return $th->getMessage() === "Call to a member function delete() on null" ? 'Não há livro com esse id.' : $th->getMessage();
        }
    }
}
