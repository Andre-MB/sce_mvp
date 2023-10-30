<?php
include('../helpers/conexao.php');

$nome = $_POST["namev"];
$quantidade = $_POST["quantidadev"];
$custo = $_POST["custov"];
$preco = $_POST["precov"];

$sql = "UPDATE produtos set quantidade=quantidade-'$quantidade' WHERE nome ='$nome';";
$sql2 = "INSERT INTO vendas(nomeProduto,quantidadeDVP,precoVenda) VALUES ('$nome','$quantidade','$preco')";

if (mysqli_query($mysqli, $sql2) && mysqli_query($mysqli, $sql)) {
    // echo "Registro adicionado com sucesso !";
    header("location: ../views/stock/estoque.php");
    //die();
} else {
    echo "sdpockso";
    echo "Error: " . $sql . ":-" . mysqli_error($conn);
}
