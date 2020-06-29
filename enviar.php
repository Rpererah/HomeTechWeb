<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
?>
<!-- variaveis do campo de contato -->
<?php
$nome=$_POST['nome'];
$email=$_POST['email'];
$subject=$_POST['subject'];
$message=$_POST['message'];
$data_envio = date('d/m/Y');
$hora_envio = date('H:i:s');
?>
<?php 
if($nome!=null || $nome!="" && $email!=null || $email!="" && $message!=null || $message!=""){
?>
  <!--corpo do email a ser enviado-->
  <?php
  $arquivo="
  <style type='text/css'>
  body {
  margin:0px;
  font-family:Verdane;
  font-size:12px;
  color: #666666;
  }
  a{
  color: #666666;
  text-decoration: none;
  }
  a:hover {
  color: #FF0000;
  text-decoration: none;
  }
  </style>
    <html>
        <table width='510'>
            <tr>
  <tr>
                 <td width='500'>Nome:$nome</td>
                </tr>
                <tr>
                  <td width='320'>E-mail:<b>$email</b></td>
     </tr>
                <tr>
                  <td width='320'>Mensagem:$message</td>
                </tr>
            </td>
          </tr>  
          <tr>
            <td>Este e-mail foi enviado em <b>$data_envio</b> às <b>$hora_envio</b></td>
          </tr>
        </table>
    </html>
  ";
  ?>
  <!-- enviar email -->
  <?php
  // Load Composer's autoloader
  require 'vendor/autoload.php';
  
  // Instantiation and passing `true` enables exceptions
  $mail = new PHPMailer(true);
      //Server settings
      //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
      $mail->isSMTP();                                            // Send using SMTP
      $mail->Host       ='smtp.gmail.com';                    // Set the SMTP server to send through
      $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
      $mail->Username   = 'techhometech2020@gmail.com';                     // SMTP username
      $mail->Password   = '';  //digite a senha                             // SMTP password
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
      $mail->Port       = 465;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
  
      //Recipients
      $mail->setFrom($email,$nome);
      $mail->addAddress("techhometech2020@gmail.com","Grupo Hometech"); //email hometech
  // Add a recipient
  // Name is optional
  
      // Content
      $mail->isHTML(true);                                  // Set email format to HTML
      $mail->Subject = $subject;
      $mail->Body    = $arquivo;
      $mail->send();
  header('Location:contatoseprecos.php?eSend=ok#contact-section');
}
else{
  header('Location:contatoseprecos.php?eSend=fail#contact-section');  
}
?>