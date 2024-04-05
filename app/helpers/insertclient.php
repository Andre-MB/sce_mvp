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
$celular = $_POST["celular"];
$cidade = $_POST["cidade"];

$sqlConferirSeNaoTemInformacoesSemelhantes = "SELECT * FROM clientes WHERE nome='$nome'";
$query = mysqli_query($mysqli, $sqlConferirSeNaoTemInformacoesSemelhantes);

if (mysqli_num_rows($query) == 0) {
    $sql = "INSERT INTO clientes(nome,cnpj_cpf,inscrição_estadual,numero,cep,bairro,endereco,cidade,email,celular) VALUES('$nome', '$cnpj_cpf', '$insc', '$numero', '$cep', '$barirro', '$endereco', '$cidade', '$email', '$celular');";

    if (mysqli_query($mysqli, $sql)) {
        // echo "Registro adicionado com sucesso !";
        header("location: ../views/Clientes/clientes.php?clienteadd=clienteadd");
        //die();
    } else {
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
    }
}

header("location: ../views/Clientes/clientes.php?clienteerro=clienteerro");
