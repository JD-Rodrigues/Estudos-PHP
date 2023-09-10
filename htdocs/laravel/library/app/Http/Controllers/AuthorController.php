<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;


class AuthorController extends Controller
{
    public function index()
    {
        try {
            return Author::all();
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'nome'=>'string|required|max:255',
            'ano_de_nascimento'=>'required|integer|max_digits:4',
            'nacionalidade_id'=>'integer|required|max:20'
        ];

        $messages = [
            'nome.string'=>'O nome precisa ser valor do tipo texto.',
            'nome.required'=>'Você precisa enviar um nome.',
            'ano_de_nascimento.required'=>'Você precisa informar o ano de nascimento.',
            'ano_de_nascimento.integer'=>'O ano de nascimento tem de ser um número.',
            'ano_de_nascimento.max_digits'=>'O ano de nascimento não pode exceder 4 dígitos.'
        ];
        
        try {
            $request->validate($rules, $messages);

            return Author::create($request->all());

        } catch (\Throwable $th) {
            return $th->getMessage();
        }
        
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        try {
            $request->validate([
                'id'=>'required|integer',
            ]);

            $id = $request->input('id');

            return Author::findOrFail($id);

        } catch (\Throwable $th) {
            return $th->getMessage();
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
                'ano_de_nascimento'=>'integer|max_digits:4',
                'nacionalidade_id'=>'integer|max:20'
            ]);

            $authorExists = Author::findOrFail($request->input('id'));

            $requestArray = $request->all();

            foreach($requestArray as $input=>$value) {
                if(array_key_exists($input, $authorExists->getAttributes())) {
                    $authorExists->$input = $value;
                }
            }

            $authorExists->save();
            return $authorExists;
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
        
        

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        try {
            $request->validate([
                'id'=>'required|integer'
            ]);
            
            $authorExists = Author::findOrFail($request->input('id'));
    
            $authorExists->delete();
            return "O autor de id $authorExists->id foi removido.";
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
