<?php

namespace App\Http\Controllers;

use App\Http\Requests\EnderecoRequest;
use App\Models\Bairro;
use App\Models\Endereco;
use App\Models\Logradouro;
use Illuminate\Http\Request;

class EnderecoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($end_id_emp)
    {
        $enderecos = Endereco::where('end_id_emp', $end_id_emp)->paginate(20);
        return view('endereco.index', ['enderecos' => $enderecos, 'end_id_emp' => $end_id_emp]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($end_id_emp)
    {
        $logradouro = Logradouro::all();
        return view('endereco.create', [
            'end_id_emp' => $end_id_emp,
            'logradouro' => $logradouro
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EnderecoRequest $request)
    {
        $endereco = new Endereco();
        $endereco->create($request->all());
        return redirect()
            ->route('enderecos.index', $request->end_id_emp)
            ->with('message', 'Endereço cadastrado com sucesso!');
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
        $endereco = Endereco::find($id);
        $logradouro = Logradouro::all();
        return view('endereco.edit', [
            'endereco' => $endereco,
            'logradouro' => $logradouro
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EnderecoRequest $request, $id)
    {
        $endereco = Endereco::find($id);
        $endereco->update($request->all());
        return redirect()
            ->route('enderecos.index', $request->end_id_emp)
            ->with('message', 'Endereço alterado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $end_id_emp)
    {
        Endereco::find($id)->delete();
        return redirect()->route('enderecos.index', $end_id_emp)->with('message', 'Endereço excluído com sucesso!');
    }
}
