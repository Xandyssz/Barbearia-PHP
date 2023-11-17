<?php
include "_funcoesGerais.php";
include "_funcoesConfigBanco.php";

// Verifica se o campo "cpf" está presente na URL, ou seja, o usuário deseja editar um barbeiro específico
if (isset($_GET["cpf"])) {

  $cpf = $_GET["cpf"]; // Obtém o CPF do barbeiro da URL
  $con = conectarBanco("SYSB"); // Conecta no banco de dados "SYSB"
  $sql = "DELETE  FROM Cliente WHERE cpf = '$cpf'";
  var_dump($sql);
  $dados = executarDelete($con, $sql); // $dados recebe um array com dados ou um array vazio se não encontrar
  desconectarBanco($con);
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Deletar Cliente</title>
        <script src="js/funcoes.js"></script>
    </head>
    <body>
    </body>
</html>