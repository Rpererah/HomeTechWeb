<?php
require __DIR__.'/vendor/autoload.php';
use Kreait\Firebase\Factory;

$factory = (new Factory)->withServiceAccount('tutorialphp-d2827-85a27a15c7cc.json');
$auth = $factory->createAuth();

$email='rafa@teste.com';
$clearTextPassword="";

try {
   $signInResult = $auth->signInWithEmailAndPassword($email, $clearTextPassword);
   echo "usuario logado";
} catch (Exception $e) {
    echo 'Exceção capturada: ',  $e->getMessage(), "\n";
}