<?php 
 $email_admin = "liamboyer12@gmail.com"
 $objet = "Contact via le site web";

 if(isset($_POST["envoyer"]) && !empty($_POST["envoyer"])){
    if(isset($_POST["nom"]) && !empty($_POST["nom"]) && !empty($_POST["email"]) && !empty($_POST["message"]) )

     $message = $_POST["message"];
     $header = 'Form'. $_POST["email"] . "\r\n" .
      "MIME-Version: 1.0' . "r\n\" .
      'Content-type: text/html; charset-utf-8';
  if(mail($email_admin,$objet,$contenu_message,$headers))
  {
   retunr header("location:index.php?success");
 }
   header("location:index.php?error");
?>
