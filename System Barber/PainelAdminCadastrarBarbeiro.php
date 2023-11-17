<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="css/styles.css">
	<title>Cadastrar Barbeiro</title>
	

</head>

<body>

	<?php
	include_once('IncludeHeaderADM.php');
	include "_funcoesConfigBanco.php";
	include "_funcoesGerais.php";
	if (isset($_GET["salvar"])) {

		$nome     = $_GET["nome"];
		$cpf      = $_GET["cpf"];
		$codigoprofissional      = $_GET["codigoprofissional"];



		$sql = "INSERT INTO profissionais(cpf,nome, codigoprofissional) VALUES ( '$cpf','$nome', $codigoprofissional) ";
		$con = conectarBanco("SYSB");
		$res = executarInsert($con, $sql);

		if ($res) {
			$msg = "Profissional $nome cadastrado!";
		} else {
			$msg = "Houve um erro ao cadastrar o profissional $nome.";
		}
		desconectarBanco($con);
	}



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
	  
	<div class="container">
		<div class="form-container">
			<h2>Cadastrar profissional</h2>
			<form method="GET" action="PainelAdminCadastrarBarbeiro.php">
				<div class="form-group">
					<label>Nome:</label>
					<input type="text" id="nome" name="nome" placeholder="Nome">
				</div>
				<div class="form-group">
					<label>CPF:</label>
					<input type="text" id="cpf" name="cpf" placeholder="CPF">
				</div>
				<div class="form-group">
					<label>Codigo Profissional:</label>
					<input type="number" id="codigoprofissional" name="codigoprofissional" placeholder="Digite o código">
				</div>
				<input type="submit" name="salvar" class="btn btn-dark pull-center" value="Cadastrar"
                                   onclick="window.location.href = 'listarBarbeiro.php'" />
			</form>
		</div>
	</div>

</body>

</html>