
<?php
require_once "verificar_sessao.php";
session_start();

require_once "../conexao.php";

$idlivro = $_GET['idlivro'];

$sql = "DELETE FROM tb_livro WHERE idlivro = ?";

$comando = mysqli_prepare($conexao, $sql);

mysqli_stmt_bind_param($comando, "i", $idlivro);

mysqli_stmt_execute($comando);

header("Location: listar_livros.php");
exit;
?>
