
<?php

    session_start();
    ob_start();
    include_once("conexao.php");

    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    
    //echo password_hash(123456, PASSWORD_DEFAULT);
    
   if(!empty($dados['sendlogin'])){

        //var_dump($dados);
       $query_usuario =  "SELECT id, nome, usuario, senha_usuario FROM usuarios WHERE usuario =:usuario LIMIT 1";
       $resultado_usuario = $conn->prepare($query_usuario);
       $resultado_usuario->bindparam(':usuario', $dados['email'], PDO::PARAM_STR );
       $resultado_usuario->execute();
    
        if(($resultado_usuario) AND ($resultado_usuario->rowCount() != 0)){
            $row_usuario = $resultado_usuario->fetch(PDO::FETCH_ASSOC);
            if(password_verify($dados['senha'], $row_usuario['senha_usuario'])){
                $_SESSION['id'] = $row_usuario['id'];
                $_SESSION['nome'] = $row_usuario['nome'];
                $_SESSION['estado'] = "conectado";
                //recaptcha
                if(isset($_POST['g-recaptcha-response'])){

                    $secreattkey = "6LfFWRYhAAAAAEfB-ejK28EATauctdFNd_EHorMd";
                    $ip = $_SERVER['REMOTE_ADDR'];
                    $response = $_POST['g-recaptcha-response'];
                    $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secreattkey&response=$response&remoteip=$ip";
                    $fire = file_get_contents($url);
                    $data = json_decode($fire);
                    if($data->success){
                        header("location: index.php");
                    }else{
                        $_SESSION['msg'] = '<div class="alert alert-danger" role="alert">
                        <i class="dripicons-wrong me-2"></i> Por Favor Preencha o<strong> recaptcha</strong>
                    </div>';
 
                    }
            
                    //echo "existe..";
                }else{
                    echo "erro de recaptcha";
                }
                
              
            }else{
              //  $_SESSION['msg'] = "ERRO: Senha inválida";
                $_SESSION['msg'] = '<div class="alert alert-danger" role="alert">
                                        <i class="dripicons-wrong me-2"></i><strong>Senha inválida</strong> Por Favor tente novamente!
                                    </div>';
            }
        }
        else{
            $_SESSION['msg'] = '<div class="alert alert-danger" role="alert">
            <i class="dripicons-wrong me-2"></i><strong>Usuário inválido</strong> Por Favor tente novamente!
        </div>';
        }   
}else{

}


   

   //'".$dados['email']."'

   
?>


<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->


    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <!-- Title -->
    <title>Jabba-Music</title>

    <!-- Favicon -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="complement.css">

    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css">
    
    


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
                                <ul>
                                    <li><a href="index.html">Home</a></li>
                                    <!--<li><a href="albums-store.html">Albums</a></li>
                                    <li><a href="#">Pages</a>
                                        <ul class="dropdown">
                                            <li><a href="index.html">Home</a></li>
                                            <li><a href="albums-store.html">Albums</a></li>
                                            <li><a href="event.html">Events</a></li>
                                            <li><a href="blog.html">News</a></li>
                                            <li><a href="contact.html">Contact</a></li>
                                            <li><a href="elements.html">Elements</a></li>
                                            <li><a href="login.html">Login</a></li>
                                            <li><a href="#">Dropdown</a>
                                                <ul class="dropdown">
                                                    <li><a href="#">Even Dropdown</a></li>
                                                    <li><a href="#">Even Dropdown</a></li>
                                                    <li><a href="#">Even Dropdown</a></li>
                                                    <li><a href="#">Even Dropdown</a>
                                                        <ul class="dropdown">
                                                            <li><a href="#">Deeply Dropdown</a></li>
                                                            <li><a href="#">Deeply Dropdown</a></li>
                                                            <li><a href="#">Deeply Dropdown</a></li>
                                                            <li><a href="#">Deeply Dropdown</a></li>
                                                            <li><a href="#">Deeply Dropdown</a></li>
                                                        </ul>
                                                    </li>
                                                    <li><a href="#">Even Dropdown</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>-->
                                    <li><a href="event.html">Eventos</a></li>
                                    <li><a href="blog.html">News</a></li>
                                    <li><a href="contact.html">Contactos</a></li>
                                </ul>

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
            <p>Faça upload das suas músicas e publicite seus eventos<p>
            <h2>Login</h2>
        </div>
    </section>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Login Area Start ##### -->
    <section class="login-area section-padding-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-8">
                    <div class="login-content">
                        <h3>Bem-Vindo Devolta!</h3>

                         <!-- teste msg de erro -->
                            <?php
                                if(isset($_SESSION['msg'])){
                                    echo $_SESSION['msg'];
                                    unset($_SESSION['msg']);
                                }
                                if(isset($_SESSION['alt'])){
                                    echo $_SESSION['alt'];
                                    unset($_SESSION['alt']);
                                }
                                if(isset($_SESSION['alerta'])){
                                    echo $_SESSION['alerta'];
                                    unset($_SESSION['alerta']);
                                }
                            ?>

                        <!-- Login Form -->
                        <div class="login-form">
                            <form  method="POST" action="#">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input type="email" name="email" class="form-control" id="exampleInputEmail1"  value="<?php if(isset($dados['email'])){echo $dados['email']; } ?>" aria-describedby="emailHelp" placeholder="Introduza seu E-mail" required>
                                    <small id="emailHelp" class="form-text text-muted"><i class="fa fa-lock mr-2"></i>Não partilhamos seu e-mail com mais ninguém.</small>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" name="senha" class="form-control" id="exampleInputPassword1"  value="<?php if(isset($dados['senha'])){echo $dados['senha']; } ?>" placeholder="Password" required >
                                </div>

                                <div class="g-recaptcha" data-sitekey="6LfFWRYhAAAAAKYM-jXwcKR9Mmpe4JrDKXP4Csfk"></div>

                               
                                <input type="submit" name="sendlogin" class="btn oneMusic-btn mt-30" value="login" >
                            </form>
                            <br>
                            <a href="recuperar_senha.php">Esqueceu a sua senha?</a>
                            
                            <!--  <a type="submit" class="btn oneMusic-btn mt-30" href="cadastro.html">Cadastrar-se</a> -->
                            <div class="bradcumbContent">
								<p>Ainda não possui uma conta? Crie uma: <a href="cadastro.php"> criar conta</a><p>
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

   
</body>

</html>
