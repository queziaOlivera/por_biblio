<?php
require_once "conexao.php";

$nome = $_GET['nome'];
$descricao = $_GET['descricao'];

$sql = "INSERT INTO tb_categoria (nome, descricao) VALUES (?, ?)";

$comando = mysqli_prepare($conexao, $sql);
mysqli_stmt_bind_param($comando, "ss", $nome, $descricao);
mysqli_stmt_execute($comando);

header("Location: index.php");
?>