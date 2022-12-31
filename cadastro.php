<?php
 include_once("conexao.php");
 session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'js/vendor/autoload.php';

 $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);


    if(isset($_POST['cadastrar'])){
        
        if(empty($dados['pnome'])){
            $_SESSION['erroForm'] = '<div class="alert alert-danger" role="alert">
                <i class="dripicons-wrong me-2"></i>O campo <strong>Primeiro nome</strong> deve ser preenchido 
            </div>';
            
         } elseif(empty($dados['unome'])){
            $_SESSION['erroForm'] = '<div class="alert alert-danger" role="alert">
                <i class="dripicons-wrong me-2"></i>O campo <strong>Último nome</strong> deve ser preenchido 
            </div>';
            
         } elseif(empty($dados['email'])){
            $_SESSION['erroForm'] = '<div class="alert alert-danger" role="alert">
                <i class="dripicons-wrong me-2"></i>O campo <strong>Email</strong> deve ser preenchido 
            </div>';
         } elseif(empty($dados['pass'])){
            $_SESSION['erroForm'] = '<div class="alert alert-danger" role="alert">
            <i class="dripicons-wrong me-2"></i>O campo <strong>Password</strong> deve ser preenchido 
        </div>';
         } elseif(empty($dados['telefone'])){
            $_SESSION['erroForm'] = '<div class="alert alert-danger" role="alert">
                <i class="dripicons-wrong me-2"></i>O campo <strong>Telefone</strong> deve ser preenchido 
            </div>';
         }else{
                $query_user = "SELECT id FROM users WHERE email = :email LIMIT 1";
                $resultado = $conn->prepare($query_user);
                $resultado->bindparam(':email', $dados["email"], PDO::PARAM_STR);
                $resultado->execute();

                if(($resultado) AND ($resultado->rowCount() != 0)){
                    $_SESSION['erroEmailcad'] = '<div class="alert alert-danger" role="alert">
                    <i class="dripicons-wrong me-2"></i>Este <strong>Email</strong> já está cadastrado
                </div>';
                }else{
                    $query_usuario = "INSERT INTO users (primeiro_nome, ultimo_nome, sexo, nacionalidade, email, senha, chave, telefone, usuario) VALUES (:pnome, :unome, :sexo, :nacionalidade, :email, :senha, :chave, :telefone, :usuario) " ;
                    $cad_usuario = $conn->prepare($query_usuario);
                    $cad_usuario->bindparam(":pnome", $dados["pnome"], PDO::PARAM_STR);
                    $cad_usuario->bindparam(":unome", $dados["unome"], PDO::PARAM_STR);
                    $cad_usuario->bindparam(":sexo", $dados["sexo"], PDO::PARAM_STR);
                    $cad_usuario->bindparam(":nacionalidade", $dados["nacionalidades"], PDO::PARAM_STR);
                    $cad_usuario->bindparam(":email", $dados["email"], PDO::PARAM_STR);
                    $senha_crypt = password_hash($dados['pass'], PASSWORD_DEFAULT);
                    $cad_usuario->bindparam(":senha", $senha_crypt, PDO::PARAM_STR);
                    $chave = password_hash($dados["email"] . date("Y-m-d H:i:s"), PASSWORD_DEFAULT);
                    $cad_usuario->bindparam(":chave", $chave, PDO::PARAM_STR);
                    $cad_usuario->bindparam(":telefone", $dados["telefone"]);
                    $cad_usuario->bindparam(":usuario", $dados["usuarios"], PDO::PARAM_STR);
                
                    $cad_usuario->execute();
                
                    if($cad_usuario->rowCount()){

                        $mail = new PHPMailer(true);

                        try {
                            //Configurações do Servidor
                            $mail->CharSet = 'UTF-8';
                            //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      
                            $mail->isSMTP();                                            
                            $mail->Host       = 'smtp.mailtrap.io';                     
                            $mail->SMTPAuth   = true;                                   
                            $mail->Username   = '8c0197ed75255c';                     
                            $mail->Password   = '8c0b10abec12c0';                            
                            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            
                            $mail->Port       =  2525;     
                            
                            //Receptor
                            $mail->setFrom('Silvio@jabbamusic.com', 'Suporte Técnico Jabba Music');
                            $mail->addAddress($dados['email'], $dados['pnome']);     //Add a recipient
                           

                            //Content
                            $mail->isHTML(true);                                  //Set email format to HTML
                            $mail->Subject = 'Confirmar o E-mail - Cadastro jabbamusic';
                            $mail->Body    = "Prezado(a) " .$dados['pnome']. ".<br><br> Agradecemos a sua solicitação de cadastramento em nosso site! <br><br>
                            Para que possamos permitir o seu cadastro em nosso sistema, solicitamos a confirmação de email clicando no link abaixo: <br><br>
                            <a href='http://localhost/jabba/confirmar-email.php?chave=$chave ' >clique aqui</a> <br><br> Esta mensagem foi enviada a você pela empresa XXX.<br> Você está recebendo porque está cadastrado no banco de dados da empresa XXX
                             Nenhum e-mail enviado pela empresa XXX tem arquivos anexados ou solicita o preenchimento de senhas e informações cadastrais. <br><br>";

                            $mail->AltBody = "Prezado(a) " .$dados['pnome']. ". \n\nAgradecemos a sua solicitação de cadastramento em nosso site!\n\nPara que possamos permitir o seu cadastro em no sistema, solicitamos a confirmação
de email clicando no link abaixo: \n\n http:/localhost/jabba/confirmar-email.php?chave=$chave \n\nEsta mensagem foi enviada a você pela empresa XXX. \nVocê está recebendo porque está cadastrado no banco de dados
da empresa XXX nenhum e-mail enviado pela empresa XXX tem arquivos anexados ou solicita o preenchimento de senhas e informações cadastrais.\n\n";

                            $mail->send();

                            $_SESSION['cad'] = '<div class="alert alert-success" role="alert">
                            <i class="dripicons-wrong me-2"></i><strong>Cadastro</strong> realizado com sucesso. Aceda a sua caixa de e-mail para confirmar o seu cadastro.
                        </div>';

                        
                        } catch (Exception $e) {

                       $_SESSION['erroMail'] = "<div class='alert alert-danger' role='alert'>
                                <i class='dripicons-wrong me-2'></i> ERRO: usuário não cadastrado com sucesso. Erro causado por: {$mail->ErrorInfo}
                            </div>";
                           
                        }


                    }else{
                        $_SESSION['cad'] = '<div class="alert alert-success" role="alert">
                        <i class="dripicons-wrong me-2"></i><strong>Erro</strong> ao realizar o cadastro
                    </div>';
                    }
                }


                
             
             
        
        
        
         }











     }


 
 







