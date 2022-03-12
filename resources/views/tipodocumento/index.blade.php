@extends('templates.template')

@section('title', 'Tipo de Documento')

@section('content')
    Onde Estou: <b>Tipos de Documentos</b>

    <h1 class="text-center">[ TIPOS DE DOCUMENTOS ]</h1>
    <div class="text-center mt-3 mb-4">
        <a href="{{ route('tiposdocumentos.create') }}">
            <button class="btn btn-success">Cadastrar Tipo de Documento</button>
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
            <thead>
                <tr>

                    <th scope="col">#</th>
                    <th scope="col">Tipo de Documento</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tiposdocumentos as $item)
                    <tr>
                        <td>
                            <li></li>
                        </td>
                        <td>{{ $item->tdo_nom_tipo_documento }}</td>
                        <td>
                            <a href="{{ route('tiposdocumentos.edit', $item->id) }}">
                                <button class="btn btn-primary btn-sm">Editar</button>
                            </a>
                            <a href="{{ route('tiposdocumentos.delete', $item->id) }}"
                                onClick="return confirm('CONFIRMAR EXCLUIR?')">
                                <button class="btn btn-danger btn-sm">Excluir</button>
                            </a>
                        </td>
                    </tr>
                @endforeach
                {{-- foreach --}}
            </tbody>
        </table>
        <br>
        {{ $tiposdocumentos->links() }}
    </div>


    <script src="{{ asset('assets/js/scripts.js') }}"></script>
@endsection
