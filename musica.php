<?php

include("conexao.php");

//$query = $conexao->query("SELECT * FROM tb_musica ORDER BY id DESC ;") or die($conexao->error);

$itens_p_pagina = 18;
if (!isset($_GET['pagina'])) {
    $pagina = 1;
}else{
    $pagina = intval($_GET['pagina']);
}
$start = ($pagina * $itens_p_pagina) - $itens_p_pagina;

$query = $conexao->query("SELECT * FROM tb_musica ORDER BY id DESC LIMIT $start, $itens_p_pagina") or die($conexao->error);
$num = $query->num_rows;

$num_total = $conexao->query("SELECT * FROM tb_musica")->num_rows;

$num_paginas = ceil($num_total/$itens_p_pagina);
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
    <section class="breadcumb-area bg-img bg-overlay bg-gray" style="background-image: url(img/bg-img/breadcumb4.jpg);">
        <div class="bradcumbContent">
            <h2>Musicas</h2>
        </div>
    </section>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Events Area Start ##### -->
    <section class="oneMusic-buy-now-area has-fluid bg-gray section-padding-100">
        <?php 
            session_start();
            if (isset($_SESSION["sucesso"])) 
        {?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php echo $_SESSION["sucesso"];
                    session_unset();
                 ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
        <?php
             }
        ?>

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

        <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item">
                    <a class="page-link" href="musica.php?pagina=1" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                    </li>
                    <?php for($i=0;$i<$num_paginas;$i++){
                        $estilo ="";
                        if($pagina==$i+1){
                            $estilo = "active";
                        }
                        ?>
                    <li class="page-item <?php echo $estilo; ?>"><a class="page-link " href="musica.php?pagina=<?php echo $i+1; ?>"><?php echo $i+1; ?></a></li>
                    <?php } ?>
                    <li class="page-item">
                    <a class="page-link" href="musica.php?pagina=<?php echo $num_paginas; ?>" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                    </li>
                </ul>
                </nav>

        <div class="row">
            
            <div class="col-12">
                <div class="load-more-btn text-center mt-70">
                    <a href="cadastro-musica.php" class="btn oneMusic-btn">Cadastrar Musica <i class="fa fa-angle-double-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>

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
                    <p class="copywrite-text">
						<a href="#">
							Copyright &copy;2022 by <a href="https://startechcorp.com" target="_blank">StarTech Corp.
						</a>
					</p>
                </div>

                <div class="col-12 col-md-6">
                    <div class="footer-nav">
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li><a href="blog.html">Eventos</a></li>
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

    <script src="tocar.js"></script>
</body>

</html>
