

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Title -->
    <title>Jabba Music</title>
    <!-- Favicon -->
    <link rel="icon" href="img/core-img/favicon.ico">
    <!-- Stylesheet -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="complement.css">
   

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

    <!-- ##### Header ##### -->
    <header class="header-area">
        <!-- Navbar -->
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


                                    <!-- começou aqui -- foto perfil -->
                                    <?php
                                        if($_SESSION['estado'] == "conectado"){
                                            ?>

                                                <div class="ts">
                                                <a href="">Terminar sessão</a> <span>-------</span>
                                                </div>
                                               
                                               <div class="action">
                                                    <div class="fotoperfil">
                                                            <img src="img/Machya.jpg" alt="">
                                                           <!-- <a href="perfil+.php"> <img src="img/tbarra_64.png" alt="erro" class="activa"></a> -->
                                                    </div>
                                                    <div class="menu">
                                                    <h3>someone Famous <br> <span>Web designer</span> </h3>
                                                        <ul>
                                                            <li><a href="">My profile</a></li>
                                                            <li><a href="">My settings</a></li>
                                                            <li><a href="">My profile</a></li>
                                                            <li><a href="">My profile</a></li>
                                                            <li><a href="">My profile</a></li>
                                                            <li><a href="">My profile</a></li>
                                                        </ul>
                                                    </div>
                                               </div>
                                               
                                            <?php
                                        }else{
                                            ?>
                                            <div class="login-register-btn mr-50">
                                                <a href="login.html" id="loginBtn">Login / Cadastro</a>
                                            </div>

                                            <?php
                                        }
                                    ?>

                                    
                                <!-- terminou aqui -- foto perfil-->



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

    

    <!-- Play and Pause -->
    <script>
        var au = document.getElementById("audiplay");
        var ps = document.querySelector('.icon-play-button');
        ps.onclick = function () {
            if (ps.className == 'icon-play-button')
            {
                au.play();
                ps.className = 'icon-pause';
            }
            else
            {
                au.pause();
                ps.className = 'icon-play-button';
            }
            return false;
        };
    </script>



</body>

</html>
