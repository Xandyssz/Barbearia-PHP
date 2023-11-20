<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container-fluid"
         style="margin-top: 10px; margin-bottom: 10px; display: flex; justify-content: space-between; align-items: center;">
        <h1 class="h2 navbar-brand" href="./index.html" style="color: rgb(255, 208, 0); padding-left: 10px;">
            System Barber
        </h1>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <?php
            if ($_SESSION["tipo_acesso"] == "Usuario"){

            ?>

            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a style="padding-left: 100px;" class="nav-link" href="sysb_home.php#servicos" role="button"
                       aria-expanded="false">
                        Serviços
                    </a>
                </li>
                <li class="nav-item">
                    <a style="padding-left: 50px;" class="nav-link" href="sysb_home.php#profissionais" role="button"
                       aria-expanded="false">
                        Profissionais
                    </a>
                </li>
                <li class="nav-item">
                    <a style="padding-left: 50px;" class="nav-link" href="sysb_home.php#galeria" role="button"
                       aria-expanded="false">
                        Galeria
                    </a>
                </li>
                <li class="nav-item">
                    <a style="padding-left: 50px;" class="nav-link" href="sysb_contato.php" role="button"
                       aria-expanded="false">
                        Contato
                    </a>
                </li>

                <li class="nav-item">
                    <a style="padding-left: 50px;" class="nav-link" href="sysb_agendar.php" role="button"
                       aria-expanded="false">
                        Agendar
                    </a>
                </li>

                <li class="nav-item">
                    <a style="padding-left: 650px;" class="nav-link"
                       aria-expanded="false">
                    </a>
                </li>

                <?php
                } elseif ($_SESSION["tipo_acesso"] == "Profissional") {
                    ?>

                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a style="padding-left: 100px;" class="nav-link" href="sysb_home.php#servicos" role="button"
                               aria-expanded="false">
                                Serviços
                            </a>
                        </li>
                        <li class="nav-item">
                            <a style="padding-left: 50px;" class="nav-link" href="sysb_home.php#profissionais"
                               role="button"
                               aria-expanded="false">
                                Profissionais
                            </a>
                        </li>
                        <li class="nav-item">
                            <a style="padding-left: 50px;" class="nav-link" href="sysb_home.php#galeria" role="button"
                               aria-expanded="false">
                                Galeria
                            </a>
                        </li>
                        <li class="nav-item">
                            <a style="padding-left: 50px;" class="nav-link" href="sysb_contato.php" role="button"
                               aria-expanded="false">
                                Contato
                            </a>
                        </li>
                        <li class="nav-item">
                            <a style="padding-left: 50px;" class="nav-link" href="sysb_agendar.php" role="button"
                               aria-expanded="false">
                                Agendar
                            </a>
                        </li>

                        <li class="nav-item">
                            <a style="padding-left: 20px;" class="nav-link"
                               aria-expanded="false">
                            </a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                               aria-expanded="false">
                                ADM
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="PainelAdminCadastrarBarbeiro.php">Barbeiro</a></li>
                                <li><a class="dropdown-item" href="PainelAdminCadastrarCliente.php">Usuario</a></li>
                                <li><a class="dropdown-item" href="PainelAdminCadastrarServico.php">Servico</a></li>
                                <li><a class="dropdown-item" href="PainelAdminListarBarbeiro.php">Listar Barbeiro</a>
                                </li>
                                <li><a class="dropdown-item" href="PainelAdminListarCliente.php">Listar Cliente</a></li>
                                <li><a class="dropdown-item" href="PainelAdminListarServico.php">Listar Servico</a></li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a style="padding-left: 20px;" class="nav-link"
                               aria-expanded="false">
                                <?php echo "Acesso: " . $_SESSION['tipo_acesso']; ?>
                            </a>
                        </li>

                    </ul>

                    <?php
                }
                ?>

                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="sair.php" role="button" aria-expanded="false">
                            Sair
                        </a>
                    </li>
                </ul>
        </div>
    </div>
</nav>