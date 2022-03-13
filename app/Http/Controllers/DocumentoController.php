<?php

namespace App\Http\Controllers;

use App\Http\Requests\DocumentoRequest;
use App\Models\Documento;
use App\Models\TipoDocumento;
use Illuminate\Http\Request;

class DocumentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($doc_id_emp)
    {
        $documentos = Documento::where('doc_id_emp', $doc_id_emp)->paginate(20);
        return view('documento.index', [
            'documentos' => $documentos,
            'doc_id_emp' => $doc_id_emp
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($doc_id_emp)
    {
        $tiposdocumentos = TipoDocumento::all();
        return view('documento.create', [
            'tiposdocumentos' => $tiposdocumentos,
            'doc_id_emp' => $doc_id_emp
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DocumentoRequest $request)
    {
        $documento = new Documento();
        $documento->create($request->all());
        return redirect()->route('documentos.index', $request->doc_id_emp)->with('message', 'O Documento foi cadastrado com sucesso!');
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
        $documento = Documento::find($id);
        $tiposdocumentos = TipoDocumento::all();
        return view('documento.edit', [
            'documento' => $documento,
            'tiposdocumentos' => $tiposdocumentos
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DocumentoController $request, $id)
    {
        $documento = Documento::find($id);
        $documento->update($request->all());
        return redirect()->route('documentos.index', $request->doc_id_emp)->with('message', 'O Documento foi alterado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $doc_id_emp)
    {
        Documento::find($id)->delete();
        return redirect()->route('documentos.index', $doc_id_emp)->with('message', 'O Documento foi excluído com sucesso!');
    }
}
