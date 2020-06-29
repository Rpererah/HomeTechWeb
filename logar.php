<?php
session_start();
$email=$_POST['email'];
$senha=$_POST['password'];



require __DIR__.'/vendor/autoload.php';
use Kreait\Firebase\Factory;

$factory = (new Factory)->withServiceAccount('hometech2020new-2d5b70a4658d.json');
$auth = $factory->createAuth();
    try {
        $signInResult = $auth->signInWithEmailAndPassword($email, $senha);
       
       $dados=$signInResult->idToken();
       $_SESSION["login"] = $email;
       $_SESSION["senha"] = $senha;
       $_SESSION["token"] = $dados;
       header('location:crud/index.php');
     } catch (Exception $e) {
        unset ($_SESSION['login']);
        unset ($_SESSION['senha']);
        unset ($_SESSION["token"]);
         echo 'Erro: ',  $e->getMessage(), "\n";
     }

?>