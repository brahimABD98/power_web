<?php
include "C:/wamp64/www/projet/cores/clientC.php";
$host="localhost";
$user="root";
$password="";
$db="mybase";

$con = mysqli_connect($host,$user,$password,$db);
if(isset($_POST['email'])){

    $sql="select * from client where email='".$_POST['email']."'limit 1";

    $result=mysqli_query($con,$sql);

    if(!$result || mysqli_num_rows($result) == 1)
    {
      
      
      session_start();
        $_SESSION['email']=$_POST['email'];
        $retrive=mysqli_fetch_array($result);
      
        $id=$retrive['id_client'];
        $_SESSION['nom']=$retrive['nom'];
       
        
        $mdp=$retrive['mdp'];
        session_destroy();
           
      require("C:/wamp64/www/projet/viewsFO/login/PHPMailer-master/src/Exception.php");           
      require("C:/wamp64/www/projet/viewsFO/login/PHPMailer-master/src/PHPMailer.php");
      require("C:/wamp64/www/projet/viewsFO/login/PHPMailer-master/src/SMTP.php");

    


        $mail = new PHPMailer\PHPMailer\PHPMailer();
        $mail->IsSMTP(); // enable SMTP
    
$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);

        $mail->SMTPDebug = 4; // debugging: 1 = errors and messages, 2 = messages only
        $mail->SMTPAuth = true; // authentication enabled
        $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
        $mail->Host = "smtp.gmail.com";
        $mail->Port = 465; // or 587
        $mail->IsHTML(true);
        $mail->Username = "boh.azertih@gmail.com";
        $mail->Password = "liberta@2k9 AB";
        $mail->SetFrom("boh.azertih@gmail.com");
        $mail->Subject = "Password Recovery";
        $mail->Body = "Voici votre mot de passe '".$mdp."' ";
        $mail->AddAddress($_POST['email']);
    
         if(!$mail->Send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
         } else {
            
          echo ("<script LANGUAGE='JavaScript'>
          window.alert('Check your email');
          window.location.href='login.php';
               </script>");
         
          }
           exit();
        

    }
    else{
        
   
    echo ("<script LANGUAGE='JavaScript'>
                 window.alert('You Have Entered An Incorrect Email');
                       window.location.href='passrec.html';
                       </script>");
          exit();
    }

   }
?>