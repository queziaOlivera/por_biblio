
<?php
require_once "verificar_sessao.php";
session_start();

require_once "../conexao.php";

$idcategoria = $_GET['idcategoria'];

$sql = "SELECT * FROM tb_categoria WHERE idcategoria = ?";

$comando = mysqli_prepare($conexao, $sql);
mysqli_stmt_bind_param($comando, "i", $idcategoria);
mysqli_stmt_execute($comando);

$resultado = mysqli_stmt_get_result($comando);
$categoria = mysqli_fetch_assoc($resultado);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Categoria</title>
</head>
<body>

    <h2>Editar Categoria</h2>

    <form action="atualizar_categoria.php" method="post">

        <input type="hidden" name="idcategoria"
        value="<?php echo $categoria['idcategoria']; ?>">

        Nome da categoria: <br>
        <input type="text" name="nome"
        value="<?php echo ($categoria['nome']); ?>" required>

        <br><br>

        Descrição: <br>
        <input type="text" name="descricao"
        value="<?php echo ($categoria['descricao'] ?? ''); ?>">

        <br><br>

        <input type="submit" value="Salvar alterações">

    </form>

</body>
</html>
