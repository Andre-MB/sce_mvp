<?php

include('../../helpers/protect.php');
include('../../helpers/conexao.php');

$filtro_sql = "";

if ($_POST["filtro"] != null) {
    $filtro = $_POST["filtro"];
    $filtro_sql = "WHERE id='$filtro' OR descricao LIKE '%$filtro%' OR nome LIKE '%$filtro%' ";
}

$sql = "SELECT * FROM produtos $filtro_sql";
$query = mysqli_query($mysqli, $sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recomex | Clientes</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/x-icon" href="../../../img/logo_recomex_apenas_R.png">
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


    <!-- Modal de Adicionar Produto -->
    <div id="add" class="modal">

        <form class="modal-content animate" method="POST" action="../../helpers/insert.php">
            <div class="container1">
                <div class="hed">
                    <h3>Adicionar Produto</h3>
                    <div>
                        <button class="can" onclick="document.getElementById('add').style.display='none'">Cancelar</button>
                        <button class="salv" type="submit">Salvar</button>
                    </div>
                </div>

                <div class="man">
                    <input type="text" placeholder="Nome do Produto" name="name" required>
                    <input type="text" placeholder="UNID-Unidade" name="unidade_de_medida" required>
                    <input type="text" placeholder="Quantidade" name="quantidade" required>
                    <input type="text" placeholder="Descrição(Branco, Tipo, Tamanho)" name="descricao">
                    <input type="text" placeholder="Custo(Preço de compra)" name="custo" required>
                    <input type="text" placeholder="Preço de Venda" name="preco" required>
                    <input type="text" placeholder="NCM" name="ncm">
                    <input type="text" placeholder="Origem" name="origem">
                </div>
            </div>
        </form>
    </div>

    <!-- Modal de Vender Produto  -->
    <div id="ven" class="modal">
        <form class="modal-content  animate" method="POST" action="../../helpers/venda.php">
            <div class="container1">
                <div class="hed">
                    <h3>Vender Produto</h3>
                    <div>
                        <button class="can" onclick="document.getElementById('ven').style.display='none'">Cancelar</button>
                        <button class="salv" type="submit">Salvar</button>
                    </div>
                </div>

                <div class="man_ven">
                    <input type="text" placeholder="Nome do Produto" name="namev" required>
                    <input type="text" placeholder="Quantidade" name="quantidadev" required>
                    <input type="text" placeholder="Custo(Preço de compra)" name="custov" required>
                    <input type="text" placeholder="Preço de Venda" name="precov" required>
                </div>
            </div>
        </form>
    </div>



    <script>
        var modal = document.getElementById('add');
        var modal2 = document.getElementById('ven');

        window.onclick = function(event) {
            if (event.target === modal2) {
                modal2.style.display = "none";
            }

            if (event.target === modal) {
                modal.style.display = "none";
            }
        }

        function edti() {
            document.getElementById('edt').style.display = 'block';
        }
    </script>

    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-solid-rounded/css/uicons-solid-rounded.css'>

</body>

</html>