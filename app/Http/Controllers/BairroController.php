<?php

namespace App\Http\Controllers;

use App\Http\Requests\BairroRequest;
use App\Models\Bairro;
use Illuminate\Http\Request;

class BairroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bairros = Bairro::paginate(30);
        return view('bairro.index', ['bairros' => $bairros]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bairro.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BairroRequest $request)
    {
        Bairro::create($request->all());
        return redirect()->route('bairros.index')->with('message', 'O Bairro foi cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bairro = Bairro::find($id);
        return view('bairro.edit', ['bairro' => $bairro]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BairroRequest $request, $id)
    {
        $bairro = Bairro::find($id);
        $bairro->update($request->all());
        return redirect()->route('bairros.index')->with('message', 'O Bairro foi alterado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Bairro::find($id)->delete();
        return redirect()->route('bairros.index')->with('message', 'O Bairro foi excluído com sucesso!');
    }
}
