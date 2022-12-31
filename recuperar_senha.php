
<?php
session_start();

ob_start();
include_once("conexao.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'js/vendor/autoload.php';
$mail = new PHPMailer(true);


$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);


if(!empty($_POST['sendrecuperar'])){
    //var_dump($dados);

    $query_usuario =  "SELECT id, nome, usuario  FROM usuarios WHERE usuario =:usuario LIMIT 1";
    $resultado_usuario = $conn->prepare($query_usuario);
    $resultado_usuario->bindparam(':usuario', $dados['email'], PDO::PARAM_STR );
    $resultado_usuario->execute();

    if(($resultado_usuario) AND ($resultado_usuario->rowCount() != 0)){
        $row_usuario = $resultado_usuario->fetch(PDO::FETCH_ASSOC);
        $chave_recuperar_senha = password_hash($row_usuario['id'], PASSWORD_DEFAULT);
        //echo "chave: $chave_recuperar_senha </br>";
        $query_up_usuario= "UPDATE usuarios SET recuperar_senha =:recuperar_senha WHERE id=:id LIMIT 1";
        $result_up_usuario = $conn->prepare($query_up_usuario);
        $result_up_usuario->bindparam(':recuperar_senha', $chave_recuperar_senha, PDO::PARAM_STR);
        $result_up_usuario->bindparam(':id', $row_usuario['id'], PDO::PARAM_INT);

        if($result_up_usuario->execute()){
          $link =  "http://localhost/jabba/actualizar_senha.php?chave=$chave_recuperar_senha";
           try {

                //Configurações do Servidor
                $mail->CharSet = 'UTF-8';
                $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      
                $mail->isSMTP();                                            
                $mail->Host       = 'smtp.mailtrap.io';                     
                $mail->SMTPAuth   = true;                                   
                $mail->Username   = '8c0197ed75255c';                     
                $mail->Password   = '8c0b10abec12c0';                            
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            
                $mail->Port       =  2525;     
                
                //Receptor
                $mail->setFrom('geral@jabbamusic.com', 'Suporte Técnico Jabba Music');
                $mail->addAddress($row_usuario['usuario'], $row_usuario['nome']);     //Add a recipient
                $mail->addAddress('ellen@example.com');               //Name is opcionali
                $mail->addReplyTo('info@example.com', 'Information');
                $mail->addCC('cc@example.com');
                $mail->addBCC('bcc@example.com');

                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = 'Jabba Music - Recuperar Senha';
                $mail->Body    = 'Estimado(a) '.$row_usuario['nome']. ",</br></br> você solicitou a alteração de senha. 
                </br></br> Para continuar o processo de recuperação de senha, clique no link abaixo ou cole o endereço no seu navegador 
                : </br></br> <a href='" .$link. "'> " .$link. " </a>  </br></br> se você não solicitou esta alteração, nenhuma acção é necessária. Sua senha permanecerá a mesma
                até que você active este código.</br></br>";
                $mail->AltBody = 'Estimado(a) '.$row_usuario['nome']. "\n\n você solicitou a alteração de senha. 
                \n\n\ Para continuar o processo de recuperação de senha, clique no link abaixo ou cole o endereço no seu navegador 
                : \n\n " .$link. " \n\nSe você não solicitou esta alteração, nenhuma acção é necessária. Sua senha permanecerá a mesma até que você active este código.\n\n ";

                $mail->send();

                $_SESSION['alerta']= '<div class="alert alert-info alert-dismissible fade show" role="alert">
                <i class="dripicons-wrong me-2"></i>Enviado email com instruções para<strong> recuperar a senha.</strong> Por Favor Aceda a sua caixa de email para recuperar a senha.
            </div>';
 
                header('Location: login.php');


            
        } catch (Exception $e) {
            echo  "ERRO: E-mail não enviado com sucesso. Mailer Error: {$mail->ErrorInfo}";
        }



        }else{
            $_SESSION['msg'] = '<div class="alert alert-danger" role="alert">
            <i class="dripicons-wrong me-2"></i> Por Favor tente novamente!
        </div>';
        }



    }else{
        $_SESSION['msg'] = '<div class="alert alert-danger" role="alert">
        <i class="dripicons-wrong me-2"></i><strong> E-mail não encontrado</strong> Por Favor tente novamente!
    </div>';
        

    }




}



?>


<!DOCTYPE html>
<html lang="pt">

<head>
<meta charset="UTF-8">
<meta name="description" content="">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

<!-- Title -->
<title>Jabba-Recuperar senha</title>

<!-- Favicon -->
<link rel="icon" href="img/core-img/favicon.ico">

<!-- Stylesheet -->
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="complement.css">

<link href="assets/css/icons.min.css" rel="stylesheet" type="text/css">
<link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="light-style">
<link href="assets/css/app-dark.min.css" rel="stylesheet" type="text/css" id="dark-style">



</head>

