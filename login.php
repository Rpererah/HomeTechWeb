<?php
    //require_once("classes/usuarios.php");
    //$u = new Usuario;
?>
<!doctype html>
<html lang="pt-br">
  <head>
    <title>HomeTech</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@400;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">


    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">

    <link rel="stylesheet" href="css/jquery.fancybox.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">

    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/loginstyle.css">

    <link rel="shortcut icon" href="images/icone3.png" >
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
    </head>
    <body>

        <div class="wrapper fadeInDown">
          <div id="formContent">
            <!-- Tabs Titles -->

            <!-- Icon -->
            <div class="fadeIn first">
              <img src="images/LHT3.png" id="icon" alt="User Icon" />
            </div>
            <div>
                <label class="fadeIn first">Login Administrativo</label>
            </div>

            <!-- Login Form -->
            <form method="POST" action="logar.php">
              <input type="email" id="email" class="fadeIn second" name="email" placeholder="exemplo@teste.com">
              <input type="password" id="password" class="fadeIn third" name="password" placeholder="Senha">
              <input type="submit" class="fadeIn fourth" value="Acessar">
            </form>

            <div id="formFooter">
              <a class="underlineHover" href="index.php">Voltar para Home</a>
            </div>

          </div>
        </div>

    </body>
</html>