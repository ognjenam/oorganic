<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
// require_once '../../config/database.php';
// require_once '../../config/DB.php';

require_once(base_path().'/vendor/autoload.php');

function sendContactMail($to, $content, $name){

// $database = new DB(SERVER, DATABASE, USERNAME, PASS);

$mail = new PHPMailer(true);   // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'oorganicfoodshop@gmail.com';                 // SMTP username
    $mail->Password = 'kadzamirisujorgovani77';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('oorganicfoodshop@gmail.com', 'O \' organic Contact Form');
    $mail->addAddress('oorganicfoodshop@gmail.com');     // Add a recipient
    $mail->addReplyTo($to, 'Name: ' . $name);


    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'O \' organic Contact Form';
    $mail->Body    = $content;

    $mail->send();
    // echo 'Message has been sent!';
    return true;
} catch (Exception $e) {
    // echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    return false;
}
}





function changePassword($to, $content){

// $database = new DB(SERVER, DATABASE, USERNAME, PASS);

$mail = new PHPMailer(true);   // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'oorganicfoodshop@gmail.com';                 // SMTP username
    $mail->Password = 'kadzamirisujorgovani77';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('oorganicfoodshop@gmail.com', 'O \' organic Contact Form');
    $mail->addAddress($to);     // Add a recipient
    $mail->addReplyTo('oorganicfoodshop@gmail.com');


    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'O \' organic Contact Form';
    $mail->Body    = $content;

    $mail->send();
    // echo 'Message has been sent!';
    return true;
} catch (Exception $e) {
    // echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    return false;
}
}

 function OrderInfo($to, $content)
{
  // $database = new DB(SERVER, DATABASE, USERNAME, PASS);

  $mail = new PHPMailer(true);   // Passing `true` enables exceptions
  try {
      //Server settings
      $mail->SMTPDebug = 0;                                 // Enable verbose debug output
      $mail->isSMTP();                                      // Set mailer to use SMTP
      $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
      $mail->SMTPAuth = true;                               // Enable SMTP authentication
      $mail->Username = 'oorganicfoodshop@gmail.com';                 // SMTP username
      $mail->Password = 'kadzamirisujorgovani77';                           // SMTP password
      $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
      $mail->Port = 587;                                    // TCP port to connect to

      //Recipients
      $mail->setFrom('oorganicfoodshop@gmail.com', 'O \' organic Contact Form');
      $mail->addAddress($to);     // Add a recipient
      $mail->addReplyTo('oorganicfoodshop@gmail.com');


      //Content
      $mail->isHTML(true);                                  // Set email format to HTML
      $mail->Subject = 'O \' organic Contact Form';
      $mail->Body    = $content;

      $mail->send();
      // echo 'Message has been sent!';
      return true;
  } catch (Exception $e) {
      // echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
      return false;
  }
}
