<?php
use PHPMailer\PHPMailer\PHPMailer;

require_once 'phpmailer/Exception.php';
require_once 'phpmailer/PHPMailer.php';
require_once 'phpmailer/SMTP.php';

$mail = new PHPMailer(true);

$alert = '';

if(isset($_POST['submit'])){
  $name = $_POST['name'];
  $email = $_POST['email'];
  $subject = $_POST['subject'];
  $message = $_POST['message'];

  try{
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'zaozao930@gmail.com'; // Gmail address which you want to use as SMTP server
    $mail->Password = 'kskmgghsphrktxqd'; // Gmail address Password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = '587';

    $mail->setFrom('zaozao930@gmail.com'); // Gmail address which you used as SMTP server
    $mail->addAddress('zaozao930@gmail.com'); // Email address where you want to receive emails (you can use any of your gmail address including the gmail address which you used as SMTP server)

    $mail->isHTML(true);
    $mail->Subject = 'Message recu du site Dabid Badel';
    $mail->Body = "<h3>Name : $name <br>Email: $email <br>Subject: $subject <br>Message : $message</h3>";

    $mail->send();
    echo "
    <script>
    alert('Message envoyé avec succès');
    document.location.href = 'index.php';
    </script>
    ";
  } catch (Exception $e){
    echo "Le message n'a pas pu être envoyé. Erreur de l'expéditeur : {$mail->ErrorInfo}" ;
  }
}
?>
