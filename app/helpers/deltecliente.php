<?php
include('../helpers/conexao.php');

if (!empty($_GET['id'])) {
    $idcliente = $_GET['id'];

    $sqlSelec = "SELECT * FROM clientes WHERE id_clientes=$idcliente";
    $result = mysqli_query($mysqli, $sqlSelec);
    // print_r($result); mostra a query foi um sucesso

    if ($result->num_rows > 0) {
        $sqlDelete = "DELETE FROM clientes WHERE id_clientes=$idcliente";
        $resultDelete = mysqli_query($mysqli, $sqlDelete);
    } else {
        echo  "<script>alert('Não excluio!')</>";
    }
}

header('Location: ../views/Clientes/clientes.php');
