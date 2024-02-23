<?php

include('../../helpers/protect.php');
include('../../helpers/conexao.php');

$sql = "SELECT * FROM clientes $filtro_sql";
$query = mysqli_query($mysqli, $sql);

if (!empty($_GET['id'])) {
    $idcliente = $_GET['id'];
    $sqlSelec = "SELECT * FROM clientes WHERE id_clientes=$idcliente";
    $result = mysqli_query($mysqli, $sqlSelec);
    // print_r($result); //mostra a query foi um sucesso;

    if ($result->num_rows > 0) {
        while ($user_data = mysqli_fetch_assoc($result)) {
            $cnpj_cpf = $user_data["cnpj_cpf"];
            $nome = $user_data["nome"];
            $insc = $user_data["inscrição_estadual"];
            $numero = $user_data["numero"];
            $cep = $user_data["cep"];
            $bairro = $user_data["bairro"];
            $endereco = $user_data["endereco"];
            $email = $user_data["email"];
            $cidade = $user_data["cidade"];
            $id = $user_data["id_clientes"];
        }
    } else {
        echo  "<script>alert('Não teve resposta!')</script>";
    }
}

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
                <h3>Meus Clientes</h3>
                <form method="POST" action="">
                    <input class="input_search" type="text" placeholder="Pesquise pelo nome, CNPJ/CPF ou e-mail" value="" name="filtro">
                </form>
                <button class="btn-add" onclick="document.getElementById('add').style.display='block'">Novo Cliente</button>

            </nav>

            <div class="tabl">
                <table class="table">
                    <thead>
                        <th scope="col">Código</th>
                        <th scope="col">Nome</th>
                        <th scope="col">CNPJ/CPF</th>
                        <th scope="col">Endereço</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">Celular</th>
                    </thead>
                    <tbody>
                        <?php
                        while ($data = mysqli_fetch_assoc($query)) {
                            $id = $data['id_clientes'];

                            echo "<tr >";
                            echo "<td class=\"pri\" >"   . $data['id_clientes'] . "</td>";
                            echo "<td>"   . $data['nome'] . "</td>";
                            echo "<td>"   . $data['cnpj_cpf'] . "</td>";
                            echo "<td>"   . $data['endereco'] . "</td>";
                            echo "<td>"   . $data['email'] . "</td>";
                            echo "<td>"   . $data['numero'] . "</td>";
                            echo "<td class=\"penult\"  > <a href='../modal-de-editar/edite.php?id=$id' > <img src='../../../img/pencil.png' alt=''> </a> </td>";
                            echo "<td class=\"ult\"  > <a href='../../helpers/deltecliente.php?id=$id'>  <img src='../../../img/trash.png' alt=''> </a> </td>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>


    <!-- Modal de Editar Cliente -->
    <div id="add" class="modal">

        <form class="modal-content animate" method="POST" action="../../helpers/save_edite_cliente.php">

            <div class="container1">

                <div class="hed">
                    <h3>Novo Cliente</h3>
                    <div>
                        <button class="can" type="reset"><a href="../Clientes/clientes.php">Cancelar</a></button>
                        <input class="salv" type="submit" name="upda" id="upda">
                    </div>
                </div>

                <div class="man">
                    <input type="text" placeholder="CNPJ/CPF" value="<?php echo $cnpj_cpf ?>" name="cnpj_cpf">
                    <input type="text" placeholder="Inscrição estadual" value="<?php echo $insc ?>" name="inscrição_estadual">
                    <input type="text" placeholder="Nome do Cliente" value="<?php echo $nome ?>" name="name">
                    <input type="text" placeholder="Número" value="<?php echo $numero ?>" name="numero">
                    <input type="text" placeholder="CEP" value="<?php echo $cep ?>" name="cep">
                    <input type="text" placeholder="Bairro" value="<?php echo $bairro ?>" name="bairro">
                    <input type="text" placeholder="Endereço" value="<?php echo $endereco ?>" name="endereco">
                    <input type="text" placeholder="Cidade" value="<?php echo $cidade ?>" name="cidade">
                    <input type="text" placeholder="E-mail" value="<?php echo $email ?>" name="email">
                    <input type="hidden" name="id" value="<?php echo $id ?>">
                </div>

            </div>

        </form>
    </div>

    <script>
        var modal = document.getElementById('add');

        window.onclick = function(event) {
            if (event.target === modal) {
                location.href = '../Clientes/clientes.php'
            }
        }
    </script>

    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-solid-rounded/css/uicons-solid-rounded.css'>

</body>

</html>