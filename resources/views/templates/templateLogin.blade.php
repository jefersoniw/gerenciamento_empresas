<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') - {{ config('app.name') }}</title>
    <link rel="stylesheet" href="{{ url('assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="icon" href="{{ asset('assets/image/icon_empresa.png') }}">

    <link href="{{ url('https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css') }}"
        rel="stylesheet" />
    <script src="{{ url('https://code.jquery.com/jquery-3.6.0.min.js') }}"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="{{ url('https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js') }}"></script>

    <script src="{{ asset('assets/bootstrap/js/bootstrap.bundle.min.js') }}"></script>




    <style>
        img {
            max-width: 100%;
            height: auto;
        }

    </style>
    <br>
    <div class="painel" id="painel">
        <center>
            <a href="{{ url('/') }}">
                <img src="{{ asset('assets/image/empresa.png') }}" alt="some text" width=300 height=25>
            </a>
        </center>
    </div><br>
</head>

<body>
    <h2 class="text-center">[ Gerenciamento de Empresas ]</h2>
    <br>

    <nav class="navbar navbar-dark bg-dark">

    </nav>

    <br>



    @yield('content')
</body>

<!-------------------------------------------------- RODAPÉ ---------------------->
<br>
<hr style="height:1px; border:none; color:#000; background-color:#000; margin-top: 0px; margin-bottom: 0px;"><br>

<center>
    <div id="Rodape">
        Copyright &copy; Sistema de Gerenciamento de Empresas <br />
        Salvador - Bahia | CEP: 41xxx-xxx<br />
        Tel.: +55 (71) 9xxxx-xxxx<br />
    </div>
</center><br>
<!-------------------------------------------------- RODAPÉ ---------------------->

</html>
