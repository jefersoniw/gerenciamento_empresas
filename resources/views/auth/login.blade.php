@extends('templates.templateLogin')

@section('title', 'Login')

@section('content')

    <form class="logreg-forms" name="login" method="post" action="{{ route('login') }}">
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

            <h1 class="h3 mb-3 font-weight-normal" style="text-align: center">[ Login ]</h1>
            <hr>
            <input type="email" name="email" id="email" class="form-control" placeholder="Email Cadastrado" required
                autofocus="">
            <input type="password" name="password" id="password" class="form-control" placeholder="Senha" required>

            <img id="showPassword" src="{{ asset('assets/image/eye-icon.png') }}" alt="" width=40 height=25>

            <br><br>
            <button class="btn btn-success btn-lg" type="submit"><i class="fas fa-sign-in-alt"></i>Entrar</button>
            <br><br>
            <a href="{{ route('register') }}" id="forgot_pswd">
                <button type="button" class="btn btn-warning btn-sm">Faça seu cadastro</button>
            </a>


            <hr>


        </div>
    </form>

    <script src="{{ asset('assets/js/scripts.js') }}"></script>

@endsection
