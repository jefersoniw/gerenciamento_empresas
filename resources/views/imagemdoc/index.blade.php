@extends('templates.template')

@section('title', 'Imagens')

@section('content')
    Onde Estou: <a href="{{ route('empresas.index') }}">Empresa </a> > Visualizar Empresa > Documentos da Empresa >
    <b>Imagens do Documento</b>

    <h1 class="text-center">[ IMAGENS DO DOCUMENTO ]</h1>
    <div class="text-center mt-3 mb-4">
        <a href="{{ route('imagemdocumento.create', $imd_id_doc) }}">
            <button class="btn btn-success">Anexar Imagem</button>
        </a>
        <a href="{{ route('documentos.index', $documento->doc_id_emp) }}">
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

            @if (count($imagemdocumento) == 0)
                <div class="text-center">[ NENHUMA IMAGEM CADASTRADA ]</div>
            @endif

            @foreach ($imagemdocumento as $item)
                <tbody>
                    <tr>
                        <td><b>Nome Imagem:</b> {{ $item->imd_nom_arquivo }}</td>
                    </tr>
                    <tr>
                        <td><b>Imagem:</b> <img src="{{ url("storage/{$item->imd_arquivo}") }}" width=500 height=250>
                        </td>
                    </tr>
                    <tr>
                        <td><b>Ações:
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="{{ route('imagemdocumento.delete', ['id' => $item->id, 'imd_id_doc' => $imd_id_doc]) }}"
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

        {{ $imagemdocumento->links() }}

    </div>


    <script src="{{ asset('assets/js/scripts.js') }}"></script>
@endsection
