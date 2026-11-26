
<?php
require_once "verificar_sessao.php";
session_start();

require_once "../conexao.php";

$titulo = $_POST['titulo'];
$autor = $_POST['autor'];
$editor = $_POST['editor'];
$ano = $_POST['ano'];
$isbn = $_POST['isbn'];
$quantidade = $_POST['quantidade'];
$idcategoria = $_POST['idcategoria'];

$disponivel = isset($_POST['disponivel']) ? 1 : 0;

$nome_arquivo = $_FILES['foto']['name'];
$caminho_temporario = $_FILES['foto']['tmp_name'];

if (getimagesize($caminho_temporario) === false) {
    die("Envie um arquivo de imagem válido.");
}

$extensao = strtolower(pathinfo($nome_arquivo, PATHINFO_EXTENSION));

if (!in_array($extensao, ['jpg', 'jpeg', 'png', 'webp'])) {
    die("Formato de imagem não permitido.");
}

$novo_nome = uniqid() . "." . $extensao;

$caminho_destino = "uploads/" . $novo_nome;

if (move_uploaded_file($caminho_temporario, $caminho_destino)) {

    $sql = "INSERT INTO tb_livro
    (titulo, autor, editor, ano, isbn, quantidade, foto, disponivel, tb_categoria_idcategoria)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $comando = mysqli_prepare($conexao, $sql);

    mysqli_stmt_bind_param(
        $comando,
        "sssssisis",
        $titulo,
        $autor,
        $editor,
        $ano,
        $isbn,
        $quantidade,
        $novo_nome,
        $disponivel,
        $idcategoria
    );

    mysqli_stmt_execute($comando);

    header("Location: listar_livros.php");
    exit;

} else {
    echo "Erro ao enviar a capa do livro.";
}
?>
