<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>sgcreche</title>

    <link href="{{ url('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ url('font-awesome/css/font-awesome.css') }}" rel="stylesheet">

    <link href="{{ url('css/animate.css') }}" rel="stylesheet">
    <link href="{{ url('css/style.css') }}" rel="stylesheet">

</head>

<body class="gray-bg">


    <div class="middle-box text-center animated fadeInDown">
        <h1>404</h1>
        <h3 class="font-bold">página não encontrada</h3>

        <div class="error-desc">
            Desculpe, a página que você está procurando não foi encontrada. Tente verificar a URL em busca de erros ou
            <a href="{{ route('login') }}" class="text-info"> <strong> click aqui </strong></a> para voltar ao menu principal
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="{{ url('js/jquery-3.1.1.min.js')}}"></script>
    <script src="{{ url('js/popper.min.js')}}"></script>
    <script src="{{ url('js/bootstrap.js')}}"></script>

</body>

</html>
