<?php
 include_once("conexao.php");
 

 include_once("headerperfil.php");
?>





    <!-- ##### Login Area Start #####


-->
    
    <section class="login-area section-padding-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="editperfil">
					<h5>#other_info</h5>
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
  
        <script>
            function menuToggle(){
                const toggleMenu = document.querySelector('.boxlist')
                toggleMenu.classList.toggle('active')
            }
        </script>
        

</body>

</html>
