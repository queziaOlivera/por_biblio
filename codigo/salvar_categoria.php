<?php
require_once "conexao.php";

$nome = $_POST['nome'];
$descricao = $_POST['descricao'];

$sql = "INSERT INTO tb_categoria (nome, descricao) VALUES (?, ?)";

$comando = mysqli_prepare($conexao, $sql);

mysqli_stmt_bind_param($comando, "ss", $nome, $descricao);

mysqli_stmt_execute($comando);

header("Location: listar_categorias.php");
exit;
?>