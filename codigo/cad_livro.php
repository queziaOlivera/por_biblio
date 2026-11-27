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
    <input type="text" name="editor">
    <br><br>

    Ano: <br>
    <input type="number" name="ano" min="1000" max="2100" step="1" placeholder="Ex.: 2020" required>
    <br><br>

    ISBN: <br>
    <input type="text" name="isbn" required>
    <br><br>

    Quantidade: <br>
    <input type="number" name="quantidade" min="0" required>
    <br><br>

    Categoria: <br>
    <select name="idcategoria" required>
        <option value="">Selecione uma categoria</option>

        <?php
        while ($categoria = mysqli_fetch_assoc($resultado)) {
            echo "<option value='" . $categoria['idcategoria'] . "'>";
            echo $categoria['nome'];
            echo "</option>";
        }
        ?>

    </select>
    <br><br>

    Capa do livro: <br>
    <input type="file" name="foto" accept="image/*">
    <br><br>

    Disponível: 
    <input type="checkbox" name="disponivel" value="1" checked>
    <br><br>

    <input type="submit" value="Cadastrar Livro">

</form>

</body>
</html>
