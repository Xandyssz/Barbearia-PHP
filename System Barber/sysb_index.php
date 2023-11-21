<?php
include_once('conexao.php');
$sqlUser = "SELECT COUNT(*) AS qtd FROM sysb.usuarios";
$result = mysqli_query($conn, $sqlUser);
$rowBusca = mysqli_fetch_assoc($result);
$qntBD = $rowBusca['qtd'];
if ($qntBD == 0) {
    $senha = "123";
    $senhaCript = password_hash($senha, PASSWORD_DEFAULT);
    $sqlInsereUser = "INSERT INTO sysb.usuarios (nome, cpf, email, senha, celular, endereco,  tipo_acesso, nivel_avaliacao, descricao)
VALUES ('admin', '000.000.000-00', 'admin', '$senhaCript', '(00)00000-0000', 'primeiro login', 'Administrador', '1', 'Admin')";
    echo "<br>";
    mysqli_query($conn, $sqlInsereUser);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <title>System Barber</title>


    <link rel="stylesheet" href="css/estilos.css">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>


</head>


<body class="bg-dark">

<?php

if (isset($_SESSION['tipo_acesso'])) {

    $exibirTipodeAcesso = $_SESSION['tipo_acesso'];
    include_once('IncludeHeaderADM.php');

} else {
    include_once('IncludeHeader.php');
}
?>
<div class="container-fluid div">
    <div class="col-md-12 py-md-5 pb-5">
        <div class="heading-section mb-4 mt-md-5 text-center">
            <span class="font-monospace subheading" style="color: rgb(255,255,255);">Sobre nós</span>
            <h3 class=" mb-4" style="color: rgb(255,255,255);">Bem-vindo ao
                System Barber</h3>
            <h3 class="text-decoration mb-4"
                style="color: rgb(255,255,255);">Aqui Barba, cabelo e bigode são coisas sérias</h3>
        </div>
    </div>
</div>

<div class="container" style="text-align: center;">
    <br>
    <span class="center" style="color: rgb(255,255,255);" id="servicos">Agendar</span>
    <h3 style="color: rgb(255,255,255);">Aqui você pode verificar
        as opções de serviços, barbeiros e realizar seu agendamento</h3>
    <hr style="color: lightgrey;">

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
                        <p class="card-text"><?php echo "R$" . $row['valor']; ?></p>
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
            <div class="col-md-12 heading-section text-center" style="color: rgb(255,255,255);" >
                <span class="subheading" id="profissionais">Conheça nossa equipe</span>
                <h2 class="mb-4">Profissionais</h2>
            </div>

            <?php
            include 'conexao.php';
            $query = "SELECT * FROM sysb.usuarios WHERE tipo_acesso = 'Profissional' order by codigo_usuario DESC";
            $resultado = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_assoc($resultado)) {
                ?>
                <div class="card bg-dark"
                     style="width: 18rem; color: rgb(255,255,255); border-color: rgb(255, 208, 0); margin: 10px;">
                    <img src="img/<?php echo $row['img_user'] ?>" class="card-img-top mt-3" alt="...">
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
        <?php include_once('IncludeGaleriaFotos.php'); ?>
        <p></p>
        <hr style="color: lightgrey;">
        <?php include_once('IncludeFooter.php'); ?>
    </div>
</body>

</html>
