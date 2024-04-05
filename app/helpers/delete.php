<?php
include('../helpers/conexao.php');

if (!empty($_POST['id'])) {

    $idproduto = $_POST['id'];

    $sqlSelec = "SELECT * FROM produtos WHERE id=$idproduto";
    $result = mysqli_query($mysqli, $sqlSelec);
    // mostra a query foi um sucessso

    if ($result->num_rows > 0) {
        try {
            $s = "DELETE FROM produtos WHERE id=$idproduto";
            $r = mysqli_query($mysqli, $s);
            header('Location: ../views/Estoque/estoque.php?conf=conf');
        } catch (Throwable $th) {
            echo  "<script>
                        location.href = '../views/Estoque/estoque.php?alert=alert'
                    </script>";
        }
    } else {
        echo  "<script>alert('Produto não encontrado!')</script>";
    }
} else {
    header('Location: ../views/Estoque/estoque.php');
}
