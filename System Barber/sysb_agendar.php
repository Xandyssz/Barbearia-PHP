<?php
session_start();
include_once('sessao.php');

if(!isset($_SESSION["tipo_acesso"]))
{
// Usuário não logado! Redireciona para a página de login
    header("location: sysb_index.php");
}else if($_SESSION['tipo_acesso'] != "Profissional" && $_SESSION['tipo_acesso'] != "Administrador" &&$_SESSION['tipo_acesso'] != "Usuario")
{
    header("location: sysb_home.php");
}
?>


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <title>System Barber</title>


    <link rel="stylesheet" href="css/estilos.css">
    <script src="js/funcoes.js"></script>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>


</head>

<body class="bg-dark">


<section id="home" class="custom-section-2">
    <?php

    if (isset($_SESSION['cpf'])) {

        $exibirTipodeAcesso = $_SESSION['tipo_acesso'];
        include_once('IncludeHeaderADM.php');

    } else {
        include_once('IncludeHeader.php');
    }
    ?>

    <p></p>
    <h3 class="mb-4" style="color: rgb(255, 208, 0);">Aqui você pode verificar as opcões de serviços, barbeiros e realizar seu agendamento</h3>


    <div class="row justify-content-center">
        <div class="col-md-12 heading-section text-center" style="color: rgb(255,255,255);">
            <span class="subheading">Conheça nossos serviços</span>
            <h2 class="mb-4">Serviços</h2>
        </div>

        <div class="row justify-content-center">
            <?php
            include 'conexao.php';
            $query = "SELECT * FROM sysb.servico order by codigo_servico DESC";
            $resultado = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_assoc($resultado)) {
                ?>
                <div class="card mb-4"
                     style="width: 18rem; border-color: rgb(255, 208, 0); background-color: transparent; margin: 10px;">
                    <div class="card-body" style="color: rgb(255,255,255);">
                        <h5 class="card-title"><?php echo $row['nome']; ?></h5>
                        <h6 class="card-subtitle mb-2"><?php echo $row['descricao']; ?></h6>
                        <p class="card-text"><?php echo $row['valor']; ?></p>
                        <button class="btn-outline-success"><a href="sysb_agendar.php"
                                                               style="color: white; text-decoration: none;">Ir para o
                                agendamento</a></button>

                    </div>
                </div>
                <?php
            }
            ?>
        </div>

    <hr style="color: lightgrey;">
    <div class="row justify-content-center">
        <div class="col-md-12 heading-section text-center" style="color: rgb(255,255,255);">
            <span class="subheading" id="profissionais">Conheça nossa equipe</span>
            <h2 class="mb-4">Profissionais</h2>
            <p>AVH: Avaliação de Habilidade</p>
        </div>

        <?php
        include 'conexao.php';
        $query = "SELECT * FROM sysb.usuarios WHERE tipo_acesso = 'Profissional' order by codigo_usuario DESC";
        $resultado = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_assoc($resultado)) {
            ?>
            <div class="card bg-dark"
                 style="width: 18rem; color: rgb(255,255,255); border-color: rgb(255, 208, 0); margin: 10px;">
                <img src="images/<?php echo $row['img_user'] ?>" class="card-img-top mt-3" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $row['nome'] ?></h5>
                    <p class="card-text"><?php echo $row['descricao'] ?></p>
                    <p><?php echo $row['nivel_avaliacao'] ?></p>
                </div>
            </div>
            <?php
        }
        ?>
    </div>

    <p></p>

    <hr style="color: lightgrey;">

    <div class="container ftco-relative" id="agendar">
        <div class="row justify-content-center pb-3">
            <div class="col-md-10 heading-section text-center mt-5" style="color: rgb(255, 208, 0);">
                <span class="subheading">Reserva</span>
                <h2 class="mb-4">Faça um agendamento</h2>
                <p></p>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-10 ftco-animate">
                <form method="POST">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group mb-1 mt-1">
                                <input type="text" class="form-control" name="nome" id="nome" value="<?php echo $_SESSION["nome"];?>" placeholder="Nome"
                                       style="border-color: rgb(255, 208, 0);" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group mb-1 mt-1">
                                <input type="email" class="form-control" name="email" id="email" value="<?php echo $_SESSION["email"];?>" placeholder="Email" style="border-color: rgb(255, 208, 0);" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group mb-1 mt-1">
                                <input type="date" class="form-control data" name="data" id="data" placeholder="Data" style="border-color: rgb(255, 208, 0);" required>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                            <select name="horario" id="horario" class="form-control mb-1 mt-1" style="border-color: rgb(255, 208, 0);" required>
                                <option value="" selected>Selecione o Horario do Corte...</option>
                                <option value="07:00">07:00</option>
                                <option value="07:15">07:15</option>
                                <option value="07:30">07:30</option>
                                <option value="07:45">07:45</option>
                                <option value="08:00">08:00</option>
                                <option value="08:15">08:15</option>
                                <option value="08:30">08:30</option>
                                <option value="08:45">08:45</option>
                                <option value="09:00">09:00</option>
                                <option value="09:15">09:15</option>
                                <option value="09:30">09:30</option>
                                <option value="09:45">09:45</option>
                                <option value="10:00">10:00</option>
                                <option value="10:15">10:15</option>
                                <option value="10:30">10:30</option>
                                <option value="10:45">10:45</option>
                                <option value="11:00">11:00</option>
                                <option value="11:15">11:15</option>
                                <option value="11:30">11:30</option>
                                <option value="11:45">11:45</option>
                                <option value="11:45">14:00</option>
                                <option value="14:15">14:15</option>
                                <option value="14:30">14:30</option>
                                <option value="14:45">14:45</option>
                                <option value="15:00">15:00</option>
                                <option value="15:15">15:15</option>
                                <option value="15:30">15:30</option>
                                <option value="15:45">15:45</option>
                                <option value="16:00">16:00</option>
                                <option value="16:15">16:15</option>
                                <option value="16:30">16:30</option>
                                <option value="16:45">16:45</option>
                                <option value="17:00">17:00</option>
                                <option value="17:15">17:15</option>
                                <option value="17:30">17:30</option>
                                <option value="17:45">17:45</option>
                            </select>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="select-wrap">

                                    <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                    <select name="servico" id="servico" class="form-control mb-1 mt-1" style="border-color: rgb(255, 208, 0);" required>
                                        <option value="" selected disabled>Selecione o Serviço...</option>
                                        <?php
                                        $query = "SELECT * FROM sysb.servico ORDER BY codigo_servico";
                                        $resultado = mysqli_query($conn, $query);
                                        while ($linha = mysqli_fetch_assoc($resultado)) { ?>
                                            <option value="<?php echo $linha['codigo_servico']; ?>"><?php echo $linha['nome'];?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group mb-1 mt-1">
                                <div class="select-wrap">

                                    <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                    <select name="profissional" id="profissional" class="form-control mb-1 mt-1"
                                            style="border-color: rgb(255, 208, 0);" required>
                                        <option value="" select disabled>Selecione o Profissional...</option>
                                        <?php
                                        $query = "SELECT * FROM sysb.usuarios WHERE tipo_acesso = 'Profissional' ORDER BY codigo_usuario";
                                        $resultado = mysqli_query($conn, $query);
                                        while ($linha = mysqli_fetch_assoc($resultado)) { ?>
                                            <option value="<?php echo $linha['codigo_usuario']; ?>"><?php echo $linha['nome'];?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group mb-1 mt-1">
                                <input type="text" class="form-control" name="celular" id="celular" value="<?php echo $_SESSION["celular"];?>" placeholder="phone" style="border-color: rgb(255, 208, 0);" required>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group mb-1 mt-1">
                                <input type="text" class="form-control" name="comentario" id="comentario" placeholder="Comentário"
                                       style="border-color: rgb(255, 208, 0);">
                            </div>
                        </div>

                    </div>

                    <div class="form-group mb-4 mt-4" align="center">
                        <input type="submit" id="Finalizar" name="Finalizar" value="Finalizar" class="btn btn-primary"style="border-color: rgb(255, 208, 0); color: rgb(255, 208, 0); background-color: transparent;">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <p></p>
    <hr style="color: lightgrey;">
    <?php include_once('IncludeFooter.php'); ?>
</section>



<div id="msgErro" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger text-center">
                <h5 class="modal-title" id="visulUsuarioModalLabel">Informação!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Ocorreu um erro. Já Existe um Agendamento nesse Dia/Horário!
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-info" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>

<!--------------------------------------------------------------------------------->
<!-- FORMATAR (TELEFONE FIXO, TELEFONE CELULAR, CEP, CNPJ, CPF E DATA) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
<script>
    $("#celular").mask("(99)99999-9999");
</script>
<!--------------------------------------------------------------------------------->
<!-- FORMATAR - IMPOSSIBILITAR O USUARIO DE SELECIONAR DATA ANTIGA (DATA) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
    $(function(){
        var dtToday = new Date();

        var month = dtToday.getMonth() + 1;
        var day = dtToday.getDate();
        var year = dtToday.getFullYear();
        if(month < 10)
            month = '0' + month.toString();
        if(day < 10)
            day = '0' + day.toString();
        var maxDate = year + '-' + month + '-' + day;

        $('#data').attr('min', maxDate);

    });
</script>

</body>
</html>


<?php
if (isset($_POST['Finalizar'])) {
    $codigo_usuario = $_SESSION['codigo_usuario'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $dia = $_POST['data'];
    $hora = $_POST['horario'];
    $servico = $_POST['servico'];
    $profissional = $_POST['profissional'];
    $celular = $_POST['celular'];
    $comentario = $_POST['comentario'];

    // Adicione para trazer o código do serviço
    $queryServico = "SELECT codigo_servico FROM sysb.servico WHERE codigo_servico = '$servico'";
    $resultServico = mysqli_query($conn, $queryServico);
    $rowServico = mysqli_fetch_assoc($resultServico);
    $codigo_servico = $rowServico['codigo_servico'];

    $query = "SELECT * FROM sysb.agenda agen 
              WHERE agen.dia = '$dia' AND agen.hora = '$hora';";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        echo "<script>OpcaoMensagens(6);</script>";
        echo '<meta HTTP-EQUIV="Refresh" CONTENT="2; URL=sysb_home.php">';
    } else {
        $queryInsert = "INSERT INTO sysb.agenda (codigo_usuario,  codigo_servico,nome, email, dia, hora, servico, profissional, celular, comentario)
                   VALUES ('$codigo_usuario', '$codigo_servico', '$nome', '$email', '$dia', '$hora', '$servico', '$profissional', '$celular', '$comentario')";
        echo "<script>OpcaoMensagens(1);</script>";

        mysqli_query($conn, $queryInsert);
    }
}
?>