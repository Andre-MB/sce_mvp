<?php
include('../helpers/conexao.php');

if (isset($_POST['upda'])) {
    $id = $_POST["id"];
    $nome = $_POST["name"];
    $cnpj_cpf = $_POST["cnpj_cpf"];
    $insc = $_POST["inscrição_estadual"];
    $numero = $_POST["numero"];
    $cep = $_POST["cep"];
    $barirro = $_POST["bairro"];
    $endereco = $_POST["endereco"];
    $email = $_POST["email"];
    $cidade = $_POST["cidade"];

    $sqlUpadate = "UPDATE clientes SET nome='$nome', cnpj_cpf='$cnpj_cpf', inscrição_estadual='$insc', numero='$numero',cep='$cep', bairro='$barirro' , endereco='$endereco', email='$email', cidade='$cidade' WHERE id_clientes='$id';";

    $result = mysqli_query($mysqli, $sqlUpadate);
}

header('Location: ../views/Clientes/clientes.php');
