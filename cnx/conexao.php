<?php
$host = "localhost";
$user = "unacsa_pub";
$pass = "33Phobia33";
$bd = "unacsa_jbm";

$conexao = new mysqli($host, $user, $pass, $bd);

if ($conexao->connect_error) {
    echo "Erro na conexao ". $conexao->connect_error;
    exit();
}
// $cn = mysqli_connect("localhost", "unacsa_pub", "33Phobia33", "unacsa_jbm");
//     mysqli_set_charset($cn, 'utf8');
?>