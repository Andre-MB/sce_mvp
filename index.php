<?php
include('../sce_mvp/app/helpers/conexao.php');

if (isset($_POST['email']) || isset($_POST['senha'])) {

    if (strlen($_POST['email']) == null) {
        echo "Preencha seu e-mail";
    } else if (strlen($_POST['senha']) == null) {
        echo "Preencha sua senha";
    } else {

        $email = $mysqli->real_escape_string($_POST['email']);
        $senha = $mysqli->real_escape_string($_POST['senha']);

        $sql_code = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";

        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

        $quantidade = $sql_query->num_rows;

        if ($quantidade == 1) {

            $usuario = $sql_query->fetch_assoc();

            if (!isset($_SESSION)) {
                session_start();
            }

            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];

            header("Location: app/views/estoque.php");
        } else {
            echo "Falha ao logar! E-mail ou senha incorretos";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <nav style="width: 100vw; height: 6vh; background: #6F0000; box-shadow: 0px 8px 4px rgba(0, 0, 0, 0.25); display: flex; align-items: center;">
<<<<<<< HEAD
        <img src="../sce_mvp/img/logo_recomex2.png" height=" 40vh" alt="">
=======
        <img src="imagens/logo
        .png" height="40vh" alt="">
>>>>>>> branchBruno
    </nav>

    <main>

        <div class="p">
            <form action="" method="POST">

                <h1>Entrar</h1>

                <label for="email">E-mail:</label>
                <input type="text" name="email">

                <label for="password">Senha:</label>
                <input type="password" name="senha">

                <button type="submit">Enviar</button>
            </form>

            <div class="l"><span></span></div>

            <img src="../sce_mvp/img/Rectangle10.png" width=" 300px" height="300px" alt="">
        </div>

    </main>

    <style>
        * {
            margin: 0;
            padding: 0;
        }

        main {
            width: 100vw;
            height: 92vh;
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
        }

        form {
            width: 300px;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .p {
            width: 80vw;
            height: 40vh;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 80px;
        }

        .l {
            width: 1px;
            height: 500px;
            background-color: rgb(0, 0, 0);
        }
    </style>
</body>

</html>