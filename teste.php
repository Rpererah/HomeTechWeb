<?php
session_start();
if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true) and (!isset ($_SESSION['dados'])==true))
{
  unset($_SESSION['login']);
  unset($_SESSION['senha']);
  unset($_SESSION['dados']);
  header('location:login.php');
  }
  $logado=$_SESSION['login'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?='bem vindo ',$logado; ?>
    <br>
    <br>
    <a href='sair.php'>Sair</a>

    
</body>
</html>
