<?php

include("conexao.php");
session_start();

if(isset($_POST["enviar"]) && isset($_FILES["fmusica"]) && $_POST["titulo"] != "" ){

    $nome_artista = ucwords($_POST["nome"]);
    $titulo = ucwords($_POST["titulo"]);
    $estilo = ucwords($_POST["estilo"]);
    $musica = $_FILES['fmusica'];
    $img = $_FILES["fimagem"] ;
    $caminho1 = "Arquivos/img/capajabba.jpg";
    $cam = "capajabba.jpg";
    $enviar1 = false; 


    if(isset($_FILES['fimagem']) && ($img['name'] !="")){

        if(($img["error"] == intval(0)) && ($img["size"] < 5000000 )){
            $pasta1 = "Arquivos/img/";
            $nomeimg = $img['name'];
            $novoNomeimg = uniqid();
            $ex_permitidas = ["jpg", "jpeg", "png"];
            $extensao1 = explode('.', $img["name"]);
            $extensao1 = strtolower(end($extensao1));


            if(in_array($extensao1, $ex_permitidas)){
                $caminho1 = $pasta1 . $novoNomeimg .".". $extensao1;
                $cam = $novoNomeimg .".". $extensao1;
                $enviar1 = true;
            } else {
                $_SESSION["erro"] = "<strong>Erro: </strong>Tipo de imagem não aceite";
                header("location:cadastro-musica.php");
            }
        } else {
            $_SESSION["erro"] = "<strong>Erro: </strong>Falha ao enviar Imagem, verifiue o tamanho da imagem! máximo 5MB.";
            header("location:cadastro-musica.php");
        }
    }

    if(($musica['error'] == intval(0)) && ($musica['size'] < 12500000)){
        $pasta = "Arquivos/musicas/";
        $nomeMusica = $musica['name'];
        $novoNomeMusica = uniqid();
        $extensao =strtolower(pathinfo($nomeMusica, PATHINFO_EXTENSION));

        if($extensao !== "mp3"){
            $_SESSION["erro"] = "<strong>Erro: </strong> Tipo de musica não aceite";
            header("location:cadastro-musica.php");
        }else {
            $caminho = $pasta . $novoNomeMusica .".". $extensao;
            $novoNomeMusica = $novoNomeMusica .".". $extensao;
            $enviar = move_uploaded_file($musica['tmp_name'], $caminho);

            if($enviar1){
                $enviar1 = move_uploaded_file($img['tmp_name'], $caminho1);
            }
            
            if($enviar){
                $conexao->query("INSERT INTO tb_musica (titulo_musica, nome_artista, estilo, musica, capa) VALUE ('$titulo', '$nome_artista', '$estilo', '$novoNomeMusica', '$cam' )") or die($conexao->error);
                $_SESSION["sucesso"] = "<strong>Cadastro feito com sucesso.</strong> A tua musica ja se encontra na nossa lista.";
                header("location:musica.php");
            }
        }

    } else {
        $_SESSION["erro"] = "<strong>Erro: </strong> Falha ao enviar musica, verifiue o tamanho da música! máximo 10MB.";
        header("location:cadastro-musica.php");
    }
}else{
    $_SESSION["erro"] = "<strong>Erro: </strong> Preencha todos os campos.";
    header("location:cadastro-musica.php");
}


?>
