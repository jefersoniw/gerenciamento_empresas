<?php

namespace App\Http\Controllers;

use App\Models\Documento;
use App\Models\ImagemDocumento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ImagemDocumentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($imd_id_doc)
    {
        $imagemdocumento = ImagemDocumento::where('imd_id_doc', $imd_id_doc)->paginate(20);
        $documento = Documento::find($imd_id_doc);
        return view('imagemdoc.index', [
            'imagemdocumento' => $imagemdocumento,
            'imd_id_doc' => $imd_id_doc,
            'documento' => $documento
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($imd_id_doc)
    {
        return view('imagemdoc.create', ['imd_id_doc' => $imd_id_doc]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        if ($request->file('imd_arquivo')->isValid()) {

            $nameFile = Str::of($request->imd_nom_arquivo)->slug('-') . '.' . $request->file('imd_arquivo')->getClientOriginalExtension();

            $image = $request->file('imd_arquivo')->storeAs('imagemdocumento', $nameFile);
            $data['imd_arquivo'] = $image;
        }

        ImagemDocumento::create($data);
        return redirect()->route('imagemdocumento.index', $request->imd_id_doc)->with('message', 'Imagem anexada com sucesso!');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $imd_id_doc)
    {
        $imagem = ImagemDocumento::find($id);

        if (Storage::exists($imagem->imd_arquivo))
            Storage::delete($imagem->imd_arquivo);

        $imagem->delete();
        return redirect()->route('imagemdocumento.index', $imd_id_doc);
    }
}
