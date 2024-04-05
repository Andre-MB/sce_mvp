<?php

include('../../helpers/protect.php');
include('../../helpers/conexao.php');

// query de produtos
$sql = "SELECT * FROM produtos";
$query = mysqli_query($mysqli, $sql);

if (!empty($_GET['id'])) {
    $idproduto = $_GET['id'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recomex | Estoque</title>
    <link rel="stylesheet" href="stylee.css">
    <link rel="icon" type="image/x-icon" href="../../../img/logo_recomex_apenas_R.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-solid-rounded/css/uicons-solid-rounded.css'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body>

    <header>

        <div class="logo">
            <img src="../../../img/logo_recomex2.png" height="40vh" alt="">
        </div>

        <a href="../Estoque/estoque.php">
            <div class="estoque foco">
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
                <h3>Histórico de Vendas</h3>
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

                <?php
                if (mysqli_num_rows($query) == 0) {
                    echo "Nenhum produto cadastrado";
                }
                ?>

            </div>
        </div>
    </main>

    <!-- Modal de Vender Produto  -->
    <div id="ven" class="modal">
        <form class="modal-content  animate" method="POST" action="../../helpers/delete.php">

            <div class="main_modal">
                <img src="../../../img/typcn_delete-outline.png" alt="">
                <h3>Deletar Produto ?</h3>
                <div>
                    <input type="hidden" name="id" value="<?php echo $idproduto ?>">
                    <button class="can"><a href="../Estoque/estoque.php">Cancelar</a></button>
                    <button class="salv" type="submit">Deletar</button>
                </div>
            </div>

        </form>
    </div>


    <script>
        var modal2 = document.getElementById('ven');

        window.onclick = function(event) {
            if (event.target === modal2) {
                location.href = "../Estoque/estoque.php"
            }
        }
    </script>

</body>

</html>