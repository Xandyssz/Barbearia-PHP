<?php
include_once("conexao.php");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Deletar Categoria</title>
        <script src="js/funcoes.js"></script>
    </head>
    <body>
        <?php
        $id = $_GET['id'];
        if ($id > 0) {
            $query = "DELETE FROM servico WHERE codigoservico = $id";
            $dados = mysqli_query($conn, $query);
            header("Location: PainelAdminListarServico.php");
        } 
        ?>
    </body>
</html>