?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Title -->
    <title>Jabba-Music | Cadastro</title>
    <!-- Favicon -->
    <link rel="icon" href="img/core-img/favicon.ico">
    <!-- Stylesheet -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="complement.css">


    <script src="lug/js/jquery.js"></script>
    <script src="lug/js/jquery.nice-select.js"></script>
    <link rel="stylesheet" href="lug/css/nice-select.css">

    
    
    


        
   
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
                        <a href="index.html" class="nav-brand logo">
                            <!-- <img src="img/core-img/logo.png" alt=""> -->
                            <p style="color:#fff">JABBA-MUSIC</p>
                        </a>
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
                                <ul>
                                    <li><a href="index.html">Home</a></li>
                                    <li><a href="event.html">Eventos</a></li>
                                    <li><a role="button" data-toggle="modal" data-target="#myModalPag">Doação</a></li>
                                    <li><a role="button" data-toggle="modal" data-target="#myModalUpload">Upload</a></li>
                                    <li><a href="contact.html">Contactos</a></li>
                                </ul>

                                <!-- Login/Register & Cart Button -->
                                <div class="login-register-cart-button d-flex align-items-center">
                                    <!-- Login/Register -->
                                    <div class="login-register-btn mr-50">
                                        <a href="login.html" id="loginBtn">Login / Cadastro</a>
                                    </div>
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
            <p>Faça upload das suas músicas e publicite seus eventos<p>
            <h2>Cadastro</h2>
        </div>
    </section>
    <!-- ##### Breadcumb Area End ##### -->
           
    <!-- ##### Login Area Start ##### -->
    <section class="login-area section-padding-100">
  
        <div class="container">
            <div class="row justify-content-center">
            <?php   
    if(isset($_SESSION['cad'])){
        echo @$_SESSION['cad'];
        unset($_SESSION['cad']);
    }
    if(isset($_SESSION['erroForm'])){
        echo @$_SESSION['erroForm'];
        unset($_SESSION['erroForm']);
    }
    if(isset($_SESSION['erroEmailcad'])){
        echo @$_SESSION['erroEmailcad'];
        unset($_SESSION['erroEmailcad']);
    }
    if(isset( $_SESSION['conf-cad'])){
        echo @ $_SESSION['conf-cad'];
        unset( $_SESSION['conf-cad']);
    }
    
                
            ?>
                <div class="col-12 col-lg-8">
                    <div class="login-content">
                        <!-- Login Form -->
                        <div class="login-form">
                            <form action="#" method="POST">
                                <div class="row">
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group ">
                                            <label for="firstName">Primeiro Nome</label>
                                            <input type="text" class="form-control" id="firstName" aria-describedby="fName" placeholder="Primeiro Nome"  name="pnome"  required>
                                        </div>
                                    </div>

                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group ">
                                            <label for="lastName">Último Nome</label>
                                            <input type="text" class="form-control" id="lastName" aria-describedby="lName" name="unome" placeholder="Último Nome" required>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-md-12">
                                        <div class="form-group c">
                                        <label for="sexo">Sexo</label><br>
                                            <select name="sexo" id="sexo">
                                                <option value="M">Masculino</option>
                                                <option value="F">Feminino</option>
                                                <option value="N/D">Prefiro não divulgar</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-md-12">
                                        <div class="form-group d">
                                        <label for="sexo">Nacionalidade</label><br>
                                            <select name="nacionalidades" id="nacionalidades">
                                                <option value="Angola">Angola</option>
                                                <option value="Cabo Verde">Cabo Verde</option>
                                                <option value="Sãp Tomé e principe">São Tomé e Principe</option>
                                            </select>
                                        </div>
                                    </div>
                                   
                                    <div class="col-sm-12 col-md-12">
                                        <div class="form-group e">
                                            <label for="exampleInputEmail1">Email</label>
                                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Introduza o seu melhor E-mail"  name="email"  required>
                                            <small id="emailHelp" class="form-text text-muted"><i class="fa fa-lock mr-2"></i>Não partilhamos seu e-mail com mais ninguém.</small>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-md-12">
                                        <div class="form-group f">
                                            <label for="exampleInputPassword1">Password</label>
                                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password"  name="pass"  required>
                                            
                                        </div>
                                    </div>
                                  

                                    <div class="col-sm-12 col-md-12">
                                        <div class="form-group h">
                                            <label for="firstName">Telefone</label>
                                            <input type="text" class="form-control" id="telefone" aria-describedby="fName" placeholder="telefone" name="telefone" size="15" max-width="15" required>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-md-12">
                                        <div class="form-group d">
                                        <label for="sexo">Usuário</label><br>
                                            <select name="usuarios" id="usuarios">
                                                <option value="Normal">Normal</option>
                                                <option value="Cantor(a)/Músico">Cantor(a)/Músico</option>
                                                <option value="Organizador(a) de Eventos">Organizador(a) de Eventos</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                   
                                   


                                           
                                            
                                       

                                 
                                    
                                </div>
                                <input type="submit" class="btn oneMusic-btn mt-30" name="cadastrar" />

                            </form><br>
                            <div class="bradcumbContent">
								<p>Já tem uma conta? Faça o <a href="login.html">login</a><p>
							</div>
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
                    <a href="index.html" class="nav-brand logo">
                        <!-- <img src="img/core-img/logo.png" alt=""> -->
                        <p style="color:#fff">JABBA-MUSIC</p>
                    </a>
                    <p class="copywrite-text"><a href="#">
                        Copyright &copy;2022 by <a href="https://startechcorp.com" target="_blank">StarTech Corp.</a>
                    </p>
                </div>

                <div class="col-12 col-md-6">
                    <div class="footer-nav">
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li><a href="event.html">Eventos</a></li>
                            <li><a href="contact.html">Contactos</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ##### Footer Area Start ##### -->

    <!-- ##### All Javascript Script ##### -->
    <!-- jQuery-2.2.4 js -->
    
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <!-- All Plugins js -->
    <script src="js/plugins/plugins.js"></script>
    <!-- Active js -->
    <script src="js/active.js"></script>

    
    <script>

        $(document).ready(function(){

            $('select').niceSelect();
        })
        
    </script>
  

        

</body>

</html>
