<?php

include("conexao.php");

$query = $conexao->query("SELECT * FROM tb_musica ORDER BY id DESC LIMIT 18") or die($conexao->error);

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
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/audioplayerbottom.css">
    <style>
        .owl-2-style .owl-dots .owl-dot span{
            display: none;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
                        <a href="index.php" class="nav-brand logo">
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
                                    <li><a href="index.php">Home</a></li>
                                    <li><a href="event.html">Eventos</a></li>
                                    <li><a href="musica.php">Musicas</a></li>
                                    <li><a role="button" data-toggle="modal" data-target="#myModalPag">Doação</a></li>
                                    <li><a role="button" data-toggle="modal" data-target="#myModalUpload">Upload</a></li>
                                    <li><a href="contact.php">Contactos</a></li>
                                </ul>
                                <!-- Login/Register & Cart Button -->
                                <div class="login-register-cart-button d-flex align-items-center">
                                    <!-- Login/Register -->
                                    <div class="login-register-btn mr-50">
                                        <a href="login.php" id="loginBtn">Login / Cadastro</a>
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
        <div class="row container">
            <h3>Musicas</h3>
        </div>
        <div class="row">

        <?php
             while ($dados = $query->fetch_assoc()) {
                $m = strtoupper($dados['nome_artista']." - ".$dados['titulo_musica']);
        ?>
            <!-- Single Album Area -->
            <div class="col-12 col-sm-6 col-md-4 col-lg-2">
                    <div class="single-album-area wow fadeInUp" data-wow-delay="100ms">
                        <div class="album-thumb">
                            <img src="<?php echo "Arquivos/img/".$dados['capa']; ?>" alt="">
                            <div class="play-icon">
                                <a href="#" class="video--download--btn">
                                    <span class="icon-play-button" id="play_<?php echo $dados['id'];?>" onclick="playM('play_<?php echo $dados['id'];?>', 'audiplay_<?php echo $dados['id'];?>')"></span>
                                </a>
                            </div>
                            <div class="down-icon">
                                <a href="download.php?file=<?php echo $dados['musica'];?>&nome=<?php echo $m;?>" class="video--play--btn">
                                    <span class="icon-download" download="<?php echo "Arquivos/musicas/".$dados['musica'];?>"></span>
                                </a>
                            </div>
                        </div>
                        <div class="album-info">
                            <a href="#">
                                <h5><?php echo $m;?></h5>
                            </a>
                            <audio id="audiplay_<?php echo $dados['id'];?>" class="audioplay" src="<?php echo "Arquivos/musicas/".$dados['musica'];?>">
                            </audio>
                        </div>
                    </div>
                </div>

            <?php } ?>

        </div>
            <div class="row">
                <div class="col-12">
                    <div class="load-more-btn text-center wow fadeInUp" data-wow-delay="300ms">
                        <a href="musica.php" class="btn oneMusic-btn">Ver Mais...<i class="fa fa-angle-double-right"></i></a>
                    </div>
                </div>
            </div>
    </section>
    <!-- ##### Buy Now Area End ##### -->

<!-- <section class="events-area oneMusic-buy-now-area has-fluid section-padding-100">
    <div class="row container mb-0 pb-2">
            <h3>Eventos</h3>
    </div>
    <div class="content py-0">
        <div class="site-section bg-left-half mb-5">
            <div class="container owl-2-style">      

                <div class="owl-carousel owl-2">

                    <div class="media-29101">
                        <div class=" single-event-area ">
                            <div class="event-thumbnail">
                                <img src="img/bg-img/e1.jpg" alt="Image" class="img-fluid">
                            </div>
                            <div class="event-text mt-0">
                                <h4>Wakanda</h4>
                                <h5 class="hh5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi</h5>
                                <div class="event-meta-data">
                                    <a href="#" class="event-place">Link Space - Kilamba</a>
                                    <a href="#" class="event-date">13 de Março, 2022</a>
                                </div>
                                <a href="#" class="btn see-more-btn">Mais Detalhes</a>
                            </div>
                        </div>
                    </div>

                    <div class="media-29101">
                        <div class=" single-event-area ">
                            <div class="event-thumbnail">
                                <img src="img/bg-img/e3.jpg" alt="Image" class="img-fluid">
                            </div>
                            <div class="event-text mt-0">
                                <h4>Wakanda</h4>
                                <h5 class="hh5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi</h5>
                                <div class="event-meta-data">
                                    <a href="#" class="event-place">Link Space - Kilamba</a>
                                    <a href="#" class="event-date">13 de Março, 2022</a>
                                </div>
                                <a href="#" class="btn see-more-btn">Mais Detalhes</a>
                            </div>
                        </div>
                    </div>

                    <div class="media-29101">
                        <div class=" single-event-area">
                            <div class="event-thumbnail">
                                <img src="img/bg-img/e2.jpg" alt="Image" class="img-fluid">
                            </div>
                            <div class="event-text mt-0">
                                <h4>Wakanda</h4>
                                <h5 class="hh5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi</h5>
                                <div class="event-meta-data">
                                    <a href="#" class="event-place">Link Space - Kilamba</a>
                                    <a href="#" class="event-date">13 de Março, 2022</a>
                                </div>
                                <a href="#" class="btn see-more-btn">Mais Detalhes</a>
                            </div>
                        </div>
                    </div>


                    <div class="media-29101">
                        <div class=" single-event-area">
                            <div class="event-thumbnail">
                                <img src="img/bg-img/e1.jpg" alt="Image" class="img-fluid">
                            </div>
                            <div class="event-text mt-0">
                                <h4>Wakanda</h4>
                                <h5 class="hh5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi</h5>
                                <div class="event-meta-data">
                                    <a href="#" class="event-place">Link Space - Kilamba</a>
                                    <a href="#" class="event-date">13 de Março, 2022</a>
                                </div>
                                <a href="#" class="btn see-more-btn">Mais Detalhes</a>
                            </div>
                        </div>
                    </div>

                    <div class="media-29101">
                        <div class=" single-event-area ">
                            <div class="event-thumbnail">
                                <img src="img/bg-img/e2.jpg" alt="Image" class="img-fluid">
                            </div>
                            <div class="event-text mt-0">
                                <h4>Wakanda</h4>
                                <h5 class="hh5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi</h5>
                                <div class="event-meta-data">
                                    <a href="#" class="event-place">Link Space - Kilamba</a>
                                    <a href="#" class="event-date">13 de Março, 2022</a>
                                </div>
                                <a href="#" class="btn see-more-btn">Mais Detalhes</a>
                            </div>
                        </div>
                    </div>

                    <div class="media-29101">
                        <div class=" single-event-area">
                            <div class="event-thumbnail">
                                <img src="img/bg-img/e3.jpg" alt="Image" class="img-fluid">
                            </div>
                            <div class="event-text mt-0">
                                <h4>Wakanda</h4>
                                <h5 class="hh5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi</h5>
                                <div class="event-meta-data">
                                    <a href="#" class="event-place">Link Space - Kilamba</a>
                                    <a href="#" class="event-date">13 de Março, 2022</a>
                                </div>
                                <a href="#" class="btn see-more-btn">Mais Detalhes</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

     </div>

    <div class="row">
        <div class="col-12">
            <div class="load-more-btn text-center wow fadeInUp" data-wow-delay="300ms">
                <a href="event.html" class="btn oneMusic-btn">Ver Mais...<i class="fa fa-angle-double-right"></i></a>
            </div>
        </div>
    </div>
</section> -->

    <section class="newsletter-testimonials-area bg-gray section-padding-100">
        <div class="container">
            <div class="row">

                <!-- Newsletter Area -->
                <div class="col-12 col-lg-6">
                    <div class="newsletter-area mb-100">
                        <div class="section-heading text-left mb-50">
                            <!--<p>See what’s new</p>-->
                            <h2>Subescreve-se para receber notificações</h2>
                        </div>
                        <div class="newsletter-form">
                            <form action="#">
                                <input type="search" name="search" id="newsletterSearch" placeholder="E-mail">
                                <button type="submit" class="btn oneMusic-btn">Subescrever <i class="fa fa-angle-double-right"></i></button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Testimonials Area -->
                <div class="col-12 col-lg-6">
                    <div class="testimonials-area mb-100 bg-img bg-overlay" style="background-image: url(img/bg-img/bg-3.jpg);">
                        <div class="section-heading white text-left mb-50">
                            <!--<p>See what’s new</p>-->
                            <h2>Comentários</h2>
                        </div>
                        <!-- Testimonial Slide -->
                        <div class="testimonials-slide owl-carousel">
                            <!-- Single Slide -->
                            <div class="single-slide">
                                <p>Nunca foi tão fácil encotrar uma diversão de festa de modo rápido...usando a Jabba-Music tudo fica mais prático e fácil.</p>
                                <div class="testimonial-info d-flex align-items-center">
                                    <div class="testimonial-thumb">
                                        <img src="img/bg-img/t1.jpg" alt="">
                                    </div>
                                    <p>William Smith, Usuário</p>
                                </div>
                            </div>
                            <!-- Single Slide -->
                            <div class="single-slide">
                                <p>Agora é mais rápido e fácil publicitar os eventos a nível nacional.</p>
                                <div class="testimonial-info d-flex align-items-center">
                                    <div class="testimonial-thumb">
                                        <img src="img/bg-img/a1.jpg" alt="">
                                    </div>
                                    <p>Isabel Rosa, Usuário</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- ##### Newsletter & Testimonials Area End ##### -->

    
    <!-- ##### Contact Area Start ##### -->
    <section class="contact-area section-padding-100 bg-img bg-overlay bg-fixed has-bg-img" style="background-image: url(img/bg-img/bg-2.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading white">
                        <!--<p>See what’s new</p>-->
                        <h2>Deixe a sua sua opinião</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <!-- Contact Form Area -->
                    <div class="contact-form-area">
                        <form action="#" method="post">
                            <div class="row">
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="name" placeholder="Nome">
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <input type="email" class="form-control" id="email" placeholder="E-mail">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="subject" placeholder="Assunto">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <textarea name="message" class="form-control" id="message" cols="30" rows="10" placeholder="Menssagem"></textarea>
                                    </div>
                                </div>
                                <div class="col-12 text-center">
                                    <button class="btn oneMusic-btn mt-30" type="submit">Enviar <i class="fa fa-angle-double-right"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Contact Area End ##### -->

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

    
    <div class="music-player">
        <div class="song-bar">
            <div class="song-info">
                <div class="image-container">
                    <img src="Arquivos/img/capajabba.jpg" alt="">
                </div>
                <div class="song-desc">
                    <p class="title">Dinheiro cumbo nosso</p>
                    <p class="artist">Filho do Zua</p>
                </div>
            </div>
            <div class="icons">
                <i class="fa-regular fa-heart"></i>
                <!-- <i class="fa-sharp fa-solid fa-compress"></i> -->
            </div>
        </div>
        <div class="progress-controller">
            <div class="control-bottons">
                <!-- 
                    Items comentados para funcionalidades futuras
                 -->
                <!-- <i class="fa-solid fa-shuffle"></i> -->
                <i class="fa-solid fa-backward-step"></i>
                <i class="play-pause fas fa-play"></i>
                <i class="fa-solid fa-forward-step"></i>
                <!-- <i class="fa-solid fa-arrow-rotate-left"></i> -->
            </div>
            <div class="progress-container">
                <span>0:30</span>
                <div class="progress-bar">
                    <div class="progress"></div>
                </div>
                <span>2:12</span>
            </div>
        </div>
        <div class="other-features">
            <!-- <i class="fa-solid fa-list"></i> -->
            <!-- <i class="fa-sharp fa-solid fa-desktop"></i> -->
            <div class="volume-bar">
                <i class="fa-sharp fa-solid fa-volume-low"></i>
                <div class="progress-bar">
                    <div class="progress"></div>
                </div>
            </div>
        </div>
    </div>


    
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
    <script src="tocar.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>
