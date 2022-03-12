@extends('templates.template')

@section('title', 'Bairro')

@section('content')
    Onde Estou: <b>Bairro</b>

    <h1 class="text-center">[ BAIRROS ]</h1>
    <div class="text-center mt-3 mb-4">
        <a href="{{ route('bairros.create') }}">
            <button class="btn btn-success">Cadastrar Bairro</button>
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
                    <th scope="col">Bairro</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bairros as $item)
                    <tr>
                        <td>
                            <li></li>
                        </td>
                        <td>{{ $item->bai_nom_bairro }}</td>
                        <td>
                            <a href="{{ route('bairros.edit', $item->id) }}">
                                <button class="btn btn-primary btn-sm">Editar</button>
                            </a>
                            <a href="{{ route('bairros.delete', $item->id) }}"
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
        {{ $bairros->links() }}
    </div>


    <script src="{{ asset('assets/js/scripts.js') }}"></script>
@endsection
