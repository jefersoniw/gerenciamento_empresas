@extends('templates.template')

@section('title', 'Cadastrar Endereço')

@section('content')
    Onde Estou: <a href="{{ route('empresas.index') }}">Empresa </a> > Visualizar Empresa > Endereços da Empresa >
    <b>Cadastrar Endereço</b>

    <div class="text-center mt-3 mb-4">
        <h3>[CADASTRAR ENDEREÇO]</h3>


        <a href="{{ route('enderecos.index', $end_id_emp) }}">
            <button class="btn btn-warning">Voltar</button>
        </a>
    </div>
    <hr>
    <div class="col-4 m-auto container-fluid">

        <form class="logreg-forms" name="create_endereco" action="{{ route('enderecos.store') }}" method="post">
            @csrf

            {{-- VALIDAÇÃO BACKEND --}}
            @if ($errors->any())
                <div class="text-center mt-4 mb-4 p-2 alert-danger">
                    @foreach ($errors->all() as $erro)
                        {{ $erro }}<br>
                    @endforeach
                </div>
            @endif

            <label for="end_num_numero">Número: *</label>
            <input type="number" name="end_num_numero" id="end_num_numero" class="form-control" required autofocus=""
                value="{{ old('end_num_numero') }}">
            <br>

            <label for="end_nom_complemento">Complemento: *</label>
            <input type="text" name="end_nom_complemento" id="end_nom_complemento" class="form-control" required
                autofocus="" value="{{ old('end_nom_complemento') }}" onkeydown="upperCaseF(this)">
            <br>

            <label for="end_num_lat">Latitude: </label>
            <input type="numer" name="end_num_lat" id="end_num_lat" class="form-control" required autofocus=""
                value="{{ old('end_num_lat') }}">
            <br>

            <label for="end_num_long">Longitude: </label>
            <input type="numer" name="end_num_long" id="end_num_long" class="form-control" required autofocus=""
                value="{{ old('end_num_long') }}">
            <br>

            <label for="end_id_log">Logradouro: *</label>
            <select class="form-control" name="end_id_log" id="end_id_log">
                <option value="">Selecione</option>
                @foreach ($logradouro as $item)
                    <option value="{{ $item->id }}">{{ $item->log_nom_logradouro }}</option>
                @endforeach
            </select>

            <button class="btn btn-dark btn-sm" type="button" onclick="Mudarestado('div_logradouro')">Cadastrar
                Logradouro</button>

            <br><br>

            <input type="submit" class="btn btn-primary" value="Cadastrar Endereço">
        </form>
        <hr>
        <hr>

        {{-- FORMULÁRIO DE CADASTRO DO LOGRADOURO --}}
        <div style="display: none" id="div_logradouro">
            <form name="cadastrar_logradouro" action="" method="post">
                @csrf

                <h3>[CADASTRAR LOGRADOURO]</h3>

                {{-- VALIDAÇÃO BACKEND --}}
                @if ($errors->any())
                    <div class="text-center mt-4 mb-4 p-2 alert-danger">
                        @foreach ($errors->all() as $erro)
                            {{ $erro }}<br>
                        @endforeach
                    </div>
                @endif

                <label for="log_nom_logradouro">Logradouro: *</label>
                <input type="text" name="log_nom_logradouro" id="log_nom_logradouro" class="form-control" required
                    autofocus="" value="{{ old('log_nom_logradouro') }}" onkeydown="upperCaseF(this)">
                <br>

                <label for="log_num_cep">Cep: *</label>
                <input type="text" name="log_num_cep" id="log_num_cep" class="form-control" required autofocus=""
                    value="{{ old('log_num_cep') }}" onkeypress="$(this).mask('00.000-000');">
                <br>

                <label for="log_id_bai">Bairro: *</label><br>
                <select class="form-control" name="log_id_bai" id="log_id_bai">
                    <option value="">Selecione</option>
                    @foreach ($bairro as $item)
                        <option value="{{ $item->id }}">{{ $item->bai_nom_bairro }}</option>
                    @endforeach
                </select>
                <button class="btn btn-dark btn-sm" type="button" onclick="Mudarestado('div_bairro')">Cadastrar
                    Bairro</button>

                <br><br>

                <input type="submit" class="btn btn-primary" value="Cadastrar Logradouro">

            </form>
        </div>

        <hr>
        <hr>
        {{-- FORMULÁRIO DE CADASTRO DO LOGRADOURO --}}
        <div style="display: none" id="div_bairro">
            <form name="cadastrar_bairro" action="" method="post">
                @csrf

                <h3>[CADASTRAR BAIRRO]</h3>

                {{-- VALIDAÇÃO BACKEND --}}
                @if ($errors->any())
                    <div class="text-center mt-4 mb-4 p-2 alert-danger">
                        @foreach ($errors->all() as $erro)
                            {{ $erro }}<br>
                        @endforeach
                    </div>
                @endif

                <label for="bai_nom_bairro">Bairro: *</label>
                <input type="text" name="bai_nom_bairro" id="bai_nom_bairro" class="form-control" required autofocus=""
                    value="{{ old('bai_nom_bairro') }}" onkeydown="upperCaseF(this)">
                <br>

                <input type="submit" class="btn btn-primary" value="Cadastrar Bairro">
            </form>
        </div>


    </div>
    <script src="{{ asset('assets/js/scripts.js') }}"></script>
    {{-- JQUERY PARA MASCARAS --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>

@endsection
