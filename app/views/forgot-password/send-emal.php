<?php
	include("../../helpers/conexao.php");


	$erro = array();
if(isset($_POST["Recuperar"])){

	$email = $mysqli->escape_string($_POST["email"]);
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
    $erro[] = "E-mail inválido.";
  }

  $sql_code = "SELECT * FROM usuarios WHERE email = '$email'";
	  $result = $mysqli->query($sql_code) or die($mysqli->error);
    $row_usuario = $result->fetch_assoc();
    $total = $result->num_rows;

  if ($total == 0){
    $erro[] = "o e-mail informado não está cadastrado";
  }

  if(count($erro) == 0 && $total > 0){
    $codigo_recuperar = strtoupper(substr(md5(time()),0,4));
    echo"".$codigo_recuperar."";
  }



}
?>

<!DOCTYPE html>
<html lang="pt_BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/styles/global.css">
  <!-- <link rel="stylesheet" href="styeles/send-email.css"> -->
  <title>RECOMEX - Recuperar Senha</title>
</head>
<body>
<div class="card_send-email">
<div class= "banner-shield">
  <img src="assets/shield.svg" alt="">
  <p>Redefinição de senha de acesso</p>
</div>
<h1 class="message">Digite o seu e-mail no campo abaixo e lhe
enviaremos um código</h1>

<div class="input">

<form action="" method="POST">
	<input type="email" name="email" placeholder="Seu email" value="<?php echo $_POST["email"]?>">
	<input type="submit" value="Recuperar" name="Recuperar">
</form>

<div class="message_error">

  <?php
  if(count($erro) > 0){foreach($erro as $msg){echo"<p>$msg</p>";}}
  ?>
  </div>

</div>

</div>
</body>
</html>