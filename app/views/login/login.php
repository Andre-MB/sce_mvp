<?php
include('../../helpers/conexao.php');

if (isset($_POST['email']) || isset($_POST['senha'])) {

    if (strlen($_POST['email']) == null) {
        echo "<script>alert('Preencha seu E-mail!')</script>";
    } else if (strlen($_POST['senha']) == null) {
        echo "<script>alert('Preencha sua senha!')</script>";
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

            header("Location: ../stock/estoque.php");
        } else {
            echo  "<script>alert('Falha ao logar! E-mail ou senha incorretos!')</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recomex | Login</title>
    <link rel="stylesheet" href="style-login.css">
    <link rel="icon" type="image/x-icon" href="../../../img/logo_recomex_apenas_R.png">
</head>

<body>


    <!-- <nav style="width: 100vw; height: 6vh; background: #6F0000; box-shadow: 0px 8px 4px rgba(0, 0, 0, 0.25); display: flex; align-items: center;">
        <img src="../sce_mvp/img/logo_recomex2.png" height=" 40vh" alt="">
        <img src="imagens/logo
        .png" height="40vh" alt="">
    </nav> -->

    <nav id="nav-home">
        <a class="button-logo" href="../../../index.php">
            <img width="140px" height="40vh" src="../../../img/logo_recomex2.png" alt="">
        </a>
    </nav>


    <main>

        <div class="p">
            <form action="" method="POST">

                <h1>Entrar</h1>

                <div class="email-login-page">
                    <label class="text-inputs" for="email">E-mail:</label>
                    <input class="style-input" type="text" name="email" placeholder="e-mail">
                </div>

                <div class="password-login-page">
                    <label class="text-inputs" for="password">Senha:</label>
                    <a class="button-forget-password" href="app/views/forgot-password/send-emal.php">Esqueceu a senha?</a>
                    <input class="style-input" type="password" name="senha" placeholder="senha">
                </div>

                <button class="button-login" type="submit">Entrar</button>

            </form>

            <div class="l"><span></span></div>

            <img src="../../../img/Rectangle10.png" width=" 400px" height="400px" alt="">
        </div>

    </main>

</body>

</html>