<?php

include('../../helpers/protect.php');
include('../../helpers/conexao.php');

// $filtro_sql = "";

// if ($_POST["filtro"] != null) {
//     $filtro = $_POST["filtro"];
//     $filtro_sql = "WHERE id='$filtro' OR descricao LIKE '%$filtro%' OR nome LIKE '%$filtro%' ";
// }

$sql = "SELECT * FROM notas $filtro_sql";
$query = mysqli_query($mysqli, $sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recomex | Notas Fiscais</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="icon" type="image/x-icon" href="../../../img/logo_recomex_apenas_R.png">
</head>

<body>

    <header class="animate__animated animate__slideInLeft">

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

    <main class="animate__animated animate__slideInRight">
        <div class="container" style=" background: white; box-shadow: 8px 8px 4px rgba(0, 0, 0, 0.25)">
            <nav style="display: flex; justify-content:space-between; ">
                <div>
                    <h4>Minhas Notas Fiscais</h4>
                </div>
                <form method="POST" action="">
                    <input class="input_search" type="text" placeholder="Pesquise (Código, Nome, CNPJ/CPF ou Data)" value="<?php echo $_POST["filtro"]; ?>" name="filtro">
                </form>
            </nav>


            <div class="tabl">

                <table class="table">

                    <thead>
                        <th class="coluna-um" scope="col">Código</th>
                        <th scope="col">Nome</th>
                        <th scope="col">CNPJ/CPF</th>
                        <th scope="col">Cidade</th>
                        <th scope="col">Telefone</th>
                        <th scope="col">Data</th>
                    </thead>

                    <tbody class="tbody">

                    </tbody>

                </table>

                <?php
                if (mysqli_num_rows($query) == 0) {
                    echo "<div class='nenhumaNota' style='display: flex; justify-content: center; align-items: center;'>
                        <div class='divnenhumaNota' style='width: 400px'>
                            <img src=' ../../../img/NF-e.png' width='400px' alt=''>
                            <p> Nenhuma Nota Fical</p>
                        </div>
                    </div>";
                }
                ?>

            </div>

        </div>

    </main>

    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-solid-rounded/css/uicons-solid-rounded.css'>

</body>

</html>