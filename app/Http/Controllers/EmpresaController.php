<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empresas = Empresa::orderBy('id', 'desc')->paginate(20);
        return view('empresa.index', ['empresas' => $empresas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('empresa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $empresa = new Empresa();
        $empresa->emp_nom_empresa = $request->emp_nom_empresa;
        $empresa->emp_dti_atividade = $request->emp_dti_atividade;
        $empresa->emp_dtf_atividade = $request->emp_dtf_atividade;
        if ($request->emp_especial == 1) {
            $empresa->emp_especial = $request->emp_especial;
        } else {
            $empresa->emp_especial = 0;
        }
        $empresa->save();
        return redirect()->route('empresas.index', $empresa->id)->with('message', 'A Empresa foi cadastrada com sucesso!');
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
        $empresa = Empresa::find($id);
        return view('empresa.edit', ['empresa' => $empresa]);
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
    public function destroy($id)
    {
        Empresa::find($id)->delete();
        return redirect()->route('empresas.index')->with('message', 'A Empresa foi excluída com sucesso!');
    }

    public function buscar(Request $request)
    {
        $empresas = Empresa::withTrashed()->where('emp_nom_empresa', 'LIKE', '%' . $request->buscar_empresa . '%')->paginate(20);
        $filters = $request->except('_token');
        return view('empresa.index', [
            'empresas' => $empresas,
            'filters' => $filters
        ]);
    }

    public function especial()
    {
        $empresas = Empresa::where('emp_especial', 1)->paginate(20);
        return view('empresa.index', ['empresas' => $empresas]);
    }

    public function excluidos()
    {
        $empresas = Empresa::onlyTrashed()->paginate(20);
        return view('empresa.index', ['empresas' => $empresas]);
    }

    public function addEspecial($id)
    {
        //
    }

    public function removeEspecial($id)
    {
        //
    }

    public function restore($id)
    {
        Empresa::onlyTrashed()->where('id', $id)->restore();
        return redirect()->route('empresas.index')->with('message', 'A Empresa foi restaurada com sucesso!');
    }
}
