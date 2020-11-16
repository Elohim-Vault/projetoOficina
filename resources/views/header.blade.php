<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/estilo.css') }}">

    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js" integrity="sha384-qlmct0AOBiA2VPZkMY3+2WqkHtIQ9lSdAsAn5RUJD/3vA5MKDgSGcdmIv4ycVxyn" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

{{--    Font awesome --}}
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    <title>Oficina Enildo</title>
</head>
<body>
<div class="wrapper">
    <!-- Sidebar -->
    <nav id="sidebar">
        <div class="sidebar-header">
            <h3>Oficina do Enildo</h3>
        </div>

        <ul class="list-unstyled components">
            <li class="active">
                <span class="linksComIcon">
                    <a href="{{ url("/") }}"><i class="fas fa-home"></i> Inicio</a>
                </span>
            </li>
            <li>
                <a href="#servicosSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-wrench"></i> Serviços</a>
                <ul class="collapse list-unstyled" id="servicosSubmenu">
                    <li>
                        <a href="{{ route("servicos.index") }}">Listar</a>
                    </li>
                    <li>
                        <a href="{{ route("servicos.cadastro") }}">Cadastrar</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#clientesSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-user-friends"></i> Clientes</a>
                <ul class="collapse list-unstyled" id="clientesSubmenu">
                    <li>
                        <a href="{{ route("clientes.index") }}">Listar</a>
                    </li>
                    <li>
                        <a href="{{ route('clientes.cadastroFisico') }}">Cadastrar cliente fisico</a>
                    </li>
                    <li>
                        <a href="{{ route('clientes.cadastroJuridico') }}">Cadastrar cliente juridico</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#funcionariosSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-address-book"></i> Funcionários</a>
                <ul class="collapse list-unstyled" id="funcionariosSubmenu">
                    <li>
                        <a href="{{ route("funcionarios.index") }}">Listar</a>
                    </li>
                    <li>
                        <a href="{{ route('funcionarios.cadastro') }}">Cadastrar</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#produtosSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-box"></i> Estoque</a>
                <ul class="collapse list-unstyled" id="produtosSubmenu">
                    <li>
                        <a href="{{ route("produtos.index") }}">Listar</a>
                    </li>

                    <li>
                        <a href="{{ route("produtos.cadastro") }}">Cadastrar</a>
                    </li>
                </ul>
            </li>
        </ul>

    </nav>
    <!-- Page Content -->
    <div id="content">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">

                <button type="button" id="sidebarCollapse" class="btn btn-info">
                    <i class="fas fa-align-left"></i>
                    <span>Toggle Sidebar</span>
                </button>
            </div>
        </nav>
    </div>
</div>
    <div class="container">
        @yield('conteudo')
    </div>
</body>
</html>
