<?php
session_start();
include_once('conexao.php');  // se ele clicou no botão salvar
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Tela de Cadastro de Usuário</title>
</head>
<body>

<!--------------------------------------------------------------------------------->
<div class="container">
    <div class="form-container">
        <h2>Cadastro de Usuário</h2>
        <form method="POST" action="">

            <div class="form-group">
                <label>Nome:</label>
                <input type="text" id="nome" name="nome" placeholder="Digite seu nome">
            </div>

            <div class="form-group">
                <label>CPF:</label>
                <input type="text" id="cpf" name="cpf" placeholder="Digite seu CPF">
            </div>

            <div class="form-group">
                <label>Email:</label>
                <input type="email" id="email" name="email" placeholder="Digite um email">
            </div>

            <div class="form-group">
                <label>Nova Senha:</label>
                <input type="password" id="senha" name="senha" placeholder="Escolha uma senha">
            </div>

            <button type="submit" name="salvar" id="salvar" class="btn btn-primary btn-user btn-block">Registrar-se
            </button>
        </form>
    </div>
</div>
<!--------------------------------------------------------------------------------->
<!-- FORMATAR (TELEFONE FIXO, TELEFONE CELULAR, CEP, CNPJ, CPF E DATA) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
<script>
    $("#cpf").mask("999.999.999-99");
</script>
<script>
    $(#cpf).mask("999.999.999-99");
</script>
<!--------------------------------------------------------------------------------->
</body>
</html>


<?php

if (isset($_POST['salvar'])) {
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $senhaCript = password_hash($senha, PASSWORD_DEFAULT);

    $query = "SELECT * FROM sysb.usuarios users
    WHERE users.email = '$email'";
    $row = mysqli_query($conn, $query);
    if (mysqli_num_rows($row) > 0) {
//        echo "<script type='text/javascript'>OpcaoMensagens(4);</script>";
        echo "Email Já em Uso";

    } else {
        $result = "INSERT INTO sysb.usuarios 
        (nome, cpf, email, senha) 
        VALUES 
            ('$nome', '$cpf', '$email', '$senhaCript')";
        $row = mysqli_query($conn, $result);
//        echo "<script type='text/javascript'>OpcaoMensagens(1);</script>";
//        echo '<meta HTTP-EQUIV="Refresh" CONTENT="0; URL=login.php">';
    }

}
?>
