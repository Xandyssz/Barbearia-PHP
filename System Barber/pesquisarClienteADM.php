<?php
include "_funcoesGerais.php";
include "_funcoesConfigBanco.php";

// Verifica se o campo "nome" está presente na URL
if (isset($_GET["nome"])) {

  $nome = $_GET["nome"]; // Obtém o nome digitado na variável $nome
  $con = conectarBanco("SYSB"); // Conecta no banco de dados "SYSB"
  $sql = "SELECT * FROM cliente WHERE nome LIKE '%$nome%'";
  $dados = executarSelect($con, $sql); // $dados recebe um array com dados ou um array vazio se não encontrar
  desconectarBanco($con);

  // Verifica se foram encontrados barbeiros com o nome pesquisado
  if (empty($dados)) {
    echo "Nenhum cliente encontrado com o nome '$nome'.";
  }
} else {
  $nome = ""; // Nome recebe uma string vazia para o primeiro acesso à página
}
?>

<main class="container">
  <div class="row">
    <div class="col-12 bg-dark text-white p-2 text-center">
      <h1>
        Pesquisar cliente
      </h1>
    </div>
  </div>

  <div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-8">
      <form action="editarBarbeiroADM.php" method="GET">

        <div class="p-2">
          <label for="nome" class="form-label"> Digite o nome do cliente: </label>
          <input type="text" id="nome" name="nome" class="form-text" value="<?= $nome ?>" required>
        </div>

        <div class="input-group">
          <input type="submit" class="btn btn-primary" name="pesquisar" value="Pesquisar">
        </div>

      </form>
    </div>
  </div>

  <!-- Exibição dos resultados da pesquisa -->
  <?php
  if (isset($_GET["pesquisar"])) {
    if (!empty($dados)) {
      ?>
      <hr>
      <div class="row">
        <div class="col-12">
          <table class="table table-dark">
            <!-- Linha com cabeçalho das colunas-->

            <?php
            foreach ($dados as $cliente) {
              $cpf = $cliente["cpf"];
              echo "<tr>";
              echo "<td> $cpf </td>";
              echo "<td> {$cliente["nome"]} </td>";
              echo "<td> {$cliente["email"]} </td>";
              echo "<td>";
              echo "<a href='editarClienteADM.php?cpf=$cpf'><img class='mx-2 icone-config' src='imagens/config.png'></a>";
              echo "</td>";
              echo "</tr>";
            }
            ?>
          </table>
        </div>
      </div>
    <?php
    } else {
      echo "Nenhum cliente encontrado com o nome '$nome'.";
    }
  }
  ?>
</main>
