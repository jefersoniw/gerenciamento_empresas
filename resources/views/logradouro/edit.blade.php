@extends('templates.template')

@section('title', 'Editar Logradouro')

@section('content')
    Onde Estou: Logradouro > <b>Editar Logradouro</b>

    <div class="text-center mt-3 mb-4">
        <h3>[ EDITAR LOGRADOURO ]</h3>


        <a href="{{ route('logradouros.index') }}">
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

        <form name="editar_logradouro" action="{{ route('logradouros.update', $logradouro->id) }}" method="post">
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

            <label for="log_nom_logradouro">Logradouro: *</label>
            <input type="text" name="log_nom_logradouro" id="log_nom_logradouro" class="form-control" required autofocus=""
                value="{{ $logradouro->log_nom_logradouro }}" onkeydown="upperCaseF(this)">
            <br>

            <label for="log_num_cep">Cep: *</label>
            <input type="text" name="log_num_cep" id="log_num_cep" class="form-control" required autofocus=""
                value="{{ $logradouro->log_num_cep }}" onkeypress="$(this).mask('00.000-000');">
            <br>

            <label for="log_id_bai">Bairro: *</label><br>
            <select class="form-control" name="log_id_bai" id="log_id_bai">
                <option value="{{ $logradouro->log_id_bai }}">{{ $logradouro->bairro->bai_nom_bairro }}</option>
                @foreach ($bairros as $item)
                    <option value="{{ $item->id }}">{{ $item->bai_nom_bairro }}</option>
                @endforeach
            </select>
            <a href="{{ route('bairros.index') }}" target="_blank">Cadastrar Bairro +</a>

            <br><br>

            <input type="submit" class="btn btn-primary" value="Alterar Logradouro">
        </form>
    </div>

    <script src="{{ asset('assets/js/scripts.js') }}"></script>
    {{-- JQUERY PARA MASCARAS --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
@endsection
