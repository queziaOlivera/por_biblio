
<?php
require_once "verificar_sessao.php";
session_start();

require_once "../conexao.php";

$idlivro = $_GET['idlivro'];

$sql = "SELECT * FROM tb_livro WHERE idlivro = ?";

$comando = mysqli_prepare($conexao, $sql);
mysqli_stmt_bind_param($comando, "i", $idlivro);
mysqli_stmt_execute($comando);

$resultado = mysqli_stmt_get_result($comando);
$livro = mysqli_fetch_assoc($resultado);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Livro</title>
</head>
<body>

    <h2>Editar Livro</h2>

    <form action="atualizar_livro.php" method="post">

        <input type="hidden" name="idlivro"
        value="<?php echo $livro['idlivro']; ?>">

        Título: <br>
        <input type="text" name="titulo"
        value="<?php echo $livro['titulo']; ?>" required>
        <br><br>

        Autor: <br>
        <input type="text" name="autor"
        value="<?php echo $livro['autor']; ?>" required>
        <br><br>

        Editora: <br>
        <input type="text" name="editor"
        value="<?php echo $livro['editor']; ?>">
        <br><br>

        Ano: <br>
        <input type="number" name="ano"
        value="<?php echo $livro['ano']; ?>">
        <br><br>

        ISBN: <br>
        <input type="text" name="isbn"
        value="<?php echo $livro['isbn']; ?>">
        <br><br>

        Quantidade: <br>
        <input type="number" name="quantidade"
        value="<?php echo $livro['quantidade']; ?>" required>
        <br><br>

        Disponível:
        <input type="checkbox" name="disponivel" value="1"
        <?php if ($livro['disponivel'] == 1) echo "checked"; ?>>

        <br><br>

        <input type="submit" value="Salvar alterações">

    </form>

</body>
</html>
