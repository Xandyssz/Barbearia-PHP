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

$id = $_GET['codigo_usuario'];

if ($id > 0) {
    $query = "SELECT * FROM sysb.usuarios WHERE codigo_usuario = $id";
    $dados = mysqli_query($conn, $query);
    $linhaUnica = mysqli_fetch_assoc($dados);
} else {
    echo "<script>OpcaoMensagens(5);</script>";
    echo '<meta HTTP-EQUIV="Refresh" CONTENT="0; URL=PainelAdminListarUsuario.php">';
}
?>


<!DOCTYPE html>
<html lang="en">
<script src="js/funcoes.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>

<!--Header-->
<title>SYSB - Editar Usuario</title>

<?php include('includes/header.php'); ?>
<!--End Header-->

<body onload="visibilidade()">
<div class="be-wrapper be-fixed-sidebar">
    <!--Navigation bar-->
    <?php include("IncludeHeaderADM.php"); ?>
    <!--Navigation-->

    <div class="main-content container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card card-border-color card-border-color-primary">
                    <div class="card-header card-header-divider">Adicionar Detalhes Atualizado do Usuário<span
                                class="card-subtitle">Por favor, atualize os dados necessários.</span></div>
                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data"> <!-- PARA LISTAR NO BANCO DE DADOS NO [ACTION - PRECISA SER # se não não grava no BANCO -->
                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right" for="nomeUsuario">Digite
                                    o Nome do Usuário</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <input class="form-control" id="nomeUsuario" name="nomeUsuario"
                                           value="<?php echo $linhaUnica['nome']; ?>" type="text"
                                           required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right" for="cpfUsuario">Digite
                                    o CPF</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <input class="form-control" id="cpfUsuario" name="cpfUsuario"
                                           value="<?php echo $linhaUnica['cpf']; ?>" type="text"
                                           required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right" for="emailUsuario">Digite
                                    o Email</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <input class="form-control" id="emailUsuario" name="emailUsuario"
                                           value="<?php echo $linhaUnica['email']; ?>"
                                           type="email" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right" for="senhaUsuario">Digite
                                    a Senha</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <input class="form-control" id="senhaUsuario" name="senhaUsuario"
                                           value="<?php echo $linhaUnica['senha']; ?>"
                                           type="password" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right"
                                       for="celularUsuario">Digite o Telefone</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <input class="form-control" id="celularUsuario" name="celularUsuario"
                                           value="<?php echo $linhaUnica['celular']; ?>"
                                           type="text" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right"
                                       for="enderecoUsuario">Digite o Endereço</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <input class="form-control" id="enderecoUsuario" name="enderecoUsuario"
                                           value="<?php echo $linhaUnica['endereco']; ?>"
                                           type="text" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-12 col-sm-3 col-form-label text-sm-right" for="tipo_acesso">Nivel de
                                    Acesso</label>
                                <div class="col-12 col-sm-8 col-lg-6">
                                    <select class="form-control" id="tipo_acesso" name="tipo_acesso"
                                            onchange="visibilidade()" <?php echo $linhaUnica['tipo_acesso']; ?>
                                            required>

                                        <?php
                                        if ($linhaUnica['tipo_acesso'] == "Usuario") {
                                            ?>
                                            <option value="Usuario" selected>Usuario</option>
                                            <option value="Profissional">Profissional</option>
                                            <option value="Administrador">Administrador</option>
                                            <?php
                                        } elseif ($linhaUnica['tipo_acesso'] == "Profissional") {
                                            ?>
                                            <option value="Usuario">Usuario</option>
                                            <option value="Profissional" selected>Profissional</option>
                                            <option value="Administrador">Administrador</option>
                                            <?php
                                        } elseif ($linhaUnica['tipo_acesso'] == "Administrador") {
                                            ?>
                                            <option value="Usuario">Usuario</option>
                                            <option value="Profissional">Profissional</option>
                                            <option value="Administrador" selected>Administrador</option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div id="imageElements" style="display: none;">
                                <div class="form-group row">
                                    <label class="col-12 col-sm-3 col-form-label text-sm-right"
                                           for="descricao">Digite a Descrição do Profissional: </label>
                                    <div class="col-12 col-sm-8 col-lg-6">
                                        <input class="form-control" id="descricao" name="descricao" value="<?php echo $linhaUnica['descricao']; ?>" type="text" required>
                                    </div>
                                </div>
                            </div>

                            <!-- Image-related elements (initially hidden) -->
                            <div id="imageElements2" style="display: none;">
                                <div class="form-group row">
                                    <label class="col-12 col-sm-3 col-form-label text-sm-right" for="arquivo" class="form-label">Imagem:</label>
                                    <div class="col-12 col-sm-8 col-lg-6">
                                        <input type="file" class="form-control" name="arquivo"
                                               onchange="previewImagem();">
                                    </div>
                                </div>

                                <div class="form-group col-sm-12" style="text-align:center;">
                                    <br>
                                    <?php
                                    if ($linhaUnica['img_user'] == "") {
                                        $imagemVelha = "";
                                        ?>
                                        <img src="images/userpadrao.png" name="visualizar" id="visualizar" width="200px"
                                             height="200px">
                                        <?php
                                    } else {
                                        $imagemVelha = $linhaUnica['img_user'];
                                        ?>
                                        <img src="images/<?php echo $linhaUnica['img_user']; ?>" name="visualizar"
                                             id="visualizar" width="200px" height="200px">
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>


                            <div class="col-sm-6">
                                <p class="text-right">
                                    <input type="submit" id="Atualizar" name="Atualizar"
                                           class="btn btn-primary pull-right" value="Atualizar">
                                    <input type="button" name="cancelar" id="cancelar" class="btn btn-danger"
                                           onclick="location.href='PainelAdminAcoesUsuarios.php'" value="Voltar">
                                </p>
                            </div>
                        </form>

                        <!-- VISUALIZAR IMAGEM -->
                        <script>
                            function previewImagem() {
                                var imagem = document.querySelector('input[name=arquivo]').files[0];
                                var preview = document.querySelector('img[name=visualizar]');
                                var reader = new FileReader();

                                reader.onloadend = function () {
                                    preview.src = reader.result;
                                }

                                if (imagem) {
                                    reader.readAsDataURL(imagem);
                                } else {
                                    preview.src = "";
                                }
                            }

                            function visibilidade() {
                                var tipoAcesso = document.getElementById('tipo_acesso').value;
                                var imageElements = document.getElementById('imageElements');
                                var imageElements2 = document.getElementById('imageElements2');

                                if (tipoAcesso === "Profissional") {
                                    imageElements.style.display = 'block';
                                    imageElements2.style.display = 'block';
                                } else {
                                    imageElements.style.display = 'none';
                                    imageElements2.style.display = 'none';
                                }
                            }
                        </script>
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
    $("#celularUsuario").mask("(99) 99999-9999");
    $("#cpfUsuario").mask("999.999.999-99");
</script>


</div>


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

<?php
if (isset($_POST['Atualizar'])) {
    $novoNome = $imagemVelha;
    /* EXCLUIR A IMAGEM ANTIGA */
    if (isset($_FILES['arquivo'])) {
        if (isset($_POST['imagemVelha'])) {
            echo unlink("images/" . $imagemVelha);//APAGA A IMAGEM NO DIRETÓRIO
        }

        if (isset($_FILES['arquivo']['name']) && $_FILES['arquivo']['error'] == 0) {
            $arquivo_tmp = $_FILES['arquivo']['tmp_name'];
            $nome = $_FILES['arquivo']['name'];//images.png
            $extensao = strrchr($nome, '.');//png
            $extensao = strtolower($extensao);
            if (strstr('.svg;.pdf;.png;.jpg;.jpeg;.gif', $extensao)) {
                $novoNome = md5(microtime()) . '.' . $extensao;
                $destino = 'images/' . $novoNome;
                if (@move_uploaded_file($arquivo_tmp, $destino)) {
                    //echo "Arquivo salvo com sucesso";
                } else {
                    echo "Erro ao salvar o arquivo";
                }
            } else {
                echo "Formato de arquivo invalido!";
            }
        }
    }

    $nome = $_POST['nomeUsuario'];
    $cpf = $_POST['cpfUsuario'];
    $email = $_POST['emailUsuario'];
    $senha = $_POST['senhaUsuario'];
    $senhaCript = password_hash($senha, PASSWORD_DEFAULT);
    $celular = $_POST['celularUsuario'];
    $endereco = $_POST['enderecoUsuario'];
    $tipo_acesso = $_POST['tipo_acesso'];
    $descricao = $_POST['descricao'];
    $img_user = $novoNome;

    $result = "update sysb.usuarios 
set nome = '$nome', 
    cpf='$cpf', 
    email='$email',
    senha='$senhaCript', 
    celular='$celular', 
    endereco='$endereco',
    tipo_acesso='$tipo_acesso',
    descricao='$descricao',
    img_user = '$img_user'
    where codigo_usuario = $id";
    $row = mysqli_query($conn, $result);

    echo "<script>OpcaoMensagens(2);</script>";
    echo '<meta HTTP-EQUIV="Refresh" CONTENT="2; URL=PainelAdminAcoesUsuarios.php">';

}
?>


</html>