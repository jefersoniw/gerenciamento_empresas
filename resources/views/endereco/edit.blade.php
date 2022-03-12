@extends('templates.template')

@section('title', 'Editar Endereço')

@section('content')
    Onde Estou: <a href="{{ route('empresas.index') }}">Empresa </a> > Visualizar Empresa > Endereços da Empresa >
    <b>Editar Endereço</b>

    <div class="text-center mt-3 mb-4">
        <h3>[EDITAR ENDEREÇO]</h3>


        <a href="{{ route('enderecos.index', $endereco->end_id_emp) }}">
            <button class="btn btn-warning">Voltar</button>
        </a>
    </div>
    <hr>
    <div class="col-4 m-auto container-fluid">

        <form class="logreg-forms" name="editar_endereco" action="{{ route('endereco.update', $endereco->id) }}"
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

            <input type="hidden" name="end_id_emp" id="end_id_emp" value="{{ $endereco->end_id_emp }}">

            <label for="end_num_numero">Número: *</label>
            <input type="number" name="end_num_numero" id="end_num_numero" class="form-control" required autofocus=""
                value="{{ $endereco->end_num_numero }}">
            <br>

            <label for="end_nom_complemento">Complemento: *</label>
            <input type="text" name="end_nom_complemento" id="end_nom_complemento" class="form-control" required
                autofocus="" value="{{ $endereco->end_nom_complemento }}" onkeydown="upperCaseF(this)">
            <br>

            <label for="end_num_lat">Latitude: </label>
            <input type="numer" name="end_num_lat" id="end_num_lat" class="form-control" autofocus=""
                value="{{ $endereco->end_num_lat }}">
            <br>

            <label for="end_num_long">Longitude: </label>
            <input type="numer" name="end_num_long" id="end_num_long" class="form-control" autofocus=""
                value="{{ $endereco->end_num_long }}">
            <br>

            <label for="end_id_log">Logradouro: *</label>
            <select class="form-control" name="end_id_log" id="end_id_log">
                <option value="{{ $endereco->logradouro->id }}">{{ $endereco->logradouro->log_nom_logradouro }} -
                    {{ $endereco->logradouro->bairro->bai_nom_bairro }}</option>
                @foreach ($logradouro as $item)
                    <option value="{{ $item->id }}">{{ $item->log_nom_logradouro }} -
                        {{ $item->bairro->bai_nom_bairro }}</option>
                @endforeach
            </select>
            <a href="{{ route('logradouros.index') }}">Cadastrar Logradouro +</a>

            <br><br>

            <input type="submit" class="btn btn-primary" value="Alterar Endereço">
        </form>
        <hr>
        <hr>



    </div>
    <script src="{{ asset('assets/js/scripts.js') }}"></script>
    {{-- JQUERY PARA MASCARAS --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>

@endsection
