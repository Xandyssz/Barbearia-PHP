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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="js/funcoes.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>

<!--Header-->
<title>SYSB - Ações Agendamentos</title>

<?php include('includes/header.php'); ?>
<!--End Header-->

<body>
<div class="be-wrapper be-fixed-sidebar">
    <!--Navigation bar-->
    <?php include("IncludeHeaderADM.php"); ?>
    <!--Navigation-->
    <p></p>
    <p></p>
    <div class="card card-table">

        <div class="card-header">
            <div class="title">Ações Agendamento</div>
        </div>
        <div class="card-body table-responsive">
            <table class="table table-striped table-borderless">
                <thead>
                <tr>
                    <th>Agendamento</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Dia</th>
                    <th>Hora</th>
                    <th>Servico</th>
                    <th>Profissional</th>
                    <th>Celular</th>
                    <th>Comentario</th>
                    <th>Status</th>
                    <th>Ação</th>
                </tr>
                </thead>
                <?php
                $query = "SELECT sysb.agenda.*, sysb.servico.nome as nome_servico, sysb.usuarios.nome as nome_profissional
          FROM sysb.agenda
          LEFT JOIN sysb.servico ON sysb.agenda.servico = sysb.servico.codigo_servico
          LEFT JOIN sysb.usuarios ON sysb.agenda.profissional = sysb.usuarios.codigo_usuario
          WHERE sysb.usuarios.tipo_acesso = 'Profissional'
          ORDER BY sysb.agenda.codigo_agenda";
                $dados = mysqli_query($conn, $query); // comando transação bd

                while ($linha = mysqli_fetch_assoc($dados)) {
                    $dataConvertida = implode('/', array_reverse(explode('-', $linha['dia'])));
                    ?>
                    <tr>
                        <td><?php echo $linha['codigo_agenda']; ?></td>
                        <td><?php echo $linha['nome']; ?></td>
                        <td><?php echo $linha['email']; ?></td>
                        <td><?php echo $dataConvertida; ?></td>
                        <td><?php echo $linha['hora']; ?></td>
                        <td><?php echo $linha['nome_servico']; ?></td>
                        <td><?php echo $linha['nome_profissional']; ?></td>
                        <td><?php echo $linha['celular']; ?></td>
                        <td><?php echo $linha['comentario']; ?></td>
                        <td><?php echo $linha['status']; ?></td>
                        <td>
                            <?php
                            $id = $linha['codigo_agenda'];
                            echo "<a href='#' title='Alterar' onclick='alterarStatusAgendamento($id);'><i class='fa fa-pencil-square'></i></a>";
                            echo " ";
                            $id = $linha['codigo_agenda'];
                            echo "<a href='#' title='Excluir' onclick='confirmacaoExclusaoAgendamento($id);'><i class='fa fa-trash'></i></a>";
                            ?>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </table>
        </div>
    </div>
</div>
</div>
</div>
</div>

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

</html>