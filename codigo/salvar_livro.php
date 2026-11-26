
<?php
require_once "verificar_sessao.php";
session_start();

require_once "../conexao.php";

$titulo = $_POST['titulo'];
$autor = $_POST['autor'];
$editora = $_POST['editora'];
$ano = $_POST['ano'];
$isbn = $_POST['isbn'];
$quantidade = $_POST['quantidade'];
$idcategoria = $_POST['idcategoria'];

$destaque = isset($_POST['destaque']) ? 1 : 0;

$nome_arquivo = $_FILES['foto']['name'];
$caminho_temporario = $_FILES['foto']['tmp_name'];

$extensao = pathinfo($nome_arquivo, PATHINFO_EXTENSION);

$novo_nome = uniqid() . "." . $extensao;

$caminho_destino = "uploads/" . $novo_nome;

move_uploaded_file($caminho_temporario, $caminho_destino);

$sql = "INSERT INTO tb_livro
(titulo, autor, editora, ano, isbn, quantidade, foto, destaque, idcategoria)
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

$comando = mysqli_prepare($conexao, $sql);

mysqli_stmt_bind_param(
    $comando,
    "sssisissi",
    $titulo,
    $autor,
    $editora,
    $ano,
    $isbn,
    $quantidade,
    $novo_nome,
    $destaque,
    $idcategoria
);

mysqli_stmt_execute($comando);

header("Location: listar_livros.php");
exit;
?>
