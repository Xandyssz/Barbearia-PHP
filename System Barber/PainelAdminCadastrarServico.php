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
	include_once('IncludeHeaderADM.php');
	include "_funcoesConfigBanco.php";
	include "_funcoesGerais.php";
	if (isset($_GET["salvar"])) {

		$descricao     = $_GET["descricao"];
		$preco    = $_GET["preco"];
		$tempoestimado    = $_GET["tempoestimado"];
		$codigoservico    = $_GET["codigoservico"];

		$sql = "INSERT INTO servico(descricao, preco, tempoestimado, codigoservico) VALUES ( '$descricao', $preco, $tempoestimado, $codigoservico) ";
		var_dump($sql);
		$con = conectarBanco("SYSB");
		$res = executarInsert($con, $sql);


		if ($res) {
			$msg = "Serviço $descricao cadastrado!";
		} else {
			$msg = "Houve um erro ao cadastrar o serviço $descricao.";
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
		<!-- Tela de Cadastro -->
		<div class="form-container">
			<h2>Cadastro de Serviço</h2>
			<form method="GET" action="PainelAdminCadastrarServico.php">
				<div class="form-group">
					<label>Descrição:</label>
					<input type="text" id="descricao" name="descricao" placeholder="Digite a descrição do serviço">
				</div>
				<div class="form-group">
					<label>Preço</label>
					<input type="price" id="preco" name="preco" placeholder="Digite o preço">
				</div>
				<div class="form-group">
					<label>Codigo Serviço</label>
					<input type="number" id="codigoservico" name="codigoservico" placeholder="Digite o código">
				</div>
				<div class="form-group">
					<label>Tempo estimado</label>
					<input type="number" id="tempo" name="tempoestimado" placeholder="Digite o tempo estimado(Em segundos)">
				</div>
				<input type="submit" name="salvar" class="btn btn-dark pull-center" value="Cadastrar"
                                   onclick="window.location.href = 'listarServico.php'" />
			</form>
		</div>
	</div>



</body>

</html>