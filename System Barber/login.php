<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> SYSB - Login</title>


    <link rel="stylesheet" href="css/login.css">
    <script src="js/funcoes.js"></script>

</head>
<body>

<section class="book" id="book">

    <h1 class="heading"><span>REALIZAR</span>-LOGIN</h1>

    <div class="row">
        <form class="user" action="Autenticador.php" method="post">
            <h3>LOGIN</h3>
            <input type="text" name="email" id="email" placeholder="Digite o Email" class="box" required>
            <input type="password" name="senha" id="senha" placeholder="Digite a senha" class="box" required>
            <div class="form-group">
                <button type="submit" name="login" id="login" class="btn btn-primary btn-user btn-block">Conecte-se</button>
                <input type="button" name="Registrar-se" class="btn btn-info" value="Registrar-se" onclick="window.location.href='CrudUsuarioCadastrar.php'"/>
                    <input type="button" name="cancelar" id="cancelar" class="btn btn-danger" onclick="location.href='sysb_contato.php'" value="Voltar">
            </div>
        </form>
        <div class="image">
            <img src="images/barbershop%20team.gif" alt="">
        </div>
    </div>

</section>
</body>
</html>