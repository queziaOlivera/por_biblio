
<?php
require_once "verificar_sessao.php";
session_start();

require_once "../conexao.php";

$idcategoria = $_GET['idcategoria'];

$sql = "DELETE FROM tb_categoria WHERE idcategoria = ?";

$comando = mysqli_prepare($conexao, $sql);

mysqli_stmt_bind_param($comando, "i", $idcategoria);

mysqli_stmt_execute($comando);

header("Location: listar_categorias.php");
exit;
?>
