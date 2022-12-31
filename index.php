<?php 
session_start();

ob_start();
include("conexao.php");

if((!isset($_SESSION['id'])) AND (!isset($_SESSION['nome'])) AND (!isset($_SESSION['estado']))){
    header("Location: login.php");
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
                                <span id="span">-----------------------------------------------</span>
                                <!-- Login/Register & Cart Button -->
                                <div class="login-register-cart-button d-flex align-items-center">
                                    <!-- Login/Register -->


                                    <!-- começou aqui -- foto perfil -->
                                    <?php
                                        if($_SESSION['estado'] == "conectado"){
                                            ?>

                                                <div class="ts">
                                                <a href=""></a> <span>-------</span>
                                                </div>
                                               
                                                <div class="action">
                                                    <div class="fotoperfil">
                                                            <img src="img/Machya.jpg" alt="" onclick="menuToggle();">
                                                           <a href="#"> <img src="img/tbarra_64.png" alt="erro" class="activa" onclick="menuToggle();"></a>
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
                                        }
                                    ?>
                                    <br><br><br>
                                   
                                    
                                <!-- terminou aqui -- foto perfil-->



                                </div>
                            </div>
                            <!-- Nav End -->
                        </div>
                    </nav>
                </div>
            </div>
                <div class="boxlist">
                    <ul>
                        <li><a href="perfil+.php">Perfil</a></li>
                        <li><a href="">Configurações</a></li>
                        <li><a href="">views</a></li>
                        <li><a href="sair.php">Terminar sessão</a></li>
                    </ul>
                </div>
        </div>
    </header>
    <!-- ##### Header Area End ##### -->

    



      <!-- Janela Modal para Pagamento -->
      <div id="myModalPag" class="modal fade" role="dialog">
        <div class="modal-dialog">
          <!-- Conteudo Modal-->
          <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title">Doação</h6>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
              <h6 style="text-align: center;">
                <span class="alert alert-warning">Ajude a Manter o Site !</span>
              </h6>
              <br><span>
                Podes contribuir com uma doação, através do nosso endereço de IBAN de modo que possamos manter sempre o projecto <i style="font-weight:bold">Jabba-Music</i>:
              </span>
              <br>
              <br><h3 style="text-align: center; font-size: 110%">
                AO06.0006.0000.9755.7022.3017.9
                <p>STARTECH CORP</p>
              </h3>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-info" data-dismiss="modal">OK</button>
            </div>
          </div>
        </div>
      </div>

      <!-- Janela Modal para Upload -->
      <div id="myModalUpload" class="modal fade" role="dialog">
        <div class="modal-dialog">
          <!-- Conteudo Modal-->
          <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title">Doação</h6>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
              <h6 style="text-align: center;">
                <span class="alert alert-warning">Ajude a Manter o Site !</span>
              </h6>
              <br><span>
                Podes contribuir com uma doação, através do nosso endereço de IBAN de modo que possamos manter sempre o projecto <i style="font-weight:bold">Jabba-Music</i>:
              </span>
              <br>
              <br><h3 style="text-align: center; font-size: 110%">
                AO006.0006.0000.9755.7022.3017.9
                <p>STARTECH CORP</p>
              </h3>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-info" data-dismiss="modal">OK</button>
            </div>
          </div>
        </div>
      </div>

    <!-- ##### Hero Area Start ##### -->
    <section class="hero-area">
        <div class="hero-slides owl-carousel">
            <!-- Single Hero Slide -->
            <div class="single-hero-slide d-flex align-items-center justify-content-center">
                <!-- Slide Img -->
                <div class="slide-img bg-img" style="background-image: url(img/bg-img/bg-1.jpg);"></div>
                <!-- Slide Content -->
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="hero-slides-content text-center">
                                <h6 data-animation="fadeInUp" data-delay="100ms">Hits Recentes</h6>
                                <h2 data-animation="fadeInUp" data-delay="300ms">Jabba-Music <span>Jabba-Music</span></h2>
                                <!--<a data-animation="fadeInUp" data-delay="500ms" href="#" class="btn oneMusic-btn mt-50">Discover <i class="fa fa-angle-double-right"></i></a>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Single Hero Slide -->
            <div class="single-hero-slide d-flex align-items-center justify-content-center">
                <!-- Slide Img -->
                <div class="slide-img bg-img" style="background-image: url(img/bg-img/bg-2.jpg);"></div>
                <!-- Slide Content -->
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="hero-slides-content text-center">
                                <h6 data-animation="fadeInUp" data-delay="100ms">Festivais & Eventos</h6>
                                <h2 data-animation="fadeInUp" data-delay="300ms">Jabba-Music <span>Jabba-Music</span></h2>
                                <!--<a data-animation="fadeInUp" data-delay="500ms" href="#" class="btn oneMusic-btn mt-50">Discover <i class="fa fa-angle-double-right"></i></a>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Hero Area End ##### -->

    <!-- ##### Plays Start ##### -->
    <section class="oneMusic-buy-now-area has-fluid bg-gray section-padding-100">
            <div class="row">
                <!-- Single Album Area -->
                <div class="col-12 col-sm-6 col-md-4 col-lg-2">
                    <div class="single-album-area wow fadeInUp" data-wow-delay="100ms">
                        <div class="album-thumb">
                            <img src="img/bg-img/b1.jpg" alt="">
                            <div class="play-icon">
                                <a href="#" class="video--download--btn" onclick="playAud()">
                                    <span class="icon-play-button"></span>
                                </a>
                            </div>
                            <div class="down-icon">
                                <a href="#" class="video--play--btn">
                                    <span class="icon-download" download="C:\Users\VESPA\Music\06-Nzala Remake c- Paulo Flores.mp3"></span>
                                </a>
                            </div>
                        </div>
                        <div class="album-info">
                            <a href="#">
                                <h5>Zala - MC K</h5>
                            </a>
                            <audio id="audiplay" class="audioplay" src="C:\Users\VESPA\Music\06-Nzala Remake c- Paulo Flores.mp3">
                            </audio>
                            <p>Radio Station</p>
                        </div>
                    </div>
                </div>

                <!-- Single Album Area -->
                <div class="col-12 col-sm-6 col-md-4 col-lg-2">
                    <div class="single-album-area wow fadeInUp" data-wow-delay="200ms">
                        <div class="album-thumb">
                            <img src="img/bg-img/b2.jpg" alt="">
                        </div>
                        <div class="album-info">
                            <a href="#">
                                <h5>Noises</h5>
                            </a>
                            <p>Buble Gum</p>
                        </div>
                    </div>
                </div>

                <!-- Single Album Area -->
                <div class="col-12 col-sm-6 col-md-4 col-lg-2">
                    <div class="single-album-area wow fadeInUp" data-wow-delay="300ms">
                        <div class="album-thumb">
                            <img src="img/bg-img/b3.jpg" alt="">
                        </div>
                        <div class="album-info">
                            <a href="#">
                                <h5>Jess Parker</h5>
                            </a>
                            <p>The Album</p>
                        </div>
                    </div>
                </div>

                <!-- Single Album Area -->
                <div class="col-12 col-sm-6 col-md-4 col-lg-2">
                    <div class="single-album-area wow fadeInUp" data-wow-delay="400ms">
                        <div class="album-thumb">
                            <img src="img/bg-img/b4.jpg" alt="">
                        </div>
                        <div class="album-info">
                            <a href="#">
                                <h5>Noises</h5>
                            </a>
                            <p>Buble Gum</p>
                        </div>
                    </div>
                </div>

                <!-- Single Album Area -->
                <div class="col-12 col-sm-6 col-md-4 col-lg-2">
                    <div class="single-album-area wow fadeInUp" data-wow-delay="500ms">
                        <div class="album-thumb">
                            <img src="img/bg-img/b1.jpg" alt="">
                            <!-- Play Icon -->
                            <div class="play-icon">
                                <a href="#" class="video--play--btn"><span class="icon-play-button"></span></a>
                            </div>
                        </div>
                        <div class="album-info">
                            <a href="#">
                                <h5>Garage Band</h5>
                            </a>
                            <p>Radio Station</p>
                        </div>
                    </div>
                </div>

                <!-- Single Album Area -->
                <div class="col-12 col-sm-6 col-md-4 col-lg-2">
                    <div class="single-album-area wow fadeInUp" data-wow-delay="600ms">
                        <div class="album-thumb">
                            <img src="img/bg-img/b2.jpg" alt="">
                        </div>
                        <div class="album-info">
                            <a href="#">
                                <h5>Noises</h5>
                            </a>
                            <p>Buble Gum</p>
                        </div>
                    </div>
                </div>

                <!-- Single Album Area -->
                <div class="col-12 col-sm-6 col-md-4 col-lg-2">
                    <div class="single-album-area wow fadeInUp" data-wow-delay="100ms">
                        <div class="album-thumb">
                            <img src="img/bg-img/b3.jpg" alt="">
                        </div>
                        <div class="album-info">
                            <a href="#">
                                <h5>Jess Parker</h5>
                            </a>
                            <p>The Album</p>
                        </div>
                    </div>
                </div>

                <!-- Single Album Area -->
                <div class="col-12 col-sm-6 col-md-4 col-lg-2">
                    <div class="single-album-area wow fadeInUp" data-wow-delay="200ms">
                        <div class="album-thumb">
                            <img src="img/bg-img/b4.jpg" alt="">
                        </div>
                        <div class="album-info">
                            <a href="#">
                                <h5>Noises</h5>
                            </a>
                            <p>Buble Gum</p>
                        </div>
                    </div>
                </div>

                <!-- Single Album Area -->
                <div class="col-12 col-sm-6 col-md-4 col-lg-2">
                    <div class="single-album-area wow fadeInUp" data-wow-delay="300ms">
                        <div class="album-thumb">
                            <img src="img/bg-img/b1.jpg" alt="">
                            <!-- Play Icon -->
                            <div class="play-icon">
                                <a href="#" class="video--play--btn"><span class="icon-play-button"></span></a>
                            </div>
                        </div>
                        <div class="album-info">
                            <a href="#">
                                <h5>Garage Band</h5>
                            </a>
                            <p>Radio Station</p>
                        </div>
                    </div>
                </div>

                <!-- Single Album Area -->
                <div class="col-12 col-sm-6 col-md-4 col-lg-2">
                    <div class="single-album-area wow fadeInUp" data-wow-delay="400ms">
                        <div class="album-thumb">
                            <img src="img/bg-img/b2.jpg" alt="">
                        </div>
                        <div class="album-info">
                            <a href="#">
                                <h5>Noises</h5>
                            </a>
                            <p>Buble Gum</p>
                        </div>
                    </div>
                </div>

                <!-- Single Album Area -->
                <div class="col-12 col-sm-6 col-md-4 col-lg-2">
                    <div class="single-album-area wow fadeInUp" data-wow-delay="500ms">
                        <div class="album-thumb">
                            <img src="img/bg-img/b3.jpg" alt="">
                        </div>
                        <div class="album-info">
                            <a href="#">
                                <h5>Jess Parker</h5>
                            </a>
                            <p>The Album</p>
                        </div>
                    </div>
                </div>

                <!-- Single Album Area -->
                <div class="col-12 col-sm-6 col-md-4 col-lg-2">
                    <div class="single-album-area wow fadeInUp" data-wow-delay="600ms">
                        <div class="album-thumb">
                            <img src="img/bg-img/b4.jpg" alt="">
                        </div>
                        <div class="album-info">
                            <a href="#">
                                <h5>Noises</h5>
                            </a>
                            <p>Buble Gum</p>
                        </div>
                    </div>
                </div>
                
                <!-- Single Album Area -->
                <div class="col-12 col-sm-6 col-md-4 col-lg-2">
                    <div class="single-album-area wow fadeInUp" data-wow-delay="300ms">
                        <div class="album-thumb">
                            <img src="img/bg-img/b1.jpg" alt="">
                            <!-- Play Icon -->
                            <div class="play-icon">
                                <a href="#" class="video--play--btn"><span class="icon-play-button"></span></a>
                            </div>
                        </div>
                        <div class="album-info">
                            <a href="#">
                                <h5>Garage Band</h5>
                            </a>
                            <p>Radio Station</p>
                        </div>
                    </div>
                </div>
                
                <!-- Single Album Area -->
                <div class="col-12 col-sm-6 col-md-4 col-lg-2">
                    <div class="single-album-area wow fadeInUp" data-wow-delay="300ms">
                        <div class="album-thumb">
                            <img src="img/bg-img/b1.jpg" alt="">
                            <!-- Play Icon -->
                            <div class="play-icon">
                                <a href="#" class="video--play--btn"><span class="icon-play-button"></span></a>
                            </div>
                        </div>
                        <div class="album-info">
                            <a href="#">
                                <h5>Garage Band</h5>
                            </a>
                            <p>Radio Station</p>
                        </div>
                    </div>
                </div>
                
                <!-- Single Album Area -->
                <div class="col-12 col-sm-6 col-md-4 col-lg-2">
                    <div class="single-album-area wow fadeInUp" data-wow-delay="300ms">
                        <div class="album-thumb">
                            <img src="img/bg-img/b1.jpg" alt="">
                            <!-- Play Icon -->
                            <div class="play-icon">
                                <a href="#" class="video--play--btn"><span class="icon-play-button"></span></a>
                            </div>
                        </div>
                        <div class="album-info">
                            <a href="#">
                                <h5>Garage Band</h5>
                            </a>
                            <p>Radio Station</p>
                        </div>
                    </div>
                </div>
                
                <!-- Single Album Area -->
                <div class="col-12 col-sm-6 col-md-4 col-lg-2">
                    <div class="single-album-area wow fadeInUp" data-wow-delay="300ms">
                        <div class="album-thumb">
                            <img src="img/bg-img/b1.jpg" alt="">
                            <!-- Play Icon -->
                            <div class="play-icon">
                                <a href="#" class="video--play--btn"><span class="icon-play-button"></span></a>
                            </div>
                        </div>
                        <div class="album-info">
                            <a href="#">
                                <h5>Garage Band</h5>
                            </a>
                            <p>Radio Station</p>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-12">
                    <div class="load-more-btn text-center wow fadeInUp" data-wow-delay="300ms">
                        <a href="#" class="btn oneMusic-btn">Mais <i class="fa fa-angle-double-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Buy Now Area End ##### -->

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
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="js/bootstrap/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <!-- All Plugins js -->
    <script src="js/plugins/plugins.js"></script>
    <!-- Active js -->
    <script src="js/active.js"></script>

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

        <script>
            function menuToggle(){
                const toggleMenu = document.querySelector('.boxlist')
                toggleMenu.classList.toggle('active')
            }
        </script>

</body>

</html>
