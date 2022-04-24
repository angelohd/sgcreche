<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>INSPINIA | Empty Page</title>

    <link href="{{ url('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ url('font-awesome/css/font-awesome.css')}}" rel="stylesheet">

    <link href="{{ url('css/animate.css')}}" rel="stylesheet">
    <link href="{{ url('css/style.css')}}" rel="stylesheet">
    @yield('css')

</head>

<body class="">

    <div id="wrapper">

    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element">
                        <img alt="image" class="rounded-circle" src="{{ url('img/profile_small.jpg')}}"/>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="block m-t-xs font-bold">{{ Auth::user()->name }}</span>
                        </a>
                    </div>
                    <div class="logo-element">
                        IN+
                    </div>
                </li>
                <li>
                    <a href="index.html"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboards</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="index.html">Dashboard v.1</a></li>
                    </ul>
                </li>

                <li>
                    <a href="#"><i class="fa fa-edit"></i> <span class="nav-label">Utilitários</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="{{ route('ano_lectivos.index') }}">Ano Lectivo</a></li>
                        <li><a href="form_advanced.html">Advanced Plugins</a></li>
                        <li><a href="form_wizard.html">Wizard</a></li>
                        <li><a href="form_file_upload.html">File Upload</a></li>
                        <li><a href="form_editors.html">Text Editor</a></li>
                        <li><a href="form_autocomplete.html">Autocomplete</a></li>
                        <li><a href="form_markdown.html">Markdown</a></li>
                    </ul>
                </li>
            </ul>

        </div>
    </nav>

        <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
        <nav class="navbar navbar-static-top  " role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
            <form role="search" class="navbar-form-custom" action="search_results.html">
                <div class="form-group">
                    <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">
                </div>
            </form>
        </div>
            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <form method="POST" action="{{ route('terminar_sessao') }}">
                        @csrf
                        <button type="submit"><i class="fa fa-sign-out"></i> Log out</button>
                    </form>
                </li>
            </ul>

        </nav>
        </div>
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-sm-4">
                    <h2><strong>@yield('titulo')</strong></h2>
                </div>
            </div>
            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">
                    @if(session('status')=="success")
                    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                    <script>
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Sucesso.',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    </script>
                    @else
                    <script>
                        Swal.fire({
                            position: 'top-end',
                            icon: 'error',
                            title: 'Erro.',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    </script>

                    @endif
                    @yield('corpo')
                </div>
            </div>

            <div class="footer">
                <div class="float-right">
                    10GB of <strong>250GB</strong> Free.
                </div>
                <div>
                    <strong>Copyright</strong> Example Company &copy; 2014-2018
                </div>
            </div>

        </div>
        </div>


    <!-- Mainly scripts -->
    <script src="{{ url('js/jquery-3.1.1.min.js')}}"></script>
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> --}}
    <script src="{{ url('js/popper.min.js')}}"></script>
    <script src="{{ url('js/bootstrap.js')}}"></script>
    <script src="{{ url('js/plugins/metisMenu/jquery.metisMenu.js')}}"></script>
    <script src="{{ url('js/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>

    <!-- Custom and plugin javascript -->
    <script src="{{ url('js/inspinia.js')}}"></script>
    <script src="{{ url('js/plugins/pace/pace.min.js')}}"></script>
    @yield('js')


</body>

</html>
