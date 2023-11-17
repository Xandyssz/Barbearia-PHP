<?php
include "_funcoesGerais.php";
include "_funcoesConfigBanco.php";

// primeiro acesso na pagina - botao ainda nao foi pressionado para salvar alteracoes
if(! isset($_GET["salvar"]) ){

  // buscar os dados do organizador a ser alterado!!!
  $con = conectarBanco("SYSB");

  // obter o codigo do organizador que esta na URL (ex: ?cod=XXXX)
  $cod = $_GET["codigoprofissional"]; 
  $sql = "SELECT * FROM profissionais WHERE codigoprofissional = $codigoprofissionais";
  $dados = executarSelect($con, $sql);
  desconectarBanco($con);

  //print_r($dados); // exibindo para testar
  $usuario = $dados[0]; // definindo variavel para dados do usuario a ser editado
  

}  else { // botao salvar foi pressionado

    $con = conectarBanco("SYSB");

    $codprofissionais = $_GET["cod"];
    $nome            = $_GET["nome"];    
    $cpf           = $_GET["cpf"];

    // em breve! comando UPDATE no SQL - aguardem!!!
    $sql = "UPDATE profissionais SET nome='$nome', cpf = '$cpf' WHERE codigoprofissional=$codigoprofissionais ";
    $dados = executarUpdate($con, $sql);
    desconectarBanco($con);
    //echo $sql;

    header("location: editarBarbeiroADM.php?cod=$codigoprofissional &msg=1"); // mantem-se na pagina
    
}

?>

<main class="container">

  <div class="row">
    <div class="col-12">
      <h1>
        Editando dados de: <?= $usuario["nome"] ?>.

        <?php
          if(isset($_GET["msg"])){
            echo "<h3>Alterações Salvas.</h3>";
          }
        ?>
      </h1>

      <form action="editarOrganizador.php" method="GET">

        <div class="mt-3 mb-3 row">
          <label for="cod" class="col-sm-2 col-form-label">CPF</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="cpf" 
                  name="cod" value="<?= $usuario["cpf"]  ?>" readonly>
          </div>
        </div>

        <div class="mt-3 mb-3 row">
          <label for="nome" class="col-sm-2 col-form-label">Nome</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="nome" 
                  name="nome" value="<?= $usuario["nome"]  ?>">
          </div>
        </div>

        <div class="mb-3 row">
          <label for="salvar" class="col-sm-2 col-form-label"></label>
          <div class="col-sm-10">
            <input type="submit" class="btn btn-primary" id="salvar" 
                  name="salvar" value="Salvar Alterações">
          </div>
        </div>

      </form>
    </div>
  </div>

</main>

<?php include_once('IncludeFooter.php');?>

