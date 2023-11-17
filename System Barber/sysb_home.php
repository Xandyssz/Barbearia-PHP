<?php
session_start();
// Verifica se existe os dados da sessão de login
if(!isset($_SESSION["tipo_acesso"]))
{
// Usuário não logado! Redireciona para a página de login
    header("location: sysb_index.php");
}
?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- TITULO DA PAGINA -->
    <title>System Barber</title>

    <!-- ARQUIVOS CSS -->
    <link rel="stylesheet" href="css/estilos.css">

    <!-- ARQUIVOS JAVA SCRIPT -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</head>
<?php include_once('IncludeHeaderADM.php'); ?>

<body class="bg-dark">
<div class="container-fluid div" class="div">
    <div>
        <div class="col-md-12 py-md-5 pb-5 pb-md-5">
            <div class="heading-section mb-4 mt-md-5">
                    <span class="font-monospace" class="subheading" style="color: rgb(255, 208, 0); text-align: center;">Sobre nós</span>
                <h2 class="fw-bold fst-italic fs-1 font-monospace" class="mb-4" style="color: rgb(255, 208, 0);"> Bem-vindo ao System Barber</h2>
                <h1 class="fw-bold fst-italic fs-1 font-monospace text-decoration-underline" class="mb-4" style="color: rgb(255, 208, 0);">Aqui Barba, Cabelo, Bigode é Coisa Séria</h1>
            </div>
        </div>
    </div>
</div>

<span class="font-monospace subheading" style="color: rgb(255, 208, 0); text-align: center;" id="servicos">Agendar</span>
<h1 class="fw-bold fst-italic fs-1 font-monospace" class="mb-4" style="color: rgb(255, 208, 0);">Aqui você pode verificar as opcões de serviços, barbeiros e realizar seu agendamento</h1>

<!--        ---------------------------------------------------------->
<!--    // MENU DE SERVIÇOS-->
<div class="row justify-content-center pb-3">
    <div class="col-md-10 heading-section text-md-center">
        <h2 class="mb-4 mt-5" style="color: rgb(255, 208, 0);">Menu de Serviços </h2>
    </div>
</div>
<!--    // INICIO CADASTRO DE SERVIÇOS-->
<div class="row justify-content-center">
    <?php
    include 'conexao.php';
    $query = "SELECT * FROM sysb.servico order by codigo_servico DESC";
    $resultado = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($resultado)) {
        ?>
        <div class="card mb-5"
             style="width: 18rem; border-color: rgb(255, 208, 0); background-color: transparent; margin: 10px;">
            <div class="card-body" style="color: rgb(255, 208, 0);">
                <h5 class="card-title"><?php echo $row['nome']; ?></h5>
                <h6 class="card-subtitle mb-2"><?php echo $row['descricao']; ?></h6>
                <p class="card-text"><?php echo "R$" . $row['valor']; ?></p>
                <button class="btn btn-outline-warning"><a class="btn-outline-success" href="sysb_agendar.php">Ir para o agendamento</a></button>
            </div>
        </div>
        <?php
    }
    ?>
    <!--     // FIM CADASTRO DE SERVIÇOS-->
    <!--        ---------------------------------------------------------->

    <!--    // MENU DE FUNCIONARIOS-->
    <div class="row justify-content-center">
        <div class="col-md-12 heading-section text-center ftco-animate" style="color: rgb(255, 208, 0);">
            <span class="subheading">Conheça nossa equipe</span>
            <h2 class="mb-4">Profissionais</h2>
        </div>


        <!--  // INICIO CADASTRO DE FUNCIONÁRIOS-->
        <?php
        include 'conexao.php';
        $query = "SELECT * FROM sysb.usuarios WHERE tipo_acesso = 'Profissional' order by codigo_usuario DESC";
        $resultado = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_assoc($resultado)) {
            ?>

            <div class="card bg-dark" style="width: 18rem; color: rgb(255, 208, 0); border-color: rgb(255, 208, 0); margin: 10px;">
                <img src="img/<?php echo $row['img_user'] ?>" class="card-img-top mt-3" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $row['nome'] ?></h5>
                    <p class="card-text"><?php echo $row['descricao'] ?></p>
                    <p><?php echo "Nivel de Avaliação:" . $row['nivel_avaliacao'] ?></p>
                </div>
            </div>
            <?php
        }
        ?>
        <!--            // FIM DE FUNCIONÁRIOS-->
        <!--        ---------------------------------------------------------->
        <!--            // INICIO GALERIA DE FOTOS-->
        <?php include_once('IncludeGaleriaFotos.php'); ?>
        <!--            // FIM DA GALERIA DE FOTOS-->
        <!--        ---------------------------------------------------------->
        <!--            // INICIO FOOTER-->
        <?php include_once('IncludeFooter.php'); ?>
        <!--            // FIM FOOTER-->
</body>
</html>