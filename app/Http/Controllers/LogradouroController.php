<?php

namespace App\Http\Controllers;

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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function createFast($end_id_emp, Request $request)
    {
        $logradouro = Logradouro::all();
        $bairro = Bairro::find($request->log_id_bai);
        return view('logradouro.createfast', [
            'logradouro' => $logradouro,
            'end_id_emp' => $end_id_emp,
            'bairro' => $bairro
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function storeFast(Request $request)
    {
        $end_id_emp = $request->end_id_emp;
        $logradouro = new Logradouro();
        $logradouro->log_nom_logradouro = $request->log_nom_logradouro;
        $logradouro->log_num_cep = $request->log_num_cep;
        $logradouro->log_id_bai = $request->log_id_bai;
        $logradouro->save();

        return redirect()
            ->route('enderecos.create', ['end_id_emp' => $end_id_emp])
            ->with('message', 'O Logradouro foi cadastrado com sucesso!');
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
    public function destroy($id)
    {
        //
    }
}
