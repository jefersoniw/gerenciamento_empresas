@extends('templates.template')

@section('title', 'Inicio - Empresas')

@section('content')
    Onde Estou: <a href="{{ route('empresas.index') }}">Empresa </a> > Detalhes da Empresa > <b>Endereços da Empresa</b>

    <h1 class="text-center">[ ENDEREÇOS DA EMPRESA ]</h1>
    <div class="text-center mt-3 mb-4">
        <a href="{{ route('enderecos.create', $end_id_emp) }}">
            <button class="btn btn-success">Cadastrar Endereço</button>
        </a>
        <a href="{{ route('empresas.show', $end_id_emp) }}">
            <button class="btn btn-warning">Voltar</button>
        </a>
    </div>

    <hr>
    <div class="col-10 m-auto">

        {{-- MENSAGENS DE FEEDBACK --}}
        @if (session('message'))
            <div class="text-center alert alert-warning">
                <p>{{ session('message') }}</p>
            </div>
        @endif

        <table class="table table-black table-striped text-center">

            @foreach ($enderecos as $item)
                <div>
                    <b>Empresa:</b> {{ $item->empresa->emp_nom_empresa }}
                </div>
                <br>

                <div>
                    <b>Números:</b> {{ $item->end_num_numero }}
                </div>
                <br>

                <div>
                    <b>Complemento:</b> {{ $item->end_nom_complemento }}
                </div>
                <br>

                <div>
                    <b>Latitude:</b> {{ $item->end_num_lat }}
                </div>
                <br>

                <div>
                    <b>Longitude:</b> {{ $item->end_num_long }}
                </div>
                <br>

                <div>
                    <b>Logradouro:</b> {{ $item->logradouro->log_nom_logradouro }}
                </div>
                <br>

                <div>
                    <b>Ações:</b>
                </div>
                <br>

                <a href="">
                    <button class="btn btn-primary">Editar</button>
                </a>
                <a href="">
                    <button class="btn btn-danger">Excluir</button>
                </a>
            @endforeach
            {{-- foreach --}}
        </table>
        <br>

        {{ $enderecos->links() }}

    </div>


    <script src="{{ asset('assets/js/scripts.js') }}"></script>
@endsection
