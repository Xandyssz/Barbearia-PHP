<script src="js/funcoes.js"></script>


<?php
include_once("conexao.php");
$email = $_POST['email'];
$senha = $_POST['senha'];

if (!empty($_POST) && (empty($_POST['email']) || empty($_POST['senha']))) {
    echo "<script>loginMensagem();</script>";
} else {
    session_start();
    $email_escape = addslashes($email);
    $senha_escape = addslashes($senha);

    $sql = "SELECT * FROM sysb.usuarios
                WHERE email = '{$email_escape}' LIMIT 1";
    $query = mysqli_query($conn, $sql);
    $nivel = mysqli_fetch_assoc($query);

    if ( mysqli_affected_rows($conn) > 0 ) {
        /* VERFICAR SENHA CRIPTOGRAFADA */
        if (password_verify($senha_escape, $nivel['senha'])) {
            /* TUDO VALIDADO, PARA ACESSO */
            $_SESSION['codigo_usuario'] = $nivel['codigo_usuario'];
            $_SESSION['nome']  = $nivel['nome'];
            $_SESSION['cpf']  = $nivel['cpf'];
            $_SESSION['email'] = $nivel['email'];
            $_SESSION['celular'] = $nivel['celular'];
            $_SESSION['senha'] = $nivel['senha'];
            $_SESSION['tipo_acesso'] = $nivel['tipo_acesso'];
            $_SESSION['nivel_avaliacao'] = $nivel['nivel_avaliacao'];
            $_SESSION['descricao'] = $nivel['descricao'];
            $_SESSION['img_user'] = $nivel['img_user'];

            $_SESSION['sessiontime'] = time() + 60 * 30;
            header("location: sysb_home.php"); // TUDO OK
        } else {
            echo "<script>loginMensagem();</script>";
            session_destroy();
            unset($_SESSION['codigo_usuario']);
            unset($_SESSION['nome']);
            unset($_SESSION['cpf']);
            unset($_SESSION['celular']);
            unset($_SESSION['email']);
            unset($_SESSION['senha']);
            unset($_SESSION['tipo_acesso']);
            unset($_SESSION['nivel_avaliacao']);
            unset($_SESSION['descricao']);
            unset($_SESSION['img_user']);
            echo '<meta HTTP-EQUIV="refresh" CONTENT="0; URL=sair.php">';
        }
    } else {
        echo "<script>loginMensagem();</script>";
        echo '<meta HTTP-EQUIV="refresh" CONTENT="0; URL=sair.php">';

    }
}
?>