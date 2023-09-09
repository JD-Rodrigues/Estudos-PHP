<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nacionalidade;

class NacionalidadeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Nacionalidade::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return Nacionalidade::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $nacionalidade = Nacionalidade::find($request->input('id'));

        return $nacionalidade ? $nacionalidade : "Não há uma nacionalidade com o id informado na base de dados.";
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $nacionalidadeExists = Nacionalidade::find($request->input('id'));

        if ($nacionalidadeExists) {

            $requestsArray = $request->all();

            foreach($requestsArray as $input=>$value) {
                if(array_key_exists($input, $requestsArray)) {
                    $nacionalidadeExists->$input = $value;
                }
            }
            $nacionalidadeExists->save();
            return $nacionalidadeExists;
        } else {
            return ["Erro:"=>"Não há nacionalidade com o id informado no banco de dados."];
        }

        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $nacionalidadeExists = Nacionalidade::find($request->input('id'));

        if($nacionalidadeExists) {
            $nacionalidadeExists->delete();
            return $nacionalidadeExists;
        } else {
            return "Não existe uma nacionalidade com o id informado cadastrada no sistema.";
        }
    }
}