<body>
<!-- Preloader -->
<div class="preloader d-flex align-items-center justify-content-center">
    <div class="lds-ellipsis">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
    </div>
</div>

<!-- ##### Header Area Start ##### -->
<header class="header-area">
    <!-- Navbar Area -->
    <div class="oneMusic-main-menu">
        <div class="classy-nav-container breakpoint-off">
            <div class="container">
                <!-- Menu -->
                <nav class="classy-navbar justify-content-between" id="oneMusicNav">

                    <!-- Nav brand -->
                    <a href="index.html" class="nav-brand"><img src="img/core-img/logo.png" alt=""></a>

                    <!-- Navbar Toggler -->
                    <div class="classy-navbar-toggler">
                        <span class="navbarToggler"><span></span><span></span><span></span></span>
                    </div>

                    <!-- Menu -->
                    <div class="classy-menu">

                        <!-- Close Button -->
                        <div class="classycloseIcon">
                            <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                        </div>

                        <!-- Nav Start -->
                        <div class="classynav">
                            

                            <!-- Login/Register & Cart Button -->
                            <div class="login-register-cart-button d-flex align-items-center">
                                <!-- Login/Register -->
                                <div class="login-register-btn mr-50">
                                    <a href="login.html" id="loginBtn">Login / Cadastro</a>
                                </div>

                                <!-- Cart Button -->
                                <!--<div class="cart-btn">
                                    <p><span class="icon-shopping-cart"></span> <span class="quantity">1</span></p>
                                </div>-->
                            </div>
                        </div>
                        <!-- Nav End -->

                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- ##### Header Area End ##### -->

<!-- ##### Breadcumb Area Start ##### -->
<section class="breadcumb-area bg-img bg-overlay" style="background-image: url(img/bg-img/breadcumb3.jpg);">
    <div class="bradcumbContent">
        <p>Recuperação de senha<p>
        <h2>recovery</h2>
    </div>
</section>
<!-- ##### Breadcumb Area End ##### -->

<!-- ##### Login Area Start ##### -->
<section class="login-area section-padding-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
                <div class="login-content">
                    <h3>Recuperar senha</h3>

                     <!-- teste msg de erro -->
                     <?php
                                if(isset($_SESSION['msg'])){
                                    echo $_SESSION['msg'];
                                    unset($_SESSION['msg']);
                                }
                                if(isset($_SESSION['explink'])){
                                    echo $_SESSION['explink'];
                                    unset($_SESSION['explink']);
                                }
                            ?>
                    <br>
                    <!-- Login Form -->
                    <div class="login-form">
                        <form  method="POST" action="#">

                        <?php 
                                $email = "";

                                if(isset($dados['email'])){
                                   $usuario = $dados['email'];
                                 }
                            
                            ?>

                            <br>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="email" name="email" class="form-control" id="exampleInputEmail1"  value="<?php  ?>" aria-describedby="emailHelp" placeholder="Introduza seu E-mail" required>
                                <small id="emailHelp" class="form-text text-muted"><i class="fa fa-lock mr-2"></i>Não partilhamos seu e-mail com mais ninguém.</small>
                            </div>

                        <input type="submit" name="sendrecuperar" class="btn oneMusic-btn mt-30" value="recuperar" >

                        </form>
                        <br>
                            Lembrou a sua senha? <a href="login.php">clique aqui</a> para fazer login
                        
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ##### Login Area End ##### -->

<!-- ##### Footer Area Start ##### -->
<footer class="footer-area">
    <div class="container">
        <div class="row d-flex flex-wrap align-items-center">
            <div class="col-12 col-md-6">
                <a href="#"><img src="img/core-img/logo.png" alt=""></a>
                <p class="copywrite-text"><a href="#">
                    Copyright &copy;2022<!--<script>document.write(new Date().getFullYear());</script>--> by <a href="#" target="_blank">StarTech Corp.</a>
                </p>
            </div>

            <div class="col-12 col-md-6">
                <div class="footer-nav">
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Albums</a></li>
                        <li><a href="#">Eventos</a></li>
                        <li><a href="#">News</a></li>
                        <li><a href="#">Contactos</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- ##### Footer Area Start ##### -->

<!-- ##### All Javascript Script ##### -->
<!-- jQuery-2.2.4 js -->
<script src="js/jquery/jquery-2.2.4.min.js"></script>
<!-- Popper js -->
<script src="js/bootstrap/popper.min.js"></script>
<!-- Bootstrap js -->
<script src="js/bootstrap/bootstrap.min.js"></script>
<!-- All Plugins js -->
<script src="js/plugins/plugins.js"></script>
<!-- Active js -->
<script src="js/active.js"></script>

<!-- bundle -->
<script src="assets/js/vendor.min.js"></script>
<script src="assets/js/app.min.js"></script>


<!-- demo js -->
<script src="assets/js/pages/demo.toastr.js"></script>
<!-- -->
</body>

</html>
