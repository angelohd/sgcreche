<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>sgcreche | Login</title>

    <link href="{{ url('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css')}}" rel="stylesheet">

    <link href="{{ url('css/animate.css')}}" rel="stylesheet">
    <link href="{{ url('css/style.css')}}" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>

                <h1 class="logo-name">S</h1>

            </div>
            <h3>Bemvindo</h3>

            <p>Iniciar sessão</p>
            <div class="m-t" role="form">
                <div class="form-group">
                    <input type="email" class="form-control" placeholder="E-Mail" required="" name="email" id="email">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Palavra passe" required="" name="password" id="password">
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b" onclick="iniciar_sessao()">Iniciar sessão</button>

                <a href="#"><small>Recuperar minha palavra passe.</small></a>

            </div>
            <p class="m-t"> <small>Inspinia we app framework base on Bootstrap 3 &copy; 2014</small> </p>
        </div>
    </div>

    <script src="{{ url('js/jquery-3.1.1.min.js')}}"></script>
    <script src="{{ url('js/popper.min.js')}}"></script>
    <script src="{{ url('js/bootstrap.js')}}"></script>
    <script>
        function iniciar_sessao(){
            var email = $("#email").val();
            var password = $("#password").val();
            $.post("{{ route('iniciar_sessao') }}",{'_token': '{{ csrf_token() }}',email:email,password:password},function(dados){
               if(dados == "success"){
                window.location.href="{{route('login')}}";
               }else{
                   alert("Erro ao iniciar sessao")
               }
            })
        }
    </script>

</body>

</html>
