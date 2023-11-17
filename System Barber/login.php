<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- ARQUIVOS CSS -->
    <link rel="stylesheet" href="css/styles.css">

    <!-- TITULO DA PAGINA -->
    <title>Tela de Login</title>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <h2>Login</h2>
            <form action="Autenticador.php" method="post">
                <div class="form-group">
                    <label for="username">Email:</label>
                    <input type="text" name="email" id="email" placeholder="Digite seu usuário" required>
                </div>
                <div class="form-group">
                    <label for="password">Senha:</label>
                    <input type="password" name="senha" id="senha" placeholder="Digite sua senha" required>
                </div>
                <button type="submit" name="login" id="login" class="btn btn-primary btn-user btn-block">Conecte-se</button>
<!--                <button class="btn btn-outline-warning"><a class="btn-outline-success" href="sysb_home.php">Login</a></button>-->
                <button class="btn btn-outline-warning"><a class="btn-outline-success" href="CrudUsuarioCadastrar.php">Cadastrar</a></button>
            </form>
        </div>
    </div>
</body>
</html>
