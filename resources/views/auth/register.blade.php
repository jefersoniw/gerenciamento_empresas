@extends('templates.templateLogin')

@section('title', 'Cadastro')

@section('content')
    <form class="logreg-forms" name="cadastrar_usuario" method="post" action="{{ url('/register') }}">
        @csrf

        <div class="col-4 m-auto container-fluid">

            {{-- VALIDAÇÃO BACKEND --}}
            @if ($errors->any())
                <div class="text-center mt-4 mb-4 p-2 alert-danger">
                    @foreach ($errors->all() as $erro)
                        {{ $erro }}<br>
                    @endforeach
                </div>
            @endif

            <h1 class="h3 mb-3 font-weight-normal" style="text-align: center">[ Cadastrar Usuário ]</h1>
            <hr>
            <input type="text" name="name" id="name" class="form-control" placeholder="Digite seu nome" required
                autofocus="" onkeydown="upperCaseF(this)" value="{{ old('name') }}">
            <br>
            <input type="email" name="email" id="email" class="form-control" placeholder="Digite seu Email" required
                autofocus="" value="{{ old('email') }}">
            <br>
            <input type="password" name="password" id="password" class="form-control"
                placeholder="Senha (Mínimo 8 Caracteres)" required>
            <img id="showPassword" src="{{ asset('assets/image/eye-icon.png') }}" alt="" width=40 height=25>
            <br>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control"
                placeholder="Repetir Senha (Mínimo 8 Caracteres)" required>
            <img id="showPassword2" src="{{ asset('assets/image/eye-icon.png') }}" alt="" width=40 height=25>

            <br><br>
            <button class="btn btn-success btn-lg" type="submit"><i class="fas fa-sign-in-alt"></i>Cadastrar</button>
            <br><br>
            <a href="{{ route('login') }}" id="forgot_pswd">
                <button type="button" class="btn btn-warning btn-sm">Voltar para Login</button>
            </a>


            <hr>


        </div>
    </form>

    <script src="{{ asset('assets/js/scripts.js') }}"></script>
@endsection
