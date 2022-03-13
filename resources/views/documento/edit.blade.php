@extends('templates.template')

@section('title', 'Editar Documento')

@section('content')
    Onde Estou: <a href="{{ route('empresas.index') }}">Empresa </a> > Visualizar Empresa > Documentos da Empresa >
    <b>Editar Documento</b>

    <div class="text-center mt-3 mb-4">
        <h3>[EDITAR DOCUMENTO]</h3>


        <a href="{{ route('documentos.index', $documento->doc_id_emp) }}">
            <button class="btn btn-warning">Voltar</button>
        </a>
    </div>
    <hr>
    <div class="col-4 m-auto container-fluid">

        <form class="logreg-forms" name="edit_documento" action="{{ route('documentos.update', $documento->id) }}"
            method="post">
            @csrf
            @method('PUT')

            {{-- MENSAGENS DE FEEDBACK --}}
            @if (session('message'))
                <div class="text-center alert alert-warning">
                    <p>{{ session('message') }}</p>
                </div>
            @endif

            {{-- VALIDAÇÃO BACKEND --}}
            @if ($errors->any())
                <div class="text-center mt-4 mb-4 p-2 alert-danger">
                    @foreach ($errors->all() as $erro)
                        {{ $erro }}<br>
                    @endforeach
                </div>
            @endif

            <input type="hidden" name="doc_id_emp" id="doc_id_emp" value="{{ $documento->doc_id_emp }}">

            <label for="doc_id_tdo">Tipo de Documento: *</label>
            <select class="form-control" name="doc_id_tdo" id="doc_id_tdo">
                <option value="{{ $documento->tipo_documento->id }}">
                    {{ $documento->tipo_documento->tdo_nom_tipo_documento }}</option>
                @foreach ($tiposdocumentos as $item)
                    <option value="{{ $item->id }}">{{ $item->tdo_nom_tipo_documento }}</option>
                @endforeach
            </select>
            <a href="{{ route('tiposdocumentos.index') }}">Cadastrar Tipo de Documento +</a>

            <label for="doc_num_documento">Número do Documento: *</label>
            <input type="text" name="doc_num_documento" id="doc_num_documento" class="form-control" required autofocus=""
                value="{{ $documento->doc_num_documento }}">
            <br>

            <label for="doc_dat_cadastro">Data do Documento: *</label>
            <input type="date" name="doc_dat_cadastro" id="doc_dat_cadastro" class="form-control" required autofocus=""
                value="{{ $documento->doc_dat_cadastro }}">

            <br><br>

            <input type="submit" class="btn btn-primary" value="Alterar Documento">
        </form>
        <hr>
        <hr>



    </div>
    <script src="{{ asset('assets/js/scripts.js') }}"></script>
    {{-- JQUERY PARA MASCARAS --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>

@endsection
