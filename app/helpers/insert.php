<?php
include('../helpers/conexao.php');

$nome = $_POST["name"];
$unidade_de_medida = $_POST["unidade_de_medida"];
$quantidade = $_POST["quantidade"];
$descricao = $_POST["descricao"];
$custo = $_POST["custo"];
$preco = $_POST["preco"];
$ncm = $_POST["ncm"];
$origem = $_POST["origem"];

$sql = "INSERT INTO produtos(nome,unidade_de_medida,descricao,ncm,quantidade,custo,preco,origem)
    VALUES('$nome','$unidade_de_medida','$descricao','$ncm','$quantidade','$custo','$preco','$origem');";

if (mysqli_query($mysqli, $sql)) {
    // echo "Registro adicionado com sucesso !";
    header("location: ../views/estoque.php");
    //die();
} else {
    echo "Error: " . $sql . ":-" . mysqli_error($conn);
}
