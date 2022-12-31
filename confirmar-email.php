<?php

session_start();
ob_start();
require_once("conexao.php");


$chave = filter_input(INPUT_GET, 'chave', FILTER_SANITIZE_STRING);

if(!empty($chave)){
    //echo "Chave: ------- $chave ------</br>";
    

    $query = "SELECT id,chave FROM users WHERE chave=:chave LIMIT 1";
    $exec = $conn->prepare($query);
    $exec->bindparam(":chave", $chave, PDO::PARAM_STR);
    $exec->execute();

    if(($exec) AND ($exec->rowCount() != 0)){
        $user = $exec->fetch(PDO::FETCH_ASSOC);
        extract($user);

        $query_user = "UPDATE users SET sits_usuario_id = 1, chave=:chave WHERE id = $id ";
        $update_user = $conn->prepare($query_user);
        $chave = NULL;
        $update_user->bindparam(':chave', $chave, PDO::PARAM_STR);
        if($update_user->execute()){
            $_SESSION['conf-cad'] = "<div class='alert alert-success' role='alert'>
        <i class='dripicons-wrong me-2'></i> E-mail confirmado</div>";
        header("Location: cadastro.php");
        }else{
            $_SESSION['conf-cad'] = "<div class='alert alert-danger' role='alert'>
            <i class='dripicons-wrong me-2'></i> E-mail não confirmado, por favor tente novamente </div>";
            header("Location: cadastro.php");
        }

    }else{
        $_SESSION['conf-cad'] = "<div class='alert alert-danger' role='alert'>
        <i class='dripicons-wrong me-2'></i> Endereço Inválido</div>";
        header("Location: cadastro.php");
    }
    



}
else{
    $_SESSION['conf-cad'] = "<div class='alert alert-danger' role='alert'>
    <i class='dripicons-wrong me-2'></i> Endereço Inválido</div>";
    header("Location: cadastro.php");
}

?>