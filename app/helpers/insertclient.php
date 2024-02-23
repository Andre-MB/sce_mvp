<?php
include('../helpers/conexao.php');

$nome = $_POST["name"];
$cnpj_cpf = $_POST["cnpj_cpf"];
$insc = $_POST["inscrição_estadual"];
$numero = $_POST["numero"];
$cep = $_POST["cep"];
$barirro = $_POST["bairro"];
$endereco = $_POST["endereco"];
$email = $_POST["email"];
$cidade = $_POST["cidade"];

$sql = "INSERT INTO clientes(nome,cnpj_cpf,inscrição_estadual,numero,cep,bairro,endereco,cidade,email) VALUES('$nome', '$cnpj_cpf', '$insc', '$numero', '$cep', '$barirro', '$endereco', '$cidade', '$email');";

if (mysqli_query($mysqli, $sql)) {
    // echo "Registro adicionado com sucesso !";
    header("location: ../views/Clientes/clientes.php");
    //die();
} else {
    echo "Error: " . $sql . ":-" . mysqli_error($conn);
}
