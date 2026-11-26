
<?php
require_once "verificar_sessao.php";
session_start();

require_once "../conexao.php";

$texto = $_GET['texto'] ?? '';

$sql = "SELECT * FROM tb_livro
        WHERE titulo LIKE ?
        OR autor LIKE ?";

$pesquisa = "%" . $texto . "%";

$comando = mysqli_prepare($conexao, $sql);

mysqli_stmt_bind_param($comando, "ss", $pesquisa, $pesquisa);

mysqli_stmt_execute($comando);

$resultado = mysqli_stmt_get_result($comando);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Livros</title>
</head>
<body>

    <h2>Livros Cadastrados</h2>

    <form method="GET">

        Pesquisar livro:

        <input type="text" name="texto"
        value="<?php echo $texto; ?>">

        <input type="submit" value="Pesquisar">

    </form>

    <br>

    <a href="cadastrar_livro.php">Cadastrar novo livro</a>

    <hr>

    <?php

    if (mysqli_num_rows($resultado) > 0) {

        while ($livro = mysqli_fetch_assoc($resultado)) {

            echo "Título: " . $livro['titulo'] . "<br>";

            echo "Autor: " . $livro['autor'] . "<br>";

            echo "Editora: " . $livro['editor'] . "<br>";

            echo "Ano: " . $livro['ano'] . "<br>";

            echo "Quantidade: " . $livro['quantidade'] . "<br>";

            if ($livro['disponivel'] == 1) {
                echo "Disponível<br>";
            } else {
                echo "Indisponível<br>";
            }

            if (!empty($livro['foto'])) {
                echo "<img src='uploads/" . $livro['foto'] . "' width='100'><br>";
            }

            echo "<a href='editar_livro.php?idlivro=" . $livro['idlivro'] . "'>Editar</a>";

            echo " | ";

            echo "<a href='excluir_livro.php?idlivro=" . $livro['idlivro'] . "' onclick=\"return confirm('Deseja excluir este livro?')\">Excluir</a>";

            echo "<hr>";
        }

    } else {

        echo "Nenhum livro encontrado.";

    }

    ?>

</body>
</html>
