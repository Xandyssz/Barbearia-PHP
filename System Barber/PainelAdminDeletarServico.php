<?php
session_start();
include 'sessao.php';
include_once("conexao.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <script src="js/funcoes.js"></script>
</head>
<body>
<?php
$id = $_GET['codigo_servico'];

if (!empty($id)) {
    $result_servico = "DELETE FROM sysb.servico WHERE codigo_servico = $id";
    mysqli_query($conn, $result_servico);

    if (mysqli_affected_rows($conn)) {
        echo "<script>OpcaoMensagens(3);</script>";
        echo '<meta HTTP-EQUIV="Refresh" CONTENT="2; URL=PainelAdminAcoesServicos.php">';
    } else {
        echo "<script>OpcaoMensagens(5);</script>";
        echo '<meta HTTP-EQUIV="Refresh" CONTENT="2; URL=PainelAdminAcoesServicos.php">';
    }
} else {
    echo "<script>OpcaoMensagens(5);</script>";
    echo '<meta HTTP-EQUIV="Refresh" CONTENT="2; URL=PainelAdminAcoesServicos.php">';
}
?>

</body>
</html>