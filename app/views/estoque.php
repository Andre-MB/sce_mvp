<?php
include('../helpers/protect.php');
include('../helpers/conexao.php');

$sql = "SELECT * FROM produtos ORDER BY id ASC";

$query = mysqli_query($mysqli, $sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estoque</title>
</head>

<body>

    <header style="width: 100vw; height:6vh; background: #6F0000; box-shadow: 0px 8px 4px rgba(0, 0, 0, 0.25); display: flex; align-items: center; justify-content:space-between;">
        <img src="imagens/a1.png" height="40vh" alt="">
        <img src="imagens/Frame 13.png" height="40vh" alt="">
    </header>

    <main>
        <div class="container" style=" background: white; box-shadow: 8px 8px 4px rgba(0, 0, 0, 0.25)">
            <nav style="display: flex; justify-content:space-between; ">
                <div>
                    <button class="btn-add" onclick="document.getElementById('add').style.display='block'">Adicionar produto</button>
                    <button class="btn-ven" onclick="document.getElementById('ven').style.display='block'">Vender produto </button>
                </div>
                <input type=" search" name="" id="">
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

                            echo "<tr >";
                            echo "<td class=\"pri\" >"   . $data['id'] . "</td>";
                            echo "<td>"   . $data['nome'] . "</td>";
                            echo "<td>"   . $data['descricao'] . "</td>";
                            echo "<td>"   . $data['ncm'] . "</td>";
                            echo "<td>"   . $data['quantidade'] . ' ' . $data['unidade_de_medida'] . "</td>";
                            echo "<td>" . 'R$ '  . number_format($res, 2, ',') . "</td>";
                            echo "<td>" . 'R$ '  . number_format($re, 2, ',') . "</td>";
                            echo "<td class=\"ult\" > <img  src=\"imagens/charm_menu-kebab.svg\" height=\"15vh\" > </td>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>


    <!-- Modal de Adicionar Produto -->
    <div id="add" class="modal">
        <span onclick="document.getElementById('add').style.display='none'" class="close" title="Close Modal">&times;</span>

        <form class="modal-content animate" method="POST" action="../helpers/insert.php">
            <div class="container1">
                <div class="hed">
                    <h3>Adicionando Produto</h3>
                    <button type="submit">Salvar</button>
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
        <span onclick="document.getElementById('ven').style.display='none'" class="close" title="Close Modal">&times;</span>

        <form class="modal-content  animate" method="POST" action="">
            <div class="container1">
                <div class="hed">
                    <h3>Vender Produto</h3>
                    <button type="submit">Salvar</button>
                </div>

                <input type="text" placeholder="Nome do Produto" name="name" required>
                <input type="text" placeholder="UNID-Unidade" name="unidade_de_medida" required>
                <input type="text" placeholder="Quantidade" name="quantidade" required>
                <input type="text" placeholder="Custo(Preço de compra)" name="custo" required>
                <input type="text" placeholder="Preço de Venda" name="preco" required>
            </div>
        </form>
    </div>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-color: #dae4e6;
        }


        /* Main */
        main {
            height: 90vh;
            display: flex;
            justify-content: center;
            padding-top: 10px;
        }

        .container {
            width: 97%;
            height: 90vh;
            border-radius: 20px;
            padding: 10px;
        }

        .btn-add {
            min-width: 190px;
            background-color: #006653;
            border: none;
            border-radius: 10px;
            padding: 5px 40px;
            color: #fff;
        }

        .btn-add:hover {
            box-shadow: 2px 2px 2px #7a7a7a;
        }

        .btn-ven {
            min-width: 190px;
            background-color: rgba(255, 146, 0, 1);
            border: none;
            border-radius: 10px;
            padding: 5px 40px;
            color: #fff;
        }

        .btn-ven:hover {
            box-shadow: 2px 2px 2px #7a7a7a;
        }


        /* modal */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0, 0, 0);
            background-color: rgba(0, 0, 0, 0.4);
            padding-top: 60px;
        }

        .modal-content {
            background-color: #fefefe;
            margin: 5% auto 15% auto;
            padding: 15px;
            border-radius: 20px;
            width: 40%;
        }

        .hed {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        .hed>h3 {
            color: #7a7a7a;
        }

        .hed>button {
            background-color: #006653;
            border: none;
            border-radius: 15px;
            color: #fff;
            padding: 5px;
        }

        .man {
            display: grid;
            gap: 10px;
            grid-template-columns: auto auto auto auto;
        }

        input[name='name'] {
            grid-column: 1/5;
        }

        input[name='unidade_de_medida'] {
            grid-column: 1/3;
        }

        input[name='quantidade'] {
            grid-column: 3/5;
        }

        input[name='descricao'] {
            grid-column: 1/5;
        }

        input[name='custo'] {
            grid-column: 1/3;
        }

        input[name='preco'] {
            grid-column: 3/5;
        }

        input[name='ncm'] {
            grid-column: 1/2;
        }

        input[name='origem'] {
            grid-column: 2/5;
        }

        .man>input {
            background-color: rgba(217, 217, 217, 0.6);
            border: 1px solid #7B7B7B;
            border-radius: 5px;
            padding: 10px;
        }

        /* Animação do modal */
        .animate {
            -webkit-animation: animatezoom 0.6s;
            animation: animatezoom 0.6s
        }

        @-webkit-keyframes animatezoom {
            from {
                -webkit-transform: scale(0)
            }

            to {
                -webkit-transform: scale(1)
            }
        }

        @keyframes animatezoom {
            from {
                transform: scale(0)
            }

            to {
                transform: scale(1)
            }
        }

        /* Tabela */
        .tabl {
            height: 95%;
            margin-top: 10px;
            overflow-y: scroll;
        }


        .table {
            width: 98%;
            border-collapse: collapse;
            text-align: left;
        }

        th {
            color: #7a7a7a;
            font-size: 0.8em;
        }

        tr {
            border-top: 5px solid #fff;

        }

        td {
            background-color: rgba(255, 146, 0, 0.34);
        }

        .ult {
            padding-top: 5px;
            text-align: center;
            border-bottom-right-radius: 10px;
            border-top-right-radius: 10px;
        }

        .pri {
            border-top-left-radius: 10px;
            border-bottom-left-radius: 10px;
            padding-left: 5px;
        }

        html ::-webkit-scrollbar {
            width: 25px;
        }

        html ::-webkit-scrollbar-thumb {
            border-radius: 50px;
            border: 4px solid #ededed;
            background: #6F0000;
        }

        html ::-webkit-scrollbar-track {
            /* fundo */
            border-radius: 50px;
            background: #ededed;
        }

        @media (max-width:412px) {
            nav {
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                gap: 10px;
            }

            nav>div {
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                gap: 10px;
            }

            .modal-content {
                width: 80%;
            }


            .tabl {
                height: 80%;
                font-size: 0.6em;
            }

            th {
                font-size: 0.8em;
            }
        }

        @media (max-width:1130px) {

            .man {
                display: flex;
                flex-direction: column;
            }
        }
    </style>

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
    </script>

</body>

</html>