@extends('templates.template')

@section('title', 'Editar Empresa')

@section('content')
    Onde Estou: <a href="{{ route('empresas.index') }}">Empresa </a> > <b>Editar Empresa</b>

    <div class="text-center mt-3 mb-4">
        <h3>[EDITAR EMPRESA]</h3>
        <a href="{{ route('empresas.show', $empresa->id) }}">
            <button class="btn btn-warning">Voltar</button>
        </a>
    </div>

    <hr>
    <div class="col-4 m-auto container-fluid">

        <form class="logreg-forms" name="editar_empresa" action="{{ route('empresas.update', $empresa->id) }}"
            method="post">
            @csrf
            @method('PUT')

            {{-- VALIDAÇÃO BACKEND --}}
            @if ($errors->any())
                <div class="text-center mt-4 mb-4 p-2 alert-danger">
                    @foreach ($errors->all() as $erro)
                        {{ $erro }}<br>
                    @endforeach
                </div>
            @endif

            <label for="emp_nom_empresa">Nome da Empresa: *</label>
            <input type="text" name="emp_nom_empresa" id="emp_nom_empresa" class="form-control"
                placeholder="Digite o nome da empresa" required autofocus="" onkeydown="upperCaseF(this)"
                value="{{ $empresa->emp_nom_empresa }}">
            <br>

            <label for="emp_dti_atividade">Data inicial de atividade: *</label>
            <input type="date" name="emp_dti_atividade" id="emp_dti_atividade" class="form-control" required autofocus=""
                value="{{ $empresa->emp_dti_atividade }}">
            <br>

            <label for="emp_dtf_atividade">Data final de atividade: </label>
            <input type="date" name="emp_dtf_atividade" id="emp_dtf_atividade" class="form-control" autofocus=""
                value="{{ $empresa->emp_dtf_atividade }}">
            <br>

            <input type="checkbox" name="emp_especial" id="emp_especial" value="1"
                @if ($empresa->emp_especial == 1) checked @endif>
            <label for="emp_especial">Empresa Especial</label>
            <br><br>

            <input type="submit" class="btn btn-primary" value="Alterar">


        </form>

    </div>

@endsection
