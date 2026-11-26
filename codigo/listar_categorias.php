<?php
if (mysqli_num_rows($resultado) > 0) {

    while ($categoria = mysqli_fetch_assoc($resultado)) {

        echo $categoria['nome'];
        echo "<br>";

        echo "<a href='editar_categoria.php?idcategoria=" . $categoria['idcategoria'] . "'>Editar</a>";

        echo " | ";

        echo "<a href='excluir_categoria.php?idcategoria=" . $categoria['idcategoria'] . "'>Excluir</a>";

        echo "<br><br>";
    }

} else {

    echo "Nenhuma categoria cadastrada.";

}
?>