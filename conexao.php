<?php
$host = "localhost";
$user = "root";
$pass = "";
$bd = "jabba";

$conexao = new mysqli($host, $user, $pass, $bd);

if ($conexao->connect_error) {
    echo "Erro na conexao ". $conexao->connect_error;
    exit();
}




?>