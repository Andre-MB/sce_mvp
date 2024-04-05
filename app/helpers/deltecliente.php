<?php
include('../helpers/conexao.php');

if (!empty($_POST['id'])) {
    $idcliente = $_POST['id'];

    $sqlSelec = "SELECT * FROM clientes WHERE id_clientes=$idcliente";
    $result = mysqli_query($mysqli, $sqlSelec);
    // print_r($result); mostra a query foi um sucesso

    if ($result->num_rows > 0) {
        try {
            $s = "DELETE FROM clientes WHERE id_clientes=$idcliente";
            $r = mysqli_query($mysqli, $s);
            header('Location: ../views/Clientes/clientes.php?conf=conf');
        } catch (Throwable $th) {
            echo  "<script>
                        location.href = '../views/Clientes/clientes.php?alert=alert'
                    </script>";
        }
    } else {
        echo  "<script>alert('Cliente não excluio!')</script>";
    }
} else {
    header('Location: ../views/Clientes/clientes.php');
}
