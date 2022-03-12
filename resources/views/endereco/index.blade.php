@extends('templates.template')

@section('title', 'Endereço')

@section('content')
    Onde Estou: <a href="{{ route('empresas.index') }}">Empresa </a> > Visualizar Empresa > <b>Endereços da Empresa</b>

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

        <table class="table table-black table-striped ">

            @if (count($enderecos) == 0)
                <div class="text-center">[ NENHUM ENDEREÇO CADASTRADO ]</div>
            @endif

            @foreach ($enderecos as $item)
                <tbody>
                    <tr>
                        <td><b>Empresa:</b> {{ $item->empresa->emp_nom_empresa }}</td>
                    </tr>
                    <tr>
                        <td><b>Número:</b> {{ $item->end_num_numero }}</td>
                    </tr>
                    <tr>
                        <td><b>Complemento:</b> {{ $item->end_nom_complemento }}</td>
                    </tr>
                    <tr>
                        <td><b>Latitude:</b> {{ $item->end_num_lat }}</td>
                    </tr>
                    <tr>
                        <td><b>Longitude:</b> {{ $item->end_num_long }}</td>
                    </tr>
                    <tr>
                        <td><b>Logradouro:</b> {{ $item->logradouro->log_nom_logradouro }} -
                            {{ $item->logradouro->bairro->bai_nom_bairro }}</td>
                    </tr>
                    <tr>
                        <td><b>Ações:
                        </td>
                    </tr>
                    <tr>
                        <td></b> <a href="{{ route('endereco.edit', $item->id) }}">
                                <button class="btn btn-primary">Editar</button>
                            </a>
                            <a href="{{ route('enderecos.delete', ['id' => $item->id, 'end_id_emp' => $end_id_emp]) }}">
                                <button class="btn btn-danger">Excluir</button>
                            </a>
                        </td>
                    </tr>

                </tbody>
            @endforeach
            {{-- foreach --}}
        </table>
        <br>

        {{ $enderecos->links() }}

    </div>


    <script src="{{ asset('assets/js/scripts.js') }}"></script>
@endsection
