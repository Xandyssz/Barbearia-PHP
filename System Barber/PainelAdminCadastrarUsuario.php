<?php
session_start();
include_once('sessao.php');
include_once('conexao.php');

if (!isset($_SESSION["tipo_acesso"])) {
// Usuário não logado! Redireciona para a página de login
    header("location: sysb_index.php");
} else if ($_SESSION['tipo_acesso'] != "Administrador") {
    header("location: sysb_home.php");
}
?>

    <!DOCTYPE html>
    <html lang="en">
    <!-- ARQUIVOS JAVA SCRIPT -->
    <script src="js/funcoes.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

    <!--Header-->
    <title>SYSB - Cadastrar Usuário</title>
    <?php include('includes/header.php'); ?>
    <!--End Header-->

    <body>
    <div class="be-wrapper be-fixed-sidebar">
        <!--Navigation bar-->
        <?php include("IncludeHeaderADM.php"); ?>
        <!--Navigation-->
            <div class="main-content container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-border-color card-border-color-primary">
                            <div class="card-header card-header-divider">Adicionar Detalhes do Usuário<span
                                        class="card-subtitle">Por favor, preencha os dados necessários.</span></div>
                            <div class="card-body">
                                <form method="POST">

                                    <div class="form-group row">
                                        <label class="col-12 col-sm-3 col-form-label text-sm-right" for="nomeExame">Digite
                                            o Nome do Usuário</label>
                                        <div class="col-12 col-sm-8 col-lg-6">
                                            <input class="form-control" id="nome" name="nome" type="text"
                                                   required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-12 col-sm-3 col-form-label text-sm-right" for="cpf">Digite
                                            o CPF</label>
                                        <div class="col-12 col-sm-8 col-lg-6">
                                            <input class="form-control" id="cpf" name="cpf" type="text"
                                                   required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-12 col-sm-3 col-form-label text-sm-right" for="email">Digite
                                            o Email</label>
                                        <div class="col-12 col-sm-8 col-lg-6">
                                            <input class="form-control" id="email" name="email"
                                                   type="email" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-12 col-sm-3 col-form-label text-sm-right" for="senha">Digite
                                            a Senha</label>
                                        <div class="col-12 col-sm-8 col-lg-6">
                                            <input class="form-control" id="senha" name="senha"
                                                   type="password" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-12 col-sm-3 col-form-label text-sm-right"
                                               for="celular">Digite o Telefone</label>
                                        <div class="col-12 col-sm-8 col-lg-6">
                                            <input class="form-control" id="celular" name="celular"
                                                   type="text" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-12 col-sm-3 col-form-label text-sm-right"
                                               for="endereco">Digite o Endereço</label>
                                        <div class="col-12 col-sm-8 col-lg-6">
                                            <input class="form-control" id="endereco" name="endereco"
                                                   type="text" required>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <p class="text-right">

                                            <input type="submit" id="Registrar" name="Registrar"
                                                   class="btn btn-primary pull-right" value="Registrar">
                                            <br>
                                    </div>
                            </div>
                            <br>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>

    <!-- FORMATAR (TELEFONE FIXO, TELEFONE CELULAR, CEP, CNPJ, CPF E DATA) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script>
        $("#cpf").mask("999.999.999-99");
        $("#celular").mask("(99)99999-9999");

    </script>


    <script src="assets/lib/jquery/jquery.min.js" type="text/javascript"></script>
    <script src="assets/lib/perfect-scrollbar/js/perfect-scrollbar.min.js" type="text/javascript"></script>
    <script src="assets/lib/bootstrap/dist/js/bootstrap.bundle.min.js" type="text/javascript"></script>
    <script src="assets/js/app.js" type="text/javascript"></script>
    <script src="assets/lib/jquery-flot/jquery.flot.js" type="text/javascript"></script>
    <script src="assets/lib/jquery-flot/jquery.flot.pie.js" type="text/javascript"></script>
    <script src="assets/lib/jquery-flot/jquery.flot.time.js" type="text/javascript"></script>
    <script src="assets/lib/jquery-flot/jquery.flot.resize.js" type="text/javascript"></script>
    <script src="assets/lib/jquery-flot/plugins/jquery.flot.orderBars.js" type="text/javascript"></script>
    <script src="assets/lib/jquery-flot/plugins/curvedLines.js" type="text/javascript"></script>
    <script src="assets/lib/jquery-flot/plugins/jquery.flot.tooltip.js" type="text/javascript"></script>
    <script src="assets/lib/jquery.sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
    <script src="assets/lib/countup/countUp.min.js" type="text/javascript"></script>
    <script src="assets/lib/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
    <script src="assets/lib/canvas/canvasjs.min.js"></script>
    <script src="assets/lib/canvas/jquery.canvasjs.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            //-initialize the javascript
            App.init();
            App.dashboard();

        });
    </script>

    </body>

    </html>

<?php

if (isset($_POST['Registrar'])) {
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $senhaCript = password_hash($senha, PASSWORD_DEFAULT);
    $celular = $_POST['celular'];
    $endereco = $_POST['endereco'];

    // VERIFICA SE EXISTE USUARIO COM ESSE CPF
    $query = "SELECT * FROM sysb.usuarios users
    WHERE users.cpf = '$cpf'";

    $row = mysqli_query($conn, $query);

    // SE EXISITIR DA ERRO, SE NÃO CADASTRA.
    if (mysqli_num_rows($row) > 0) {
        echo "<script>$(document).ready(function() { $('#msgconflito').modal(); })</script>";
        echo '<meta HTTP-EQUIV="Refresh" CONTENT="2; URL=PainelAdminCadastrarUsuario.php">';

    } else {
        $result = "INSERT INTO sysb.usuarios (nome, cpf, email, senha, celular, endereco) 
        VALUES ('$nome', '$cpf', '$email', '$senhaCript', '$celular', '$endereco')";
        $row = mysqli_query($conn, $result);
        echo "<script>OpcaoMensagens(1);</script>";
        echo '<meta HTTP-EQUIV="Refresh" CONTENT="2; URL=PainelAdminListarUsuarios.php">';
    }

}
?>