<?php

include('../../helpers/protect.php');
include('../../helpers/conexao.php');

$sql = "SELECT * FROM produtos $filtro_sql";

$query = mysqli_query($mysqli, $sql);

if (!empty($_GET['id'])) {
    $idproduto = $_GET['id'];
    $sqlSelec = "SELECT * FROM produtos WHERE id=$idproduto";
    $result = mysqli_query($mysqli, $sqlSelec);
    // print_r($result); mostra a query foi um sucesso

    if ($result->num_rows > 0) {
        while ($user_data = mysqli_fetch_assoc($result)) {
            $nome = $user_data["nome"];
            $unidade_de_medida = $user_data["unidade_de_medida"];
            $quantidade = $user_data["quantidade"];
            $descricao = $user_data["descricao"];
            $custo = $user_data["custo"];
            $preco = $user_data["preco"];
            $ncm = $user_data["ncm"];
            $origem = $user_data["origem"];
        }
    } else {
        echo  "<script>alert('Não teve resposta!')</>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estoque</title>
    <link rel="stylesheet" href="edite.css">
</head>

<body>

    <header>

        <div class="logo">
            <img src="../../../img/logo_recomex2.png" height="40vh" alt="">
        </div>

        <a href="../Estoque/estoque.php">
            <div class="estoque">
                <img src="../../../img/icone_estoque.png" height="40vh" alt="">
                <h3>Estoque</h3>
            </div>
        </a>

        <a href="../Clientes/clientes.php">
            <div class="clientes">
                <img src="../../../img/typcn_group-outline.png" height="40vh" alt="">
                <h3>Clientes</h3>
            </div>
        </a>

        <a href="../Vendas/vendas.php">
            <div class="vendas">
                <img src="../../../img/arcticons_notebook.png" height="40vh" alt="">
                <h3>Histórico Vendas</h3>
            </div>
        </a>

        <a href="../Notas/notas.php">
            <div class="Notas">
                <img src="../../../img/ri_profile-fill.png" height="40vh" alt="">
                <h3>Notas Fiscais</h3>
            </div>
        </a>

    </header>

    <main>
        <div class="container" style=" background: white; box-shadow: 8px 8px 4px rgba(0, 0, 0, 0.25)">
            <nav style="display: flex; justify-content:space-between; ">
                <div>
                    <button class="btn-add" onclick="document.getElementById('add').style.display='block'">Adicionar produto</button>
                    <button class="btn-ven" onclick="document.getElementById('ven').style.display='block'">Vender produto </button>
                </div>
                <form method="POST" action="">
                    <input class="input_search" type="text" placeholder="Pesquise(Código, Nome ou Descrição)" value="<?php echo $_POST["filtro"]; ?>" name="filtro">
                </form>
            </nav>

            <div class="tabl">
                <table class="table">
                    <thead>
                        <th class="coluna-um" scope="col">Código</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">NCM</th>
                        <th scope="col">Quantidade</th>
                        <th scope="col">Custo</th>
                        <th scope="col">Preço</th>
                    </thead>
                    <tbody>
                        <?php
                        while ($data = mysqli_fetch_assoc($query)) {
                            $res = $data['custo'];
                            $re = $data['preco'];
                            $id = $data['id'];

                            echo "<tr >";
                            echo "<td class=\"pri\" >"   . $data['id'] . "</td>";
                            echo "<td>"   . $data['nome'] . "</td>";
                            echo "<td>"   . $data['descricao'] . "</td>";
                            echo "<td>"   . $data['ncm'] . "</td>";
                            echo "<td>"   . $data['quantidade'] . ' ' . $data['unidade_de_medida'] . "</td>";
                            echo "<td>" . 'R$ '  . number_format($res, 2, ',') . "</td>";
                            echo "<td >" . 'R$ '  . number_format($re, 2, ',') . "</td>";
                            echo "<td class=\"penult\"  > <a href='../modal-de-editar/edite.php?id=$id' > <img src='../../../img/pencil.png' alt=''> </a> </td>";
                            echo "<td class=\"ult\"  > <a href='../../helpers/delete.php?id=$id'>  <img src='../../../img/trash.png' alt=''> </a> </td>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <!-- Modal de Editar Produto -->
    <div id="edt" class="modal">

        <form class="modal-content animate" method="POST" action="../../helpers/save_edite.php"">
            <div class=" container1">
            <div class="hed">
                <h3>Editar Produto</h3>
                <div>
                    <button class="can"><a href="../stock/estoque.php">Cancelar</a></button>
                    <input class="salv" type="submit" name="upda" id="upda">
                </div>
            </div>

            <div class="man">
                <input type="text" placeholder="Nome do Produto" value="<?php echo $nome ?>" name="name">
                <input type="text" placeholder="UNID-Unidade" value="<?php echo $unidade_de_medida ?>" name="unidade_de_medida">
                <input type="text" placeholder="Quantidade" value="<?php echo $quantidade ?>" name="quantidade">
                <input type="text" placeholder="Descrição(Branco, Tipo, Tamanho)" value="<?php echo $descricao ?>" name="descricao">
                <input type="text" placeholder="Custo(Preço de compra)" value="<?php echo $custo ?>" name="custo">
                <input type="text" placeholder="Preço de Venda" value="<?php echo $preco ?>" name="preco">
                <input type="text" placeholder="NCM" value="<?php echo $ncm ?>" name="ncm">
                <input type="text" placeholder="Origem" value="<?php echo $origem ?>" name="origem">
                <input type="hidden" name="id" value="<?php echo $idproduto ?>">
            </div>
        </form>
    </div>

    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-solid-rounded/css/uicons-solid-rounded.css'>

</body>

</html>