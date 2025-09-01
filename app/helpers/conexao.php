<?php
$usuario = 'andre';
$senha = 'magMys123';
$database = 'sce_teste';
$host = '192.168.2.19';

$mysqli = new mysqli($host, $usuario, $senha, $database);

if ($mysqli->error) {
    die("Falha ao conectar ao banco de dados; " . $mysqli->error);
} else {
    echo "<script> console.log('Conectado ao banco com sucesso!') </script>";
}
