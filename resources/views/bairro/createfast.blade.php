@extends('templates.template')

@section('title', 'Cadastrar Bairro')

@section('content')
    Onde Estou: <a href="{{ route('empresas.index') }}">Empresa </a> > Visualizar Empresa > Endereços da Empresa >
    <b>Cadastrar Bairro</b>

    <div class="text-center mt-3 mb-4">
        <h3>[ CADASTRAR ENDEREÇO/BAIRRO ]</h3>


        <a href="{{ route('enderecos.index', $end_id_emp) }}">
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
        <form action="{{ route('logradouro.createfast', $end_id_emp) }}" method="post" name="selecionar_bairro">
            @csrf

            <label for="log_id_bai">Selecione o Bairro: *</label><br>
            <select class="form-control" name="log_id_bai" id="log_id_bai">
                <option value="">Selecione</option>
                @foreach ($bairro as $item)
                    <option value="{{ $item->id }}">{{ $item->bai_nom_bairro }}</option>
                @endforeach
            </select>
            <button class="btn btn-dark btn-sm" type="button" onclick="Mudarestado('div_bairro')">Cadastrar
                Bairro</button>

            <br><br>

            <input type="submit" class="btn btn-primary btn-lg" value="Próximo">
        </form>

        <hr>

        <div style="display: none" id="div_bairro">
            <form name="cadastrar_bairro" action="{{ route('bairros.storefast') }}" method="post">
                @csrf

                <h3>[ CADASTRAR BAIRRO ]</h3>

                {{-- VALIDAÇÃO BACKEND --}}
                @if ($errors->any())
                    <div class="text-center mt-4 mb-4 p-2 alert-danger">
                        @foreach ($errors->all() as $erro)
                            {{ $erro }}<br>
                        @endforeach
                    </div>
                @endif

                <input type="hidden" name="end_id_emp" id="end_id_emp" value="{{ $end_id_emp }}">

                <label for="bai_nom_bairro">Bairro: *</label>
                <input type="text" name="bai_nom_bairro" id="bai_nom_bairro" class="form-control" required autofocus=""
                    value="{{ old('bai_nom_bairro') }}" onkeydown="upperCaseF(this)">
                <br>

                <input type="submit" class="btn btn-primary" value="Cadastrar Bairro">
            </form>
        </div>
    </div>

    <script src="{{ asset('assets/js/scripts.js') }}"></script>
@endsection
