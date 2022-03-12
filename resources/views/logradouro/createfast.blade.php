@extends('templates.template')

@section('title', 'Cadastrar Bairro')

@section('content')
    Onde Estou: <a href="{{ route('empresas.index') }}">Empresa </a> > Visualizar Empresa > Endereços da Empresa >
    Cadastrar Bairro > <b>Cadastrar Logradouro</b>

    <div class="text-center mt-3 mb-4">
        <h3>[ CADASTRAR ENDEREÇO/LOGRADOURO ]</h3>


        <a href="{{ route('bairros.createfast', $end_id_emp) }}">
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
        <form action="{{ route('enderecos.create', $end_id_emp) }}" method="get" name="selecionar_logradouro">
            @csrf

            <label for="end_id_log">Logradouro: *</label>
            <select class="form-control" name="end_id_log" id="end_id_log">
                <option value="">Selecione</option>
                @foreach ($logradouro as $item)
                    <option value="{{ $item->id }}">{{ $item->log_nom_logradouro }} -
                        {{ $item->bairro->bai_nom_bairro }}</option>
                @endforeach
            </select>

            <button class="btn btn-dark btn-sm" type="button" onclick="Mudarestado('div_logradouro')">Cadastrar
                Logradouro</button>

            <br><br>

            <input type="submit" class="btn btn-primary btn-lg" value="Próximo">
        </form>

        <hr>

        <div style="display: none" id="div_logradouro">
            <form name="cadastrar_logradouro" action="{{ route('logradouro.storefast') }}" method="post">
                @csrf

                <h3>[ CADASTRAR LOGRADOURO ]</h3>

                {{-- VALIDAÇÃO BACKEND --}}
                @if ($errors->any())
                    <div class="text-center mt-4 mb-4 p-2 alert-danger">
                        @foreach ($errors->all() as $erro)
                            {{ $erro }}<br>
                        @endforeach
                    </div>
                @endif

                <input type="hidden" name="end_id_emp" id="end_id_emp" value="{{ $end_id_emp }}">

                <label for="log_nom_logradouro">Logradouro: *</label>
                <input type="text" name="log_nom_logradouro" id="log_nom_logradouro" class="form-control" required
                    autofocus="" value="{{ old('log_nom_logradouro') }}" onkeydown="upperCaseF(this)">
                <br>

                <label for="log_num_cep">Cep: *</label>
                <input type="text" name="log_num_cep" id="log_num_cep" class="form-control" required autofocus=""
                    value="{{ old('log_num_cep') }}" onkeypress="$(this).mask('00.000-000');">
                <br>

                <label for="log_id_bai">Bairro: *</label><br>
                <select class="form-control" name="log_id_bai" id="log_id_bai2">
                    <option value="{{ $bairro->id }}">{{ $bairro->bai_nom_bairro }}</option>
                </select>

                <br><br>

                <input type="submit" class="btn btn-primary" value="Cadastrar Logradouro">
            </form>
        </div>
    </div>

    <script src="{{ asset('assets/js/scripts.js') }}"></script>
@endsection
