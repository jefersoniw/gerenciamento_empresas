@extends('templates.template')

@section('title', 'Editar Bairro')

@section('content')
    Onde Estou: Bairros > <b>Editar Bairro</b>

    <div class="text-center mt-3 mb-4">
        <h3>[ EDITAR BAIRRO ]</h3>


        <a href="{{ route('bairros.index') }}">
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

        <form name="editar_bairro" action="{{ route('bairros.update', $bairro->id) }}" method="post">
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

            <label for="bai_nom_bairro">Bairro: *</label>
            <input type="text" name="bai_nom_bairro" id="bai_nom_bairro" class="form-control" required autofocus=""
                value="{{ $bairro->bai_nom_bairro }}" onkeydown="upperCaseF(this)">
            <br>

            <input type="submit" class="btn btn-primary" value="Alterar Bairro">
        </form>

    </div>

    <script src="{{ asset('assets/js/scripts.js') }}"></script>
@endsection
