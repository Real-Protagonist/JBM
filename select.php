<?php

    @$select = $_POST['sexo'];
    

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <script src="lug/js/jquery.js"></script>
    <script src="lug/js/jquery.nice-select.js"></script>
    <link rel="stylesheet" href="lug/css/nice-select.css">
      
     
</head>
<body>
    <div class="container">
        <h2>***********Sexo/Gênero**********</h2>
    </div>

   <form action="#" method="POST">
    <select name="sexo" id="sexo">
        <option value="M">Masculino</option>
        <option value="F">Feminino</option>
        <option value="N/D">Prefiro não divulgar</option>
       
    </select>
    <input type="submit" value="enviar">
   </form>

   <br><br><br>



   <?php 

   if($select=="M"){
        echo "Grande Homem";
   }else{
    if($select=="F"){
        echo "Super Mulher";
    }else{
        echo "Filho da Puta";
    }
   }
    ?>





    <script>
//<link rel="stylesheet" href="lug/css/style.css">
        $(document).ready(function(){

            $('select').niceSelect();
        })


    </script>


</body>
</html>