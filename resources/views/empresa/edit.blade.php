@extends('templates.template')

@section('title', 'Editar Empresa')

@section('content')
    Onde Estou: <a href="">Empresa </a> > <a href="">Editar Empresa</a>

    <div class="text-center mt-3 mb-4">
        <h3>[EDITAR EMPRESA]</h3>
    </div>

    <hr>
    <div class="col-4 m-auto container-fluid">

        <form class="logreg-forms" name="editar_empresa" action="{{ route('empresas.update', $empresa->id) }}"
            method="post">
            @csrf
            @method('PUT')

        </form>

    </div>

@endsection
