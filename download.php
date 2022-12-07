<?php

if(!empty($_GET['file'])){
    $fileName = basename($_GET['file']);
    $nome = basename($_GET['nome'].'.mp3');
    $filePath = "Arquivos/musicas/".$fileName;

    if(!empty($fileName) && file_exists($filePath)){

        header("Cache-Control: public");
        header("Content-Descrition: File Transfer");
        header("Content-Disposition: attachment; filename=$nome");
        header("Content-Type: application/mp3");
        header("Content-Transfer-Encoding: binary");

        readfile($filePath);
        header("location:musica.php");
        exit;
    }
    else{
        echo"File not exist";
    }
}

?>