<?php

namespace App\Http\Controllers;

use App\Http\Requests\LogradouroRequest;
use App\Models\Bairro;
use App\Models\Logradouro;
use Illuminate\Http\Request;

class LogradouroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $logradouros = Logradouro::paginate(20);
        return view('logradouro.index', ['logradouros' => $logradouros]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bairros = Bairro::all();
        return view('logradouro.create', ['bairros' => $bairros]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LogradouroController $request)
    {
        $logradouro = new Logradouro();
        $logradouro->create($request->all());
        return redirect()->route('logradouros.index')->with('message', 'Logradouro Cadastrado com sucesso!');
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
        $bairros = Bairro::all();
        $logradouro = Logradouro::find($id);
        return view('logradouro.edit', [
            'logradouro' => $logradouro,
            'bairros' => $bairros
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LogradouroRequest $request, $id)
    {
        $logradouro = Logradouro::find($id);
        $logradouro->update($request->all());
        return redirect()->route('logradouros.index')->with('message', 'O Logradouro foi alterado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Logradouro::find($id)->delete();
        return redirect()->route('logradouros.index')->with('message', 'Logradouro excluído com sucesso!');
    }

    public function buscar(Request $request)
    {
        $logradouros = Logradouro::where('log_nom_logradouro', 'LIKE', '%' . $request->buscar_log . '%')->paginate(20);
        $filters = $request->except('_token');
        return view('logradouro.index', [
            'filters' => $filters,
            'logradouros' => $logradouros
        ]);
    }
}
