@extends('templates.template')

@section('title', 'Detalhes da Empresas')

@section('content')
    Onde Estou: <a href="{{ route('empresas.index') }}">Empresa </a> > <b>Visualizar Empresa</b>

    <div class="text-center mt-3 mb-4">
        <h3>[DETALHES DA EMPRESA]</h3>


        <a href="{{ route('empresas.index') }}">
            <button class="btn btn-warning">Voltar</button>
        </a>
        <br><br>
        <a href="{{ route('empresas.edit', $empresa->id) }}">
            <button class="btn btn-primary">Editar Dados da Empresa</button>
        </a>
    </div>
    <hr>

    <div class="col-8 m-auto container-fluid">
        <table class="table table-black table-striped">

            <tbody>
                <tr>
                    <th scope="row">
                        <li></li>
                    </th>
                    <td><b>Nome da Empresa:</b></td>
                    <td>{{ $empresa->emp_nom_empresa }}</td>
                </tr>
                <tr>
                    <th scope="row">
                        <li></li>
                    </th>
                    <td><b>Data Inicio Atividade:</b></td>
                    <td>{{ date('d-m-Y', strtotime($empresa->emp_dti_atividade)) }}</td>
                </tr>
                <tr>
                    <th scope="row">
                        <li></li>
                    </th>
                    <td><b>Data Final Atividade:</b></td>
                    <td>
                        @isset($empresa->emp_dtf_atividade)
                            {{ date('d-m-Y', strtotime($empresa->emp_dtf_atividade)) }}
                        @endisset
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <li></li>
                    </th>
                    <td><b>Empresa Especial:</b></td>
                    <td>
                        @if ($empresa->emp_especial == 1)
                            Empresa Especial <img src="{{ asset('assets/image/favorite.png') }}" width=20 height=10>
                        @else
                            Empresa Não Especial
                        @endif
                    </td>
                </tr>
            </tbody>
        </table>

        <hr>

        <a href="{{ route('documentos.index', $empresa->id) }}">
            <h4>[ VER DOCUMENTOS DA EMPRESA ]</h4>
        </a>


        <hr>

        <a href="{{ route('enderecos.index', $empresa->id) }}">
            <h4>[ VER ENDEREÇOS DA EMPRESA ]</h4>
        </a>

    </div>
@endsection
