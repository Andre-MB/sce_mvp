<?php
include('../helpers/conexao.php');

if (!empty($_POST['id'])) {

    $idvenda = $_POST['id'];

    $sqlSelec = "SELECT * FROM intePV WHERE idvendas=$idvenda";
    $result = mysqli_query($mysqli, $sqlSelec);

    if ($result->num_rows > 0) {
        $sqlDelete = "DELETE FROM intePV WHERE idvendas=$idvenda";
        $resultDelete = mysqli_query($mysqli, $sqlDelete);

        $sqlDeleter = "DELETE FROM vendas WHERE idvendas=$idvenda";
        $resultDeleter = mysqli_query($mysqli, $sqlDeleter);
    } else {
        echo  "<script>alert('Não excluio!')</>";
    }
}

header('Location: ../views/Vendas/vendas.php');
