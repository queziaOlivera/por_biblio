<?php
require_once "verificar_sessao.php";

require_once "conexao.php";

$sql = "SELECT * FROM tb_categoria";

$comando = mysqli_prepare($conexao, $sql);
mysqli_stmt_execute($comando);

$resultado = mysqli_stmt_get_result($comando);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Listar Categorias</title>
</head>
<body>

<h2>Categorias cadastradas</h2>

<?php
if (mysqli_num_rows($resultado) > 0) {

    while ($categoria = mysqli_fetch_assoc($resultado)) {

        echo "Nome: " . $categoria['nome'] . "<br>";
        echo "Descrição: " . $categoria['descricao'] . "<br>";

        echo "<a href='editar_categoria.php?idcategoria=" . $categoria['idcategoria'] . "'>Editar</a>";

        echo " | ";

        echo "<a href='excluir_categoria.php?idcategoria=" . $categoria['idcategoria'] . "'>Excluir</a>";

        echo "<hr>";
    }

} else {
    echo "Nenhuma categoria cadastrada.";
}
?>

</body>
</html>