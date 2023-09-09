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
    public function update(Request $request, Example $example)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Example $example)
    {
        //
    }
}
