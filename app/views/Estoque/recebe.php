<?php
include('../../helpers/conexao.php');

// $_SERVER['REQUEST_METHOD']

// echo json_encode($_POST["itens"]);

$nome = $_POST["nome_cliente"];
$datav = $_POST["data"];
$forma = $_POST["forma"];
$itens = $_POST["itens"];

// print_r($itens[0]["nome"]);
// print_r($itens);
// print_r(count($itens));

$total = 0;

for ($i = 0; $i <= count($itens); $i++) {
    $quantd = $itens[$i]["quantidades"];
    $valo = $itens[$i]["valo"];
    $total += $quantd * $valo;
}

for ($i = 0; $i <= count($itens); $i++) {
    $nomep = $itens[$i]["nome"];
    $quantd = $itens[$i]["quantidades"];
    $valo = $itens[$i]["valo"];

    print_r($i);

    if ($i == 0) {
        $sql = "INSERT INTO vendas( id_clientes, dataV, qtdVenda, forma) VALUES ($nome, '$datav', '$total', '$forma')";
        mysqli_query($mysqli, $sql);
        print_r('s');
    }

    $sqlidultimav = "SELECT idvendas FROM `vendas` ORDER BY idvendas DESC LIMIT 1";
    $verfe = mysqli_query($mysqli, $sqlidultimav);
    $idv = mysqli_fetch_assoc($verfe);
    $idx = $idv['idvendas'];

    $sqlid = "SELECT id FROM produtos WHERE nome='$nomep'";
    $querid = mysqli_query($mysqli, $sqlid);

    while ($data = mysqli_fetch_assoc($querid)) {
        $det = $data['id'];
        print_r($det);
        $sqlintepv = "INSERT INTO intePV(idprodutos, idvendas, quantidadeP) VALUES ($det, $idx , '$quantd')";
        mysqli_query($mysqli, $sqlintepv);
    }
}

// $sqlidultimav = "SELECT idvendas FROM `vendas` ORDER BY idvendas DESC LIMIT 1";
// $verfe = mysqli_query($mysqli, $sqlidultimav);
// $idv = mysqli_fetch_assoc($verfe);
// print_r($idv['idvendas']);
