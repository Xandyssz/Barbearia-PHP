<?php
include "_funcoesGerais.php";
include "_funcoesConfigBanco.php";

// Verifica se o campo "cpf" está presente na URL, ou seja, o usuário deseja editar um barbeiro específico
if (isset($_GET["nome"])) {

  $nome_barbeiro = $_GET["nome"]; // Obtém o CPF do barbeiro da URL
  $con = conectarBanco("SYSB"); // Conecta no banco de dados "SYSB"
  $sql = "SELECT * FROM profissionais WHERE nome = '$nome_barbeiro'";
  $dados = executarSelect($con, $sql); // $dados recebe um array com dados ou um array vazio se não encontrar
  desconectarBanco($con);

  // Verifica se o barbeiro foi encontrado
  if (!$dados) {
    echo "Barbeiro não encontrado.";
    exit; // Encerra o script se o barbeiro não for encontrado
  }

  $barbeiro = $dados[0]; // Definindo uma variável para os dados do barbeiro a ser editado
} else {
  echo "Nome do barbeiro não especificado.";
  exit; // Encerra o script se o CPF do barbeiro não estiver presente na URL
}

?>

<main class="container">
  <div class="row">
    <div class="col-12 bg-dark text-white p-2 text-center">
      <h1>
        Editar Barbeiro
      </h1>
    </div>
  </div>

  <div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-8">

	<form action="editarBarbeiroADM.php" method="GET">


        <div class="p-2">
          <label for="cpf" class="form-label"> CPF </label>
          <input type="text" id="cpf" name="cpf" class="form-text" value="<?= $barbeiro["cpf"] ?>" required>
        </div>

        <div class="p-2">
          <label for="nome" class="form-label"> Nome </label>
          <input type="text" id="nome" name="nome" class="form-text" value="<?= $barbeiro["nome"] ?>" required>
        </div>

        <div class="input-group">
          <input type="submit" class="btn btn-primary" name="salvar" value="Salvar Alterações">
        </div>

      </form>

    </div>
  </div>
</main>