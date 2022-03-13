@extends('templates.template')

@section('title', 'Cadastrar Imagem')

@section('content')
    Onde Estou: <a href="{{ route('empresas.index') }}">Empresa </a> > Visualizar Empresa > Documentos da Empresa >
    Imagens do Documento > <b>Cadastrar Imagem</b>

    <div class="text-center mt-3 mb-4">
        <h3>[CADASTRAR IMAGEM]</h3>


        <a href="{{ route('imagemdocumento.index', $imd_id_doc) }}">
            <button class="btn btn-warning">Voltar</button>
        </a>
    </div>
    <hr>
    <div class="col-4 m-auto container-fluid">

        <form class="logreg-forms" name="create_endereco" action="{{ route('imagemdocumento.store') }}" method="post"
            enctype="multipart/form-data">
            @csrf

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

            <input type="hidden" name="imd_id_doc" id="imd_id_doc" value="{{ $imd_id_doc }}">

            <label for="imd_nom_arquivo">Nome do Arquivo: *</label>
            <input type="text" name="imd_nom_arquivo" id="imd_nom_arquivo" class="form-control" required autofocus=""
                value="{{ old('imd_nom_arquivo') }}">
            <br>

            <label for="imd_arquivo">Arquivo: *</label>
            <input type="file" name="imd_arquivo" id="imd_arquivo" class="form-control" required autofocus=""
                value="{{ old('imd_arquivo') }}">
            <br>

            <br><br>

            <input type="submit" class="btn btn-primary" value="Cadastrar">
        </form>
        <hr>
        <hr>



    </div>
    <script src="{{ asset('assets/js/scripts.js') }}"></script>
    {{-- JQUERY PARA MASCARAS --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>

@endsection
