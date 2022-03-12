@extends('templates.template')

@section('title', 'Logradouro')

@section('content')
    Onde Estou: <b>Logradouro</b>

    <h1 class="text-center">[ LOGRADOUROS ]</h1>
    <div class="text-center mt-3 mb-4">
        <a href="{{ route('logradouros.create') }}">
            <button class="btn btn-success">Cadastrar Logradouro</button>
        </a>
    </div>

    <hr>
    <div class="col-10 m-auto">
        <form action="{{ route('logradouro.buscar') }}" method="post">
            @csrf
            <div class="input-group mb-3">
                <input type="text" name="buscar_log" id="buscar_log" class="form-control"
                    placeholder="Pesquisar Logradouro" onkeydown="upperCaseF(this)">
                <button type="submit" class="btn btn-outline-secondary">Buscar</button>

            </div>
        </form>
        <div class="text-center mt-3 mb-4">
            <a href="{{ route('logradouros.index') }}">
                <button class="btn btn-secondary ">Todas os Logradouros</button>
            </a>
        </div>


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
                    <th scope="col">Logradouro</th>
                    <th scope="col">CEP</th>
                    <th scope="col">Bairro</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($logradouros as $item)
                    <tr>
                        <td>
                            <li></li>
                        </td>
                        <td>{{ $item->log_nom_logradouro }}</td>
                        <td>{{ $item->log_num_cep }}</td>
                        <td>{{ $item->bairro->bai_nom_bairro }}</td>
                        <td>
                            <a href="{{ route('logradouros.edit', $item->id) }}">
                                <button class="btn btn-primary btn-sm">Editar</button>
                            </a>
                            <a href="{{ route('logradouro.delete', $item->id) }}"
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
        @if (isset($filters))
            {{ $logradouros->appends($filters)->links() }}
        @else
            {{ $logradouros->links() }}
        @endif
    </div>


    <script src="{{ asset('assets/js/scripts.js') }}"></script>
@endsection
