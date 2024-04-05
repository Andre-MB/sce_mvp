<?php
include('../../helpers/conexao.php');

// echo json_encode($_POST["itens"]);

$nome = $_POST["nome_cliente"];
$datav = $_POST["data"];
$forma = $_POST["forma"];
$itens = $_POST["itens"];

// print_r($itens[0]["nome"]);
// print_r($itens);
// print_r(count($itens));

$total = 0; // Loop pra desconrir o total da compra e verificar que tem item em estoque
for ($i = 0; $i <= count($itens); $i++) {
    $quantd = $itens[$i]["quantidades"];
    $valo = $itens[$i]["valo"];
    $total += $quantd * $valo;
}

for ($i = 0; $i <= count($itens); $i++) {
    $nomep = $itens[$i]["nome"];
    $quantd = $itens[$i]["quantidades"];
    $valo = $itens[$i]["valo"];

    // descobre os dados do produro pelo seu nome
    $sqlid = "SELECT * FROM produtos WHERE nome='$nomep'";
    $querid = mysqli_query($mysqli, $sqlid);

    // adicina a tabela intePV o idprodutos, idvendas, quantidadeP, valorP
    while ($data = mysqli_fetch_assoc($querid)) {
        $det = $data['id'];
        $qusntf = $data['quantidade'];

        if ($qusntf >= $quantd) {
            $sqlp = "UPDATE produtos set quantidade=quantidade-'$quantd' WHERE id ='$det';";
            mysqli_query($mysqli, $sqlp);
        } else {
            return print_r($nomep);
        }
    }

    // na primeira vez do loop cria a venda
    if ($i == 0) {
        $sql = "INSERT INTO vendas( id_clientes, dataV, qtdVenda, forma) VALUES ($nome, '$datav', '$total', '$forma')";
        mysqli_query($mysqli, $sql);
    }

    // descobre o id da última venda e coloca na variavel idx
    $sqlidultimav = "SELECT idvendas FROM `vendas` ORDER BY idvendas DESC LIMIT 1";
    $verfe = mysqli_query($mysqli, $sqlidultimav);
    $idv = mysqli_fetch_assoc($verfe);
    $idx = $idv['idvendas'];

    // descobre os dados do produro pelo seu nome
    $sqlid = "SELECT * FROM produtos WHERE nome='$nomep'";
    $querid = mysqli_query($mysqli, $sqlid);

    // adicina a tabela intePV o idprodutos, idvendas, quantidadeP, valorP
    while ($data = mysqli_fetch_assoc($querid)) {
        $det = $data['id'];

        $sqlintepv = "INSERT INTO intePV(idprodutos, idvendas, quantidadeP, valorP) VALUES ($det, $idx , '$quantd', '$valo')";
        mysqli_query($mysqli, $sqlintepv);
    }
}
