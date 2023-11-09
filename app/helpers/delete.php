<?php
include('../helpers/conexao.php');

if (!empty($_GET['id'])) {
    $idproduto = $_GET['id'];

    $sqlSelec = "SELECT * FROM produtos WHERE id=$idproduto";
    $result = mysqli_query($mysqli, $sqlSelec);
    // print_r($result); mostra a query foi um sucesso

    if ($result->num_rows > 0) {
        $sqlDelete = "DELETE FROM produtos WHERE id=$idproduto";
        $resultDelete = mysqli_query($mysqli, $sqlDelete);
    } else {
        echo  "<script>alert('Não excluio!')</>";
    }
}

header('Location: ../views/stock/estoque.php');
