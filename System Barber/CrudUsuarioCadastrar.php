<?php
session_start();
include_once('conexao.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <script src="js/funcoes.js"></script>
    <title>Tela de Cadastro de Usuário</title>
</head>
<body>

<!--------------------------------------------------------------------------------->
<section class="book" id="book">

    <h1 class="heading"> <span>REALIZAR</span>-CADASTRO</h1>

    <div class="row">


        <form action="" method="POST"> <!-- PARA LISTAR NO BANCO DE DADOS NO [ACTION - PRECISA SER # se não não grava no BANCO -->
            <h3>REGISTRO</h3>
            <input type="text"  name="nome" id="nome" placeholder="Digite o Nome Completo" class="box" required>
            <input type="text" name="cpf"  id="cpf" placeholder="Digite o CPF" class="box" required>
            <input type="email"  name="email" id="email" placeholder="Digite o email" class="box" required>
            <input type="password"  name="senha" id="senha" placeholder="Digite a senha" class="box" required>
            <input type="text" name="celular" id="celular" placeholder="Digite Numero de Contato" class="box" required>
            <input type="text" name="endereco" id="endereco" placeholder="Digite o endereco" class="box" required>
            <input type="submit" name="cadastrar" id="cadastrar" class="btn btn-danger" value="cadastrar">
            <input type="button" name="cancelar" id="cancelar" class="btn btn-danger" onclick="location.href='sysb_home.php'" value="Voltar">
        </form>
        <div class="image">
            <img src="images/Barber-cuate.svg" alt="">
        </div>
    </div>
</section>
<!--------------------------------------------------------------------------------->
<!-- FORMATAR (TELEFONE FIXO, TELEFONE CELULAR, CEP, CNPJ, CPF E DATA) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
<script>
    $("#cpf").mask("999.999.999-99");
    $("#celular").mask("(99)99999-9999");

</script>
<script>
    $(#cpf).mask("999.999.999-99");
    $("#celular").mask("(99)99999-9999");
</script>
<!--------------------------------------------------------------------------------->
</body>
</html>


<?php

if (isset($_POST['cadastrar'])) {
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $senhaCript = password_hash($senha, PASSWORD_DEFAULT);
    $celular = $_POST['celular'];
    $endereco = $_POST['endereco'];

    $query = "SELECT * FROM sysb.usuarios users
    WHERE users.email = '$email'";
    $row = mysqli_query($conn, $query);
    if (mysqli_num_rows($row) > 0) {
        echo "<script type='text/javascript'>OpcaoMensagens(4);</script>";

    } else {
        $result = "INSERT INTO sysb.usuarios 
        (nome, cpf, email, senha, celular, endereco) 
        VALUES 
            ('$nome', '$cpf', '$email', '$senhaCript', '$celular', '$endereco')";
        $row = mysqli_query($conn, $result);
        echo "<script type='text/javascript'>OpcaoMensagens(1);</script>";
        echo '<meta HTTP-EQUIV="Refresh" CONTENT="0; URL=login.php">';
    }

}
?>
