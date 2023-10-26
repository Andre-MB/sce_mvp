<?php

include("./app/helpers/conexao.php");

if(isset($_POST['ok'])){

	$novasenha = substr(md5(time()),0 , 6);


}

echo substr(md5(time()),0 , 6);

?>

<form action="">
	<input type="email" name="" id="" placeholder="Seu email">
	<input type="submit" value="ok" name="ok">
</form>