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
    $celular = $_POST["celular"];
    $cidade = $_POST["cidade"];

    $sqlConferirSeNaoTemInformacoesSemelhantes = "SELECT * FROM clientes WHERE nome='$nome' and cnpj_cpf='$cnpj_cpf' and inscrição_estadual='$insc' and numero='$numero' and cep='$cep' and bairro='$barirro' and endereco='$endereco' and cidade='$cidade' and email='$email' and celular='$celular'";
    $query = mysqli_query($mysqli, $sqlConferirSeNaoTemInformacoesSemelhantes);

    if (mysqli_num_rows($query) == 0) {
        $sqlUpadate = "UPDATE clientes SET nome='$nome', cnpj_cpf='$cnpj_cpf', inscrição_estadual='$insc', numero='$numero',cep='$cep', bairro='$barirro' , endereco='$endereco', email='$email', cidade='$cidade', celular='$celular' WHERE id_clientes='$id'";
        $result = mysqli_query($mysqli, $sqlUpadate);
        header('Location: ../views/Clientes/clientes.php?clienteedt=clienteedt');
    } else {
        header('Location: ../views/Clientes/clientes.php?clientenedt=clientenedt');
    }
} else {
    header('Location: ../views/Clientes/clientes.php?clientenedt=clientenedt');
}
