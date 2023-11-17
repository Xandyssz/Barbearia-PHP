<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/styles.css">
    <title>Tela de administrador</title>
   
</head>
<body>
<?php
include "IncludeHeaderADM.php";
include "_funcoesConfigBanco.php";
include "conexao.php";
include "_funcoesGerais.php";
if( isset( $_GET["salvar"] ) ){

    $nome     = $_GET["nome"];
    $email    = $_GET["email"];
    $cpf      = $_GET["cpf"];
    $senha    = $_GET["senha"];

    $sql = "INSERT INTO cliente(cpf,nome, email, senha) VALUES ( '$cpf','$nome','$email', '$senha') ";
    $con = conectarBanco("SYSB");
    $res = executarInsert($con, $sql);

    if($res){
      $msg = "Usuário $nome cadastrado!";
    } else{
      $msg = "Houve um erro ao cadastrar o usuário $nome.";
    }
    desconectarBanco($con);
}

?>

?>

<?php 
      if( isset( $_GET["salvar"] ) ){
      ?>
        <div class="text-center bg-dark text-white p-1 fs-2 mt-4">
          <?php 
              echo $msg;
          ?>
        </div>
      <?php 
      }
      ?>

<section>
		  </div>
		</div>
	  </nav>
    <div class="container pt-5 ">
        <!-- Tela de Cadastro -->
        <div class="form-container">
            <h2>Cadastro de Usuario</h2>
            <form method="GET" action="PainelAdminCadastrarCliente.php" method="GET">
                <div class="form-group">
                    <label>Nome:</label>
                    <input type="text" name="nome" placeholder="Digite um email">
                </div>
                <div class="form-group">
                    <label>Email:</label>
                    <input type="email" name="email" placeholder="Digite um email">
                </div>
                <div class="form-group">
                    <label>CPF:</label>
                    <input type="text" name="cpf" placeholder="Digite seu CPF">
                </div>
                <div class="form-group">
                    <label>Senha:</label>
                    <input type="password" name="senha" placeholder="Escolha uma senha para o cliente:">
                </div>
                <input type="submit" name="salvar" class="btn btn-dark pull-center" value="Cadastrar"
                                   onclick="window.location.href = 'listarCliente.php'" />
            </form>
        </div>
    </div>
    </section>




	  
</body>
</html>
