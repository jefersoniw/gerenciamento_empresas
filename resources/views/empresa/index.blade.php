@extends('templates.template')

@section('title', 'Inicio - Empresas')

@section('content')
    Onde Estou: <a href="{{ route('empresas.index') }}">Empresa </a> >

    <h1 class="text-center">[ EMPRESAS ]</h1>
    <div class="text-center mt-3 mb-4">
        <a href="{{ route('empresas.create') }}">
            <button class="btn btn-success">Cadastrar Empresa</button>
        </a>
    </div>

    <hr>
    <div class="col-10 m-auto">
        <form action="{{ route('empresas.buscar') }}" method="post">
            @csrf
            <div class="input-group mb-3">
                <input type="text" name="buscar_empresa" id="buscar_empresa" class="form-control"
                    placeholder="Pesquisar Empresa" onkeydown="upperCaseF(this)">
                <button type="submit" class="btn btn-outline-secondary">Buscar</button>

            </div>
        </form>
        <div class="text-center mt-3 mb-4">
            <a href="{{ route('empresas.index') }}">
                <button class="btn btn-secondary ">Todas as Empresas</button>
            </a>
            <a href="{{ route('empresas.excluidas') }}">
                <button class="btn btn-danger ">Empresas Excluídas</button>
            </a>
            <a href="{{ route('empresas.especial') }}">
                <button class="btn btn-info ">Empresas Especiais</button>
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

                    <th scope="col">Empresa</th>
                    <th scope="col">Data Inicio Atividade</th>
                    <th scope="col">Data Fim Atividade</th>
                    <th scope="col">Especial</th>
                    <th scope="col">Status</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($empresas as $item)
                    <tr>

                        <td>{{ $item->emp_nom_empresa }}</td>
                        <td>{{ date('d-m-Y', strtotime($item->emp_dti_atividade)) }}</td>
                        <td>
                            @isset($item->emp_dtf_atividade)
                                {{ date('d-m-Y', strtotime($item->emp_dtf_atividade)) }}
                            @endisset
                        </td>
                        <td>
                            @if ($item->emp_especial == 1)
                                <img src="{{ asset('assets/image/favorite.png') }}" alt="Empresa Favorita" width=20
                                    height=10>
                            @endif
                        </td>
                        <td>
                            @if (isset($item->deleted_at))
                                Excluído
                            @else
                                Ativo
                            @endif
                        </td>
                        <td>
                            @if (isset($item->deleted_at))
                                <a href="{{ route('empresas.restore', $item->id) }}">
                                    <button class="btn btn-success btn-sm">Restaurar</button>
                                </a>
                            @else
                                <a href="{{ route('empresas.show', $item->id) }}">
                                    <button class="btn btn-dark btn-sm">Visualizar</button>
                                </a>
                                <a href="{{ route('empresas.delete', $item->id) }}"
                                    onClick="return confirm('CONFIRMAR EXCLUIR?')">
                                    <button class="btn btn-danger btn-sm">Excluir</button>
                                </a>
                                @if ($item->emp_especial == 1)
                                    <a href="{{ route('empresas.removeespecial', $item->id) }}">
                                        <button class="btn btn-danger btn-sm">Remover Especial</button>
                                    </a>
                                @else
                                    <a href="{{ route('empresas.addespecial', $item->id) }}">
                                        <button class="btn btn-primary btn-sm">Empresa Especial</button>
                                    </a>
                                @endif
                            @endif
                        </td>
                    </tr>
                @endforeach
                {{-- foreach --}}
            </tbody>
        </table>
        <br>
        @if (isset($filters))
            {{ $empresas->appends($filters)->links() }}
        @else
            {{ $empresas->links() }}
        @endif
    </div>


    <script src="{{ asset('assets/js/scripts.js') }}"></script>
@endsection
