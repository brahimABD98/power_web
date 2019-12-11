<?php
session_start();

$bdd = new PDO('mysql:host=localhost;dbname=mybase', 'root', '');


if( isset($_SESSION['Id_admin']) AND isset($_SESSION['Email_admin']) ) {

   $getid = intval($_SESSION['Id_admin']);
   $requser = $bdd->prepare('SELECT * FROM admin WHERE id = ?');
   $requser->execute(array($getid));
   $userinfo = $requser->fetch();
 
?>
<?PHP include("include/header.php");?>
<?PHP include("include/footer.php");?>
  <?php   
}
else {
     header('Location: login.php');
}

?>