
<?php
require_once "verificar_sessao.php";
session_start();

require_once "../conexao.php";

$idcategoria = $_POST['idcategoria'];
$nome = $_POST['nome'];
$descricao = $_POST['descricao'];

$sql = "UPDATE tb_categoria
        SET nome = ?, descricao = ?
        WHERE idcategoria = ?";

$comando = mysqli_prepare($conexao, $sql);

mysqli_stmt_bind_param($comando, "ssi", $nome, $descricao, $idcategoria);

mysqli_stmt_execute($comando);

header("Location: listar_categorias.php");
exit;
?>
