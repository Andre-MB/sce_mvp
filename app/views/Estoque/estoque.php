<?php

include('../../helpers/protect.php');
include('../../helpers/conexao.php');

$filtro_sql = ""; // parâmetro de consulta
if ($_POST["filtro"] != null) {
    $filtro = $_POST["filtro"];
    $filtro_sql = "WHERE id='$filtro' OR descricao LIKE '%$filtro%' OR nome LIKE '%$filtro%' ";
}

// query de produtos
$sql = "SELECT * FROM produtos $filtro_sql";
$query = mysqli_query($mysqli, $sql);
// outra query de produtos, pois não funcionou usar a mesma query em outro mysqli_fetch_assoc
$querys = mysqli_query($mysqli, $sql);

// query de clientes pro modal de vendas
$sql_clientes = "SELECT * FROM clientes";
$quer = mysqli_query($mysqli, $sql_clientes);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recomex | Estoque</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/x-icon" href="../../../img/logo_recomex_apenas_R.png">
    <!-- <link rel="stylesheet" href="../../../styles/global.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-solid-rounded/css/uicons-solid-rounded.css'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="venda.js"></script>
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
        <div class="container">
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
                            $qunat = $data['quantidade'];
                            $id = $data['id'];

                            echo "<tr >";
                            echo "<td class=\"pri\" >"   . $data['id'] . "</td>";
                            echo "<td>"   . $data['nome'] . "</td>";
                            echo "<td>"   . $data['descricao'] . "</td>";
                            echo "<td>"   . $data['ncm'] . "</td>";
                            echo "<td>"   . str_replace(array(',', '.'), array('.', ','), $qunat) . ' ' . $data['unidade_de_medida'] . "</td>";
                            echo "<td>" . 'R$ '  . number_format($res, 2, ',', '.') . "</td>";
                            echo "<td >" . 'R$ '  . number_format($re, 2, ',', '.') . "</td>";
                            echo "<td class=\"penult\"  > <a href='../modal-de-editar/edite.php?id=$id' > <img src='../../../img/pencil.png' alt=''> </a> </td>";
                            echo "<td class=\"ult\"  > <a href='../../views/modal-de-confirmar-delete/modalconfdeleteproduto.php?id=$id'>  <img src='../../../img/trash.png' alt=''> </a> </td>";
                        }
                        ?>
                    </tbody>
                </table>

                <?php
                if (mysqli_num_rows($query) == 0) {
                    echo "<div class='nenhumaNota' style='display: flex; justify-content: center; align-items: center;'>
                        <div class='divnenhumaNota' style='width: 300px'>
                            <img src=' ../../../img/Group.png' width='200px' alt=''>
                            <p>Nenhum produto encontrado</p>
                        </div>
                    </div>";
                }
                ?>

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
                        <button class="can" onclick="location.href ='../Estoque/estoque.php'">Cancelar</button>
                        <button class="salv" type="submit">Salvar</button>
                    </div>
                </div>

                <div class="man">
                    <input type="text" placeholder="Nome do Produto" name="name" required>
                    <select name="unidade_de_medida" required>
                        <option value="">Unidade de Medida (Unidade, Kg, g, m, m², m³, l)</option>
                        <option value="un">Unidade(un)</option>
                        <option value="Kg">Quilograma(Kg)</option>
                        <option value="g">Grama(g)</option>
                        <option value="mg">Miligrama(mg)</option>
                        <option value="m">Metro(m)</option>
                        <option value="mm">Milímetro(mm)</option>
                        <option value="cm">Centímetro(cm)</option>
                        <option value="m²">Metro Quadrado(M²)</option>
                        <option value="m³">Metro Cúbico(M³)</option>
                        <option value="l">Litro(L)</option>
                        <option value="mL">Mililitro(L)</option>
                    </select>
                    <input type="text" oninput="semString(this)" placeholder="Quantidade" name="quantidade" required>
                    <input type="text" placeholder="Descrição (Cor, Tipo, Tamanho)" name="descricao">
                    <input type="text" oninput="semString(this)" placeholder="Custo (Preço de compra)" name="custo" required>
                    <input type="text" oninput="semString(this)" placeholder="Preço de Venda" name="preco" required>
                    <input type="text" oninput="semString(this)" placeholder="NCM" name="ncm">
                    <input type="text" placeholder="Origem" name="origem">
                </div>
            </div>
        </form>
    </div>

    <!-- Modal de Vender Produto  -->
    <div id="ven" class="modal">
        <form class="modal-content  animate" action="">

            <div class="container1">
                <div class="hed">
                    <h3>Vender Produto</h3>
                    <div>
                        <button class="can" onclick="location.href = '../Estoque/estoque.php'">Cancelar</button>
                        <button id="salv" class="salv" type="submit">Salvar</button>
                    </div>
                </div>

                <div class="man_ven">

                    <select class="nomedocliente" id="namev" name="namev" required>
                        <option value="">Nome do Cliente</option>
                        <?php
                        while ($datas = mysqli_fetch_assoc($quer)) {
                            $id = $datas['id_clientes'];
                            echo "<option value='$id' >" . $datas['nome'] . "</option>";
                        }
                        ?>
                    </select>

                    <div class="productos">

                        <select class="" name="nam" id="nivel">
                            <option value="">Produto</option>
                            <?php
                            while ($datas = mysqli_fetch_assoc($querys)) {
                                $id = $datas['id'];
                                $nomesv = $datas['nome'];
                                echo "<option value='$nomesv' >" . $nomesv . "</option>";
                            }
                            ?>
                        </select>

                        <input type="number" id="quantaee" placeholder="Quantidade" name="quantee" value="">

                        <input type="number" placeholder="Valor/Quantidade" name="valoe" value="">

                        <a onclick="addProduto()"><img src="../../../img/Group 5.png" alt=""></a>

                    </div>

                    <div class="prodt">

                        <div class="header_prodt">
                            <h5>Nome</h5>
                            <div class="child_header_prodt">
                                <h5>Quantidade</h5>
                                <h5>Valor/Quantidade</h5>
                                <h5>Total</h5>
                            </div>
                        </div>

                        <h5 class="pontos">•••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••</h5>

                        <div class="result_prodt">

                        </div>

                        <h4 id="total">Total da venda: R$ 0,00</h4>
                    </div>

                    <div class="footer">
                        <!-- <input type="text" placeholder="Forma de pagamento" class="formadepagamento" required> -->
                        <select name="" class="formadepagamento" required>
                            <option value="">Forma de pagamento</option>
                            <option value="Dinheiro">Dinheiro</option>
                            <option value="Boleto">Boleto</option>
                            <option value="Cartão de Débito">Cartão de Débito</option>
                            <option value="Cartão de Crédito">Cartão de Crédito</option>
                        </select>
                        <input type="date" placeholder="Data de Hoje" name="" id="date" required>
                    </div>

                </div>
            </div>
        </form>
    </div>

    <div id="alert" class="modal_alert">
        <h3>Produto vinculado a uma compra não pode ser deletado.</h3>
    </div>

    <div id="alertvenda" class="modal_alert">
        <h3></h3>
    </div>

    <div id="conf" class="modal_conf">
        <h3>Produto deletado com sucesso.</h3>
    </div>

    <div id="insert" class="modal_conf">
        <h3>Produto adicionado com sucesso.</h3>
    </div>

    <div id="edite" class="modal_conf">
        <h3>Produto editado com sucesso.</h3>
    </div>

    <div id="vendaconf" class="modal_conf">
        <h3>Venda efetuada sucesso.</h3>
    </div>

    <?php
    if (!empty($_GET['alert'])) {
        echo "<script>
                    let alert = document.getElementById('alert');
                    alert.style.display = 'block';
                    alert.setAttribute('class', 'modal_alert animate__animated animate__bounceInRight')
                    setTimeout(()=>{alert.style.display = 'none'; location.href='../Estoque/estoque.php'}, 3000)
                </script>";
    }

    if (!empty($_GET['conf'])) {
        echo "<script>
                    let conf = document.getElementById('conf');
                    conf.style.display = 'block';
                    conf.setAttribute('class', 'modal_conf animate__animated animate__bounceInRight')
                    setTimeout(()=>{conf.style.display = 'none'; location.href='../Estoque/estoque.php'}, 3000)
                </script>";
    }

    if (!empty($_GET['insert'])) {
        echo "<script>
                    let insert = document.getElementById('insert');
                    insert.style.display = 'block';
                    insert.setAttribute('class', 'modal_conf animate__animated animate__bounceInRight')
                    setTimeout(()=>{insert.style.display = 'none'; location.href='../Estoque/estoque.php'}, 3000)
                </script>";
    }

    if (!empty($_GET['edite'])) {
        echo "<script>
                    let edite = document.getElementById('edite');
                    edite.style.display = 'block';
                    edite.setAttribute('class', 'modal_conf animate__animated animate__bounceInRight')
                    setTimeout(()=>{edite.style.display = 'none'; location.href='../Estoque/estoque.php'}, 3000)
                </script>";
    }

    if (!empty($_GET['vendaconf'])) {
        echo "<script>
                    let edite = document.getElementById('vendaconf');
                    edite.style.display = 'block';
                    edite.setAttribute('class', 'modal_conf animate__animated animate__bounceInRight')
                    setTimeout(()=>{edite.style.display = 'none'; location.href='../Estoque/estoque.php'}, 3000)
                </script>";
    }
    ?>

    <script>
        var modal = document.getElementById('add');
        var modal2 = document.getElementById('ven');

        window.onclick = function(event) {
            if (event.target === modal2) {
                location.href = "../Estoque/estoque.php"
            }

            if (event.target === modal) {
                location.href = "../Estoque/estoque.php"
            }
        }

        function edti() {
            document.getElementById('edt').style.display = 'block';
        }


        // script do modal de venda
        $("#salv").click((e) => {
            e.preventDefault();
            let arrResultado = [];
            let dados = {
                nome_cliente: $('#namev').val(),
                itens: items,
                forma: $('.formadepagamento').val(),
                data: $('#date').val(),
            }

            $.post("recebe.php", dados, function(result, staus) {
                console.log(staus)
                console.log(result)
                arrResultado.push([result.slice(65)])
                produtoSemEstoque(arrResultado)
            })

        })

        function produtoSemEstoque(produto) {
            let arr = produto

            if (arr[0] != '') {
                let alert = document.getElementById('alertvenda');
                alert.style.display = 'block';
                alert.setAttribute('class', 'modal_alert animate__animated animate__bounceInRight')
                alert.childNodes[1].textContent = "Produto " + produto + " sem estoque"

                setTimeout(() => {
                    alert.style.display = 'none';
                }, 3000)
            } else {
                location.href = "../Estoque/estoque.php?vendaconf=vendaconf";
            }

        }
    </script>

</body>

</html>