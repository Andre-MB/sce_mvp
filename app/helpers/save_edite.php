<?php
include('../helpers/conexao.php');

if (isset($_POST['upda'])) {
    $id = $_POST['id'];
    $nome = $_POST["name"];
    $unidade_de_medida = $_POST["unidade_de_medida"];
    $quantidade = $_POST["quantidade"];
    $descricao = $_POST["descricao"];
    $custo = $_POST["custo"];
    $preco = $_POST["preco"];
    $ncm = $_POST["ncm"];
    $origem = $_POST["origem"];

    $sqlUpadate = "UPDATE produtos SET nome='$nome', unidade_de_medida='$unidade_de_medida', quantidade='$quantidade', descricao='$descricao', custo='$custo', preco='$preco' ,ncm='$ncm', origem='$origem' WHERE id='$id';";

    $result = mysqli_query($mysqli, $sqlUpadate);
}

header('Location: ../views/stock/estoque.php');
