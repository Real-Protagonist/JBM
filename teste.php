<?php

    if(isset($_POST['enviar'])){
        
        $nome_artista = ucwords($_POST["nome"]);
        $titulo = ucwords($_POST["titulo"]);
        $estilo = ucwords($_POST["estilo"]);
        $musica = $_FILES['fmusica'];
        $img = $_FILES["fimagem"] ;


    }
        echo $nome_artista. "<br><br><br>" ;
        echo $titulo. "<br><br><br>" ;
        echo $estilo. "<br><br><br>" ;

        var_dump($img);
        echo "<br><br><br>" ;
        var_dump($musica);
?>

