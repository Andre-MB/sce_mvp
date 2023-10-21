<?php
include("../../helpers/conexao.php")

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/styles/global.css">
  <link rel="stylesheet" href="styeles/send-email.css">
  <title>Document</title>
</head>
<body>
<div class="card_send-email">
<div class= "banner-shield">
  <img src="assets/shield.svg" alt="">
  <p>Redefinição de senha de acesso</p>
</div>
<h1 class="message">Digite o seu e-mail no campo abaixo e lhe
enviaremos um código</h1>
</div>

<div class="input">
<input class="send-email" type="email" placeholder="email">
<button id="button_enter">Enviar</button>
</div>



</body>
</html>
