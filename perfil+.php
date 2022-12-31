<?php
 include_once("conexao.php");
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
    <title>Jabba-Music | Cadastro</title>
    <!-- Favicon -->
    <link rel="icon" href="img/core-img/favicon.ico">
    <!-- Stylesheet -->
    <link rel="stylesheet" href="style+.css">
    <link rel="stylesheet" href="complement.css">


    <script src="lug/js/jquery.js"></script>
    
    <script src="lug/js/jquery.nice-select.js"></script>
    <link rel="stylesheet" href="lug/css/nice-select.css">

    
    <style>
        .form-group input{
            width:80%;
            margin-left:20%;
     
            margin:0 auto;
            padding:0px;
        }

    form div.form-group #pnome{
        margin: 0 auto;
        margin-left: 34%;
    
    }
    form div.form-group #unome{
        margin: 0 auto;
        margin-right: 54%;
    }
    form div.form-group #foto{
        margin: 0 auto;
        margin-right: 56%;
    }
    form div.form-group #email{
        margin: 0 auto;
        margin-left: 34%;
    
    }

    input.procurar{
        display:none;
    }
    
    label.buscar{
    padding:10px 10px;
    padding-right:80px;
    background-color:#1790d4;
    margin-left:1px;
    color:white;
    margin-top:30px;
    float:left;
    text-align: center;
    font-family: Georgia, 'Times New Roman', Times, serif;
    transition: 0.5s;
    cursor: pointer;
    font-size: 15px;
    border:1px solid #1790d4;
    border-radius: 5px;  
    }

    label.buscar:hover{
    color: #1790d4;
    background-color: white;
}

form  #alterar{
        margin: 0 auto;
        margin-left:40%;
    }

    </style>
    


        
   
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
                                                 <span>-------</span>
                                                </div>
                                               
                                               <div class="fotoperfil">
                                                    <img src="img/Machya.jpg" alt="" onclick="menuToggle();">
                                                    <a href="#"> <img src="img/tbarra_64.png" alt="erro" class="activa" onclick="menuToggle();"></a>
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
    
    <!-- ##### Breadcumb Area Start ##### -->
    <section class="breadcumb-area bg-img bg-overlay" style="background-image: url(img/bg-img/phone1.jpg);">
    <div class="bradcumbContent">
            <img src="img/Machya.jpg" alt="machya"  >
            
        </div>
        
    </section>
    <div class="inform">
        <h4>Kayla Smith 55</h4>
        <span>Luanda, Maianga</span>
        <span>Filipa Gomes</span> <br>
        <p>Organizadora de Eventos</p>
        
        
    </div>
   
    <!-- ##### Breadcumb Area End ##### -->

    <section class="short">
        <nav id="Navbar">
            <a href="perfil+"> Perfil</a>
            <a href="perfilcredit">Conta</a>
            <a href="other">#other</a>
 
            <div class="animation start-home"></div>
        </nav>
    </section>
   

           
    <!-- ##### Login Area Start #####


-->
 <div id="conteudo"> 
    <section class="login-area section-padding-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="editperfil">
					<form method="POST" action="#" ectype="multipart/form-data">
						<div class="row">
							<div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="pnome">Primeiro Nome</label>
                                    <input type="text" class="form-control" placeholder="" id="pnome" name="pnome"  value="<?php if(isset($_SESSION['estado'])){} ?>">
                                </div>
						    </div>
						
							<div class="col-sm-12 col-md-6">
								<div class="form-group">
									<label for="unome">Último Nome</label>
									<input type="text" placeholder="" class="form-control" id="unome" name="pnome"  value="<?php if(isset($_SESSION['estado'])){echo $_SESSION['id']; } ?>"   required>
								</div>
							</div>
							<div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="unome">senha</label>
                                    <input type="text" class="form-control" placeholder="" id="pnome" name="pnome">
                                </div>
						    </div>
						
							<div class="col-sm-12 col-md-6">
								<div class="form-group">
									<label for="unome">confirmar Senha</label>
									<input type="text" placeholder="" class="form-control" id="unome" name="pnome" required>
								</div>
							</div>

                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="E-mail">E-mail</label>
                                    <input type="text" class="form-control" placeholder="" id="email" name="pnome"  value="<?php if(isset($_SESSION['estado'])){echo $_SESSION['usuario']; } ?>">
                                </div>
						    </div><br><br><br><br><br>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="foto" class="buscar">seleccione a foto</label>
                                    <input type="file" class="form-control procurar" placeholder="" id="foto" name="arquivo">
                                </div>
						    </div>
							
							<input type="submit" class="btn oneMusic-btn mt-30" name="alterar" id="alterar" />
					</form>
                </div>
            </div>
        </div>
    </section>
    </div>  
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
              
    </script>
   
  
    <script type="text/javascript">
        
        /*$('#conteudo').load('perfil+.php');
        $('#Navbar a').click(function(){
            e.preventDefault(); 
            var page = $this.attr('href');
            $('conteudo').load(page + '.php');
        })*/
    </script>
        


        <script>
            function menuToggle(){
                const toggleMenu = document.querySelector('.boxlist')
                toggleMenu.classList.toggle('active')
            }
        </script>
</body>

</html>
