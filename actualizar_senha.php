<?php

    session_start();
    ob_start();
    include_once("conexao.php");



    $chave = filter_input(INPUT_GET, 'chave', FILTER_DEFAULT);
    //var_dump($chave);

    if(!empty($chave)){
        $query_usuario =  "SELECT id FROM usuarios WHERE recuperar_senha =:recuperar_senha LIMIT 1";
        $resultado_usuario = $conn->prepare($query_usuario);
        $resultado_usuario->bindparam(':recuperar_senha', $chave, PDO::PARAM_STR );
        $resultado_usuario->execute();

        if(($resultado_usuario) AND ($resultado_usuario->rowCount() != 0)){
            $row_usuario = $resultado_usuario->fetch(PDO::FETCH_ASSOC);
            $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
            
            if(!empty($dados['sendnovasenha'])){
                $senha= password_hash($dados['senha'], PASSWORD_DEFAULT);
                $recuperar_senha = "NULL";
 
                $query_up_usuario= "UPDATE usuarios SET senha_usuario =:senha, recuperar_senha =:recuperar_senha WHERE id=:id LIMIT 1";
                $result_up_usuario = $conn->prepare($query_up_usuario);
                $result_up_usuario->bindparam(':senha', $senha, PDO::PARAM_STR);
                $result_up_usuario->bindparam(':recuperar_senha', $recuperar_senha);
                $result_up_usuario->bindparam(':id', $row_usuario['id'], PDO::PARAM_INT);

                if($result_up_usuario->execute()){
                    
                    header('Location: login.php');
                    $_SESSION['alt'] = '<div class="alert alert-success" role="alert">
                    <i class="dripicons-wrong me-2"></i><strong>Senha</strong> actualizada com sucesso
                    </div>';

                    
                }else{
                    $_SESSION['alt'] = '<div class="alert alert-danger" role="alert">
                    <i class="dripicons-wrong me-2"></i> Tente Novamente
                </div>';;
                }





            }else{
                //teste bloanco
            }
        }else{
            $_SESSION['msg'] = '<div class="alert alert-danger" role="alert">
            <i class="dripicons-wrong me-2"></i><strong> Link Inválido!</strong> solicite novo link para recuperar
        </div>';
            header('Location: recuperar_senha.php');
            $_SESSION['explink'] = '<div class="alert alert-danger" role="alert">
            <i class="dripicons-wrong me-2"></i><strong> Link Inválido!</strong> solicite novo link para recuperar
        </div>';
        }
    }else{
        $_SESSION['msg'] = '<div class="alert alert-danger" role="alert">
        <i class="dripicons-wrong me-2"></i><strong> Link Inválido!</strong> solicite novo link para recuperar
    </div>';
        
        header('Location: recuperar_senha.php');
    }

   

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jabba-Actualizar senha</title>
</head>
<body>
    
</body>
</html>



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
            <p>Faça upload das suas músicas e publicite seus eventos<p>
            <h2><h1>Actualizar senha</h1></h2>
        </div>
    </section>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Login Area Start ##### -->
    <section class="login-area section-padding-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-8">
                    <div class="login-content">
                        <h3>Actualize a sua senha</h3>

                         <!-- teste msg de erro -->
                            <?php
                                if(isset($_SESSION['msg'])){
                                    echo $_SESSION['msg'];
                                    unset($_SESSION['msg']);
                                }
                            ?>

                        <!-- Login Form -->
                        <div class="login-form">
                            <form  method="POST" action="#">

                            <?php 
                                $usuario = "";

                                if(isset($dados['senha'])){
                                   $usuario = $dados['senha'];
                                 }
                            
                            ?>
                               
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" name="senha" class="form-control" id="exampleInputPassword1"  value="<?php echo $usuario; ?>" placeholder="Digite a nova senha" required >
                                </div>

                                

                               
                                <input type="submit" name="sendnovasenha" class="btn oneMusic-btn mt-30" value="Actualizar" >
                            </form>
                            <br>
                            Lembrou a sua senha? <a href="login.php">clique aqui</a> para fazer login
                            <!--  <a type="submit" class="btn oneMusic-btn mt-30" href="cadastro.html">Cadastrar-se</a> -->
                           
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
