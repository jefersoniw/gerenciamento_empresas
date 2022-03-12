<?php

namespace App\Http\Controllers;

use App\Models\TipoDocumento;
use Illuminate\Http\Request;

class TipoDocumentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tiposdocumentos = TipoDocumento::paginate(20);
        return view('tipodocumento.index', ['tiposdocumentos' => $tiposdocumentos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tipodocumento.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        TipoDocumento::create($request->all());
        return redirect()->route('tiposdocumentos.index')->with('message', 'Tipo de Documento cadastrado com sucesso!');
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
        $tipodocumento = TipoDocumento::find($id);
        return view('tipodocumento.edit', ['tipodocumento' => $tipodocumento]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $tipodocumento = TipoDocumento::find($id);
        $tipodocumento->update($request->all());
        return redirect()->route('tiposdocumentos.index')->with('message', 'O Tipo de Documento foi alterado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        TipoDocumento::find($id)->delete();
        return redirect()->route('tiposdocumentos.index')->with('message', 'Tipo de Documento excluído com sucesso!');
    }
}
