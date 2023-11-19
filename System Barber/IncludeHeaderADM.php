<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div style="position: relative;" class="container-fluid" style="margin-top: 10px; margin-bottom: 10px;">
        <h1 class="h2" class="navbar-brand" href="./index.html" style="color: rgb(255, 208, 0);padding-left: 10px;">
            System Barber</h1>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0" class="">
                <a style="padding-left: 100px;" class="nav-link" href="#home" role="button" aria-expanded="false">
                    Menu
                </a>
                <a style="padding-left: 50px;" class="nav-link" href="#servicos" role="button" aria-expanded="false">
                    Serviços
                </a>
                <a style="padding-left: 50px;" class="nav-link" href="#galeria" role="button" aria-expanded="false">
                    Galeria
                </a>
                <a style="padding-left: 50px;" class="nav-link" href="sysb_agendar.php" role="button"
                   aria-expanded="false">
                    Agendar
                </a>
                <a style="padding-left: 50px;" class="nav-link" href="login.php" role="button" aria-expanded="false">
                    Login
                </a>

                <a style="padding-left: 50px;" class="nav-link" href="sysb_sobre.php" role="button"
                   aria-expanded="false">
                    Sobre
                </a>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                       aria-expanded="false">
                        Cadastrar
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="PainelAdminCadastrarBarbeiro.php">Barbeiro</a></li>
                        <li><a class="dropdown-item" href="PainelAdminCadastrarCliente.php">Usuario</a></li>
                        <li><a class="dropdown-item" href="PainelAdminCadastrarServico.php">Servico</a></li>
                        <li><a class="dropdown-item" href="PainelAdminListarBarbeiro.php">Listar Barbeiro</a></li>
                        <li><a class="dropdown-item" href="PainelAdminListarCliente.php">Listar Cliente</a></li>
                        <li><a class="dropdown-item" href="PainelAdminListarServico.php">Listar Servico</a></li>
                    </ul>
                </li>
            </ul>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Pesquisar" aria-label="Search"
                       style="border-color: rgb(255, 208, 0);;">
                <button class="btn btn-outline-success" type="submit"
                        style="color: rgb(255, 208, 0); background-color: transparent; border-color: rgb(255, 208, 0);;">
                    Pesquisar
                </button>
            </form>
        </div>
    </div>
</nav>
<link href="lib/bootstrap-5.3.0/css/bootstrap.min.css" rel="stylesheet">
<link href="layout/personalizado.css" rel="stylesheet">
<body>



