<?php
if(isset($_GET['eSend'])){
  if($_GET['eSend']=='ok'){
    echo"<script>alert('Mensagem enviada com sucesso')</script>";
  }
  if($_GET['eSend']=='fail'){
    echo"<script>alert('Preencha corretamente todos os campos')</script>";
  }
}
?>
<?php
include_once("partials/header2.php");
include_once("contato.php");
include_once("equipe.php");
include_once("precos.php");
include_once("partials/Footer.php");
?>