@extends('templates.template')

@section('title', 'Editar Tipo de Documento')

@section('content')
    Onde Estou: Tipos de Documentos > <b>Editar Tipos de Documentos</b>

    <div class="text-center mt-3 mb-4">
        <h3>[ EDITAR TIPO DE DOCUMENTOS ]</h3>


        <a href="{{ route('tiposdocumentos.index') }}">
            <button class="btn btn-warning">Voltar</button>
        </a>
    </div>

    {{-- MENSAGENS DE FEEDBACK --}}
    @if (session('message'))
        <div class="text-center alert alert-warning">
            <p>{{ session('message') }}</p>
        </div>
    @endif

    <hr>
    <div class="col-4 m-auto container-fluid">

        <form name="editar_tipodocumento" action="{{ route('tiposdocumentos.update', $tipodocumento->id) }}"
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

            <label for="tdo_nom_tipo_documento">Tipo de Documento: *</label>
            <input type="text" name="tdo_nom_tipo_documento" id="tdo_nom_tipo_documento" class="form-control" required
                autofocus="" value="{{ $tipodocumento->tdo_nom_tipo_documento }}" onkeydown="upperCaseF(this)">
            <br>

            <input type="submit" class="btn btn-primary" value="Alterar">
        </form>

    </div>

    <script src="{{ asset('assets/js/scripts.js') }}"></script>
@endsection
