<?php
$host = "localhost";
$user = "root";
$pass = "";
$bd = "jabba";

$conexao = new mysqli($host, $user, $pass, $bd);

if ($conexao->connect_errno) {
    echo "Erro na conexao ". $conexao->connect_erro;
    exit();
}




?>