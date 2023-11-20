<?php
session_start();
include_once('sessao.php');

if(!isset($_SESSION["tipo_acesso"]))
{
// Usuário não logado! Redireciona para a página de login
    header("location: sysb_index.php");
}else if($_SESSION['tipo_acesso'] != "Profissional" && $_SESSION['tipo_acesso'] != "Usuario")
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
                <form action="login.php" class="appointment-form">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group mb-1 mt-1">
                                <input type="text" class="form-control" id="appointment_name" placeholder="Nome"
                                       style="border-color: rgb(255, 208, 0);" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group mb-1 mt-1">
                                <input type="email" class="form-control" id="appointment_email" placeholder="Email"
                                       style="border-color: rgb(255, 208, 0);" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group mb-1 mt-1">
                                <input type="date" class="form-control appointment_date" placeholder="Data"
                                       style="border-color: rgb(255, 208, 0);" required>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <input type="time" class="form-control appointment_time mb-1 mt-1 "
                                       placeholder="Horário" style="border-color: rgb(255, 208, 0);" required>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="select-wrap">

                                    <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                    <select name="" id="servico" class="form-control mb-1 mt-1"
                                            style="border-color: rgb(255, 208, 0);" required>
                                        <option value="" disabled selected>Selecione o serviço</option>
                                        <option value="" id="s1">Serviço 1</option>
                                        <option value="" id="s2">Serviço 2</option>
                                        <option value="" id="s3">Serviço 3</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group mb-1 mt-1">
                                <div class="select-wrap">

                                    <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                    <select name="" id="" class="form-control mb-1 mt-1"
                                            style="border-color: rgb(255, 208, 0);" required>
                                        <option value="" disabled selected>Selecione o Barbeiro</option>
                                        <option value="">Nome</option>
                                        <option value="">Nome</option>
                                        <option value="">Nome</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group mb-1 mt-1">
                                <input type="text" class="form-control" id="phone" placeholder="Phone"
                                       style="border-color: rgb(255, 208, 0);" required>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group mb-1 mt-1">
                                <input type="text" class="form-control" id="comentario" placeholder="Comentário"
                                       style="border-color: rgb(255, 208, 0);">
                            </div>
                        </div>

                    </div>

                    <div class="form-group mb-4 mt-4" align="center">
                        <input type="submit" value="Finalizar agendamento" class="btn btn-primary"
                               style="border-color: rgb(255, 208, 0); color: rgb(255, 208, 0); background-color: transparent;">
                        <link rel="stylesheet" href="CrudUsuarioCadastrar.php" required>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <p></p>
    <hr style="color: lightgrey;">
    <?php include_once('IncludeFooter.php'); ?>
</section>

<!--------------------------------------------------------------------------------->
<!-- FORMATAR (TELEFONE FIXO, TELEFONE CELULAR, CEP, CNPJ, CPF E DATA) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
<script>
    $("#phone").mask("(99)99999-9999");
</script>
<script>
    $("#phone").mask("(99)99999-9999");
</script>
<!--------------------------------------------------------------------------------->

</body>
</html>