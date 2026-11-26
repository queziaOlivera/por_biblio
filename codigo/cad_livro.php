
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Livro</title>
</head>
<body>

    <h2>Cadastro de Livro</h2>

    <form action="salvar_livro.php" method="post" enctype="multipart/form-data">

        Título: <br>
        <input type="text" name="titulo" required>
        <br><br>

        Autor: <br>
        <input type="text" name="autor" required>
        <br><br>

        Editora: <br>
        <input type="text" name="editora">
        <br><br>

        Ano: <br>
        <input type="number" name="ano">
        <br><br>

        ISBN: <br>
        <input type="text" name="isbn">
        <br><br>

        Quantidade: <br>
        <input type="number" name="quantidade" required>
        <br><br>

        Categoria: <br>
        <select name="idcategoria" required>
            <?php
            require_once "../conexao.php";

            $sql = "SELECT * FROM tb_categoria";
            $resultado = mysqli_query($conexao, $sql);

            while ($categoria = mysqli_fetch_assoc($resultado)) {
                echo "<option value='" . $categoria['idcategoria'] . "'>";
                echo $categoria['nome'];
                echo "</option>";
            }
            ?>
        </select>

        <br><br>

        Capa do livro: <br>
        <input type="file" name="foto" accept="image/*" required>

        <br><br>

        <input type="checkbox" name="destaque" value="1">
        Livro em destaque

        <br><br>

        <input type="submit" value="Cadastrar Livro">

    </form>

</body>
</html>
