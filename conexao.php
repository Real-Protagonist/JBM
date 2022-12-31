<?php

$host = "localhost";
$user ="root";
$pass ="";
$dbname ="jabba";
$port = 3306;

try{
    //conexão com a porta
    $conn = new PDO("mysql:host=$host;port=$port;dbname=".$dbname, $user, $pass);
    //echo "Conexão realizada com sucesso";
}catch(PDOException $err){
    echo "Falha ao realizar a conexão com o Banco de dados. ERRO: " .$err->getMessage();
}