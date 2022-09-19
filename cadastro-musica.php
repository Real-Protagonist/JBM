<?php
include("conexao.php");
session_start();
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Title -->
    <title>One Music - Modern Music HTML5 Template</title>
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
    <section class="breadcumb-area bg-img bg-overlay" style="background-image: url(img/bg-img/breadcumb3.jpg);">
        <div class="bradcumbContent">
            <p>Publicite sua Musica<p>
            <h3>Registro de Musicas</h3>
        </div>
    </section>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Login Area Start ##### -->
    <section class="login-area section-padding-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class=" col-lg-8 col-md-9 col-sm-12 d-block mx-auto" >


            <?php 
            
                if (isset($_SESSION["erro"])) 
            {?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?php echo $_SESSION["erro"];
                    session_unset();
                ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
            <?php
                }
            ?>



                    <form action="upload.php"  enctype="multipart/form-data" method="POST">
                        <div class="form-group pb-2">
                            <label for="titulo">Titulo da Musica*</label>
                            <input class="form-control" type="text" name="titulo" id="titulo" placeholder="Titulo da Musicas" required>
                        </div>

                        <div class="form-group pb-2">
                            <label for="nome_artista">Nome do Artista*</label>
                            <input class="form-control" type="text" name="nome" id="nome_artista" placeholder="Nome do Artista" required>
                        </div>

                        <div class="form-group pb-2">
                            <label for="estilo" >Estilo da Musica*</label>
                            <input class="form-control" type="text" name="estilo" id="estilo" placeholder="Estilo da musica" required>
                        </div>

                        <div class="custom-file pb-2">
                            <label class="custom-file-label">Selecione a capa da Musica</label>
                            <input class="custom-file-input" type="file" name="fimagem" accept=".jpg, .jpeg, .png">
                        </div>
                        <br><br>
                        <div class="custom-file pb-3">
                            <label class="custom-file-label">Selecione a Musica*</label>
                            <input class="custom-file-input" type="file" name="fmusica" accept=".mp3" required>
                        </div>
                        <br><br>
                        <input type="submit" class="btn btn-dark" name="enviar" value="Cadastrar Musica">
                    </form>
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
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="js/bootstrap/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <!-- All Plugins js -->
    <script src="js/plugins/plugins.js"></script>
    <!-- Active js -->
    <script src="js/active.js"></script>
    <script>
        $(document).ready(function (){
            $('#btnCad').click(function () {
                var fInput = document.getElementById('fileInput');
                fInput.click();
                
                // var imV = fInput.val();
                // alert(imV);
                // $.ajax({
                //     url:"uploadFile.php",
                //     method:"POST",
                //     data:{img:imV},
                //     success:function(data) {
                //         if (data == "OK")
                //             alert("Feito");
                //     }
                // });
            });

            document.getElementById('fileInput').addEventListener("change", function () {
                    alert(fInput.val());
                });
        });

        setTimeout(function(){
            $('.alert').alert('close');
        }, 6000);
    </script>
</body>
</html>
