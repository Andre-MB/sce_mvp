<?php

include('../../helpers/protect.php');
include('../../helpers/conexao.php');

$filtro_sql = "";

if ($_POST["filtro"] != null) {
    $filtro = $_POST["filtro"];
    $filtro_sql = "WHERE id_clientes='$filtro' OR cnpj_cpf LIKE '%$filtro%' OR nome LIKE '%$filtro%' ";
}

$sql = "SELECT * FROM clientes $filtro_sql";
$query = mysqli_query($mysqli, $sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recomex | Clientes</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
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
                <h3>Meus Clientes</h3>
                <form method="POST" action="">
                    <input class="input_search" type="text" placeholder="Pesquise pelo nome, CNPJ/CPF ou e-mail" value="<?php echo $_POST["filtro"]; ?>" name="filtro">
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
                            $resNum = '';

                            if ($data['numero'] != '') {
                                $resNum = $data['numero'] . ", ";
                            }


                            echo "<tr >";
                            echo "<td class=\"pri\" >"   . $data['id_clientes'] . "</td>";
                            echo "<td>"   . $data['nome'] . "</td>";
                            echo "<td>"   . $data['cnpj_cpf'] . "</td>";
                            echo "<td>"   . $resNum . $data['endereco'] . ", " . $data['bairro'] . ", " . $data['cidade'] . "</td>";
                            echo "<td>"   . $data['email'] . "</td>";
                            echo "<td>"   . $data['celular'] . "</td>";
                            echo "<td class=\"penult\"  > <a href='../modal-de-editar/editecliente.php?id=$id' > <img src='../../../img/pencil.png' alt=''> </a> </td>";
                            echo "<td class=\"ult\"  > <a href='../../views/modal-de-confirmar-delete/modalconfdeletecliente.php?id=$id'>  <img src='../../../img/trash.png' alt=''> </a> </td>";
                        }


                        ?>
                    </tbody>

                </table>

                <?php
                if (mysqli_num_rows($query) == 0) {
                    echo "<div class='nenhumaNota' style='display: flex; 	justify-content: center; align-items: center;'>
                    <div class='divnenhumaNota' style='width: 300px'>
                        <img src='../../../img/pepicons-print_people.png' width='200px' alt=''>
                        <p> Nenhum cliente encontrado</p>
                    </div>
                </div>";
                }
                ?>

            </div>

        </div>
    </main>


    <!-- Modal de Adicionar Cliente -->
    <div id="add" class="modal">

        <form class="modal-content animate" method="POST" action="../../helpers/insertclient.php">

            <div class="container1">

                <div class="hed">
                    <h3>Novo Cliente</h3>
                    <div>
                        <button class="can" type="reset" onclick="document.getElementById('add').style.display='none'">Cancelar</button>
                        <button class="salv" type="submit">Salvar</button>
                    </div>
                </div>

                <div class="man">
                    <input type="text" oninput="validarCnpjCpf(this)" placeholder="CNPJ/CPF" name="cnpj_cpf" required>
                    <input type="text" oninput="semString(this)" placeholder="Inscrição estadual" name="inscrição_estadual" required>
                    <input type="text" placeholder="Nome do Cliente" name="name" required>
                    <input type="text" placeholder="Endereço" name="endereco" required>
                    <input type="text" oninput="semString(this)" placeholder="CEP" name="cep" required>
                    <input type="text" placeholder="Bairro" name="bairro" required>
                    <input type="text" oninput="semString(this)" placeholder="Número" name="numero">
                    <input type="text" placeholder="Cidade" name="cidade" required>
                    <input type="text" onblur="isEmailValida(this)" placeholder="E-mail" name="email" required>
                    <input type="text" oninput="isCelular(this)" placeholder="Celular" name="celular" required>
                </div>

            </div>

        </form>
    </div>

    <div id="alert" class="modal_alert">
        <h3>Cliente vinculado a uma compra não pode ser deletado</h3>
    </div>

    <div id="conf" class="modal_conf">
        <h3>Cliente deletado com sucesso</h3>
    </div>

    <div id="clienteadd" class="modal_conf">
        <h3>Cliente adicionado com sucesso</h3>
    </div>

    <div id="clienteedt" class="modal_conf">
        <h3>Cliente editado com sucesso</h3>
    </div>

    <div id="clienteerro" class="modal_alert">
        <h3>Cliente não adicionado, verifique se não tem dados semelhantes a outro</h3>
    </div>

    <div id="clientenedt" class="modal_alert">
        <h3>Cliente não editado, verifique se não tem dados semelhantes a outro</h3>
    </div>

    <?php
    if (!empty($_GET['alert'])) {
        echo "<script>
                    let alert = document.getElementById('alert');
                    alert.style.display = 'block';
                    alert.setAttribute('class', 'modal_alert animate__animated animate__bounceInRight')
                    setTimeout(()=>{alert.style.display = 'none'; location.href='../Clientes/clientes.php'}, 3000)
                </script>";
    }

    if (!empty($_GET['clienteerro'])) {
        echo "<script>
                    let alert = document.getElementById('clienteerro');
                    alert.style.display = 'block';
                    alert.setAttribute('class', 'modal_alert animate__animated animate__bounceInRight')
                    setTimeout(()=>{alert.style.display = 'none'; location.href='../Clientes/clientes.php'}, 3000)
                </script>";
    }

    if (!empty($_GET['conf'])) {
        echo "<script>
                    let conf = document.getElementById('conf');
                    conf.style.display = 'block';
                    conf.setAttribute('class', 'modal_conf animate__animated animate__bounceInRight')
                    setTimeout(()=>{conf.style.display = 'none'; location.href='../Clientes/clientes.php'}, 3000)
                </script>";
    }

    if (!empty($_GET['clienteadd'])) {
        echo "<script>
                    let conf = document.getElementById('clienteadd');
                    conf.style.display = 'block';
                    conf.setAttribute('class', 'modal_conf animate__animated animate__bounceInRight')
                    setTimeout(()=>{conf.style.display = 'none'; location.href='../Clientes/clientes.php'}, 3000)
                </script>";
    }

    if (!empty($_GET['clientenedt'])) {
        echo "<script>
                    let conf = document.getElementById('clientenedt');
                    conf.style.display = 'block';
                    conf.setAttribute('class', 'modal_alert animate__animated animate__bounceInRight')
                    setTimeout(()=>{conf.style.display = 'none'; location.href='../Clientes/clientes.php'}, 3000)
                </script>";
    }
    ?>

    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-solid-rounded/css/uicons-solid-rounded.css'>
    <script src="cliente.js"></script>

</body>

</html>