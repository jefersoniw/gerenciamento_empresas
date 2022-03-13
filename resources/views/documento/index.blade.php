@extends('templates.template')

@section('title', 'Documentos')

@section('content')
    Onde Estou: <a href="{{ route('empresas.index') }}">Empresa </a> > Visualizar Empresa > <b>Documentos da Empresa</b>

    <h1 class="text-center">[ DOCUMENTOS DA EMPRESA ]</h1>
    <div class="text-center mt-3 mb-4">
        <a href="{{ route('documentos.create', $doc_id_emp) }}">
            <button class="btn btn-success">Cadastrar Documentos</button>
        </a>
        <a href="{{ route('empresas.show', $doc_id_emp) }}">
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

            @if (count($documentos) == 0)
                <div class="text-center">[ NENHUM DOCUMENTOS CADASTRADO ]</div>
            @endif

            @foreach ($documentos as $item)
                <tbody>
                    <tr>
                        <td><b>Empresa:</b> {{ $item->empresa->emp_nom_empresa }}</td>
                    </tr>
                    <tr>
                        <td><b>Tipo do Documento</b> {{ $item->tipo_documento->tdo_nom_tipo_documento }}</td>
                    </tr>
                    <tr>
                        <td><b>Número do Documento:</b> {{ $item->doc_num_documento }}</td>
                    </tr>
                    <tr>
                        <td><b>Data do Cadastro:</b> {{ date('d-m-Y', strtotime($item->doc_dat_cadastro)) }}</td>
                    </tr>
                    <tr>
                        <td><b>Ações:
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="{{ route('imagemdocumento.index', $item->id) }}">
                                <button class="btn btn-info">Ver Imagens</button>
                            </a>
                            <a href="{{ route('documentos.edit', $item->id) }}">
                                <button class="btn btn-primary">Editar</button>
                            </a>
                            <a href="{{ route('documentos.delete', ['id' => $item->id, 'doc_id_emp' => $doc_id_emp]) }}"
                                onClick="return confirm('CONFIRMAR EXCLUIR?')">
                                <button class="btn btn-danger">Excluir</button>
                            </a>
                        </td>
                    </tr>

                </tbody>
            @endforeach
            {{-- foreach --}}
        </table>
        <br>

        {{ $documentos->links() }}

    </div>


    <script src="{{ asset('assets/js/scripts.js') }}"></script>
@endsection
