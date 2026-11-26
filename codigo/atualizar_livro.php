
<?php
require_once "verificar_sessao.php";
session_start();

require_once "../conexao.php";

$idlivro = $_POST['idlivro'];
$titulo = $_POST['titulo'];
$autor = $_POST['autor'];
$editor = $_POST['editor'];
$ano = $_POST['ano'];
$isbn = $_POST['isbn'];
$quantidade = $_POST['quantidade'];

$disponivel = isset($_POST['disponivel']) ? 1 : 0;

$sql = "UPDATE tb_livro
        SET titulo = ?, autor = ?, editor = ?,
            ano = ?, isbn = ?, quantidade = ?,
            disponivel = ?
        WHERE idlivro = ?";

$comando = mysqli_prepare($conexao, $sql);

mysqli_stmt_bind_param(
    $comando,
    "sssssiii",
    $titulo,
    $autor,
    $editor,
    $ano,
    $isbn,
    $quantidade,
    $disponivel,
    $idlivro
);

mysqli_stmt_execute($comando);

header("Location: listar_livros.php");
exit;
?>
