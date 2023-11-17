<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
   
    <link rel="stylesheet" href="css/bootstrap.min.css">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel='stylesheet' href='//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css'
              type='text/css'>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/headers.css">
        <link rel="stylesheet" href="css/estilo.css">
        <link href="css/footers.css" rel="stylesheet">
        <script src="js/funcoes.js"></script>
    <link rel="stylesheet" href="css/styles.css">
    
 
    <title>Listar Cliente</title>
</head>
<section>
<?php
 include_once("conexao.php");
 include_once('IncludeHeaderADM.php');
?>
</section>
<body class="col-12">
<section >
<div>
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <th>Nome</th>
                                <th>CPF</th>
                                <th>Email</th>
                                <th>Senha</th>
                                <th>Ações</th>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = "SELECT * FROM Cliente ORDER BY nome";
                                    $dados = mysqli_query($conn, $query); //comando transação bd
                                    while ($linha = mysqli_fetch_assoc($dados)) {
                                        ?>
                                        <tr>
                                            <td><?php echo $linha['nome']; ?></td>
                                            <td><?php echo $linha['cpf']; ?></td>
                                            <td><?php echo $linha['email']; ?></td>
                                            <td><?php echo $linha['senha']; ?></td>
                                            <td>

                                            <?php
                                              
                                              echo "<a href='editarCliente.php?cpf=" . $linha['cpf'] . "' title='Alterar'>
                                                            <i class='fa fa-pencil-square'></i>
                                                        </a>";
                                              echo " ";
                                              $id = $linha['cpf'];
                                              echo "<a href='PainelAdminClienteDeletar.php?cpf=" . $linha['cpf'] . "' title='Excluir' 
                                                          onclick='confirmacaoExclusao($id);'>
                                                          <i class='fa fa-trash'></i>
                                                      </a>";

                                              ?>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                    ?>

                            </center></tbody>
                        </div>
                        <div class="col-lg-12 justify-content-center">
                            <input type="button" name="Cadastrar" class="btn btn-dark pull-center col-lg-12 justify-content-center" value="Cadastrar" onclick="window.location.href = 'cadastrarClienteADM.php'"  />
                        </div>
                        </tbody>
                            </table>
                    </div>
                </div>
            </div>
        </div>
        </section>
</body>
</html>
