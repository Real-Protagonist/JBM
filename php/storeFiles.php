<?php
    $altura = "748";
    $largura = "600";

    switch($_FILES['arquivo']['type']):
        case 'image/jpeg';
        case 'image/jpeg';
            $imagem_temporaria = imagecreatefromjpeg($_FILES['arquivo']['tmp_name']);
            $largura_original = imagesx($imagem_temporaria);
            $altura_original = imagesy($imagem_temporaria);
            $nova_altura = $altura ? $altura : floor(($altura_original / $altura_original) * $altura);
            $nova_largura = $largura ? $largura : floor(($largura_original / $altura_original) * $largura);

            $imagem_redimensionada = imagecreatetruecolor($nova_largura, $nova_altura);
            imagecopyresampled($imagem_redimensionada, $imagem_temporaria, 0,0,0,0,$nova_largura,
            $nova_altura, $largura_original, $altura_original);

            imagejpeg($imagem_redimensionada, 'arquivo/'.$_FILES['arquivo']['name']);
            echo "<img src='arquivo/'".$_FILES['arquivo']['name']. "'>";
        break;
    endswitch;
?>