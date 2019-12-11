<?PHP
include "../core/clientC.php";

if (isset($_POST['email']) and isset($_POST['nom']) and isset($_POST['prenom']) and isset($_POST['mdp']) and isset($_POST['mdp2']) ){
$client1=new client($_POST['nom'],$_POST['prenom'],$_POST['mdp'],$_POST['email'],$_POST['date'],$_POST['numtel']);
$client1C=new clientC();
$client1C->ajouter($client1);


require '../PHPMailer/PHPMailer.php';
require '../PHPMailer/Exception.php';
require '../PHPMailer/OAuth.php';
require '../PHPMailer/POP3.php';
require '../PHPMailer/SMTP.php';

$mail = new PHPMailer\PHPMailer\PHPMailer();;
// SMTP configuration
//$mail->SMTPDebug = 4;
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'info.nexshop@gmail.com';
$mail->Password = 'nexshop98@';
$mail->SMTPSecure = 'tls';
$mail->Port = 587;

$mail->setFrom('info.nexshop@gmail.com','NexShop Info' );


// Add a recipient
$mail->addAddress($_POST['email']);


// Add cc or bcc
//$mail->addCC('');
$mail->addBCC('bcc@example.com');

// Email subject
$mail->Subject = 'Compte NexShop Crée';

// Set email format to HTML
$mail->isHTML(true);

// Email body content
//$mailContent = $numero3;
$mail->Body = "Un compte NexShop a été crée en utilisant cette adresse email, Si ce n'est pas vous Ignorez ce mail \n Sinon, Bienvenue dans la famille NexShop,\n N'hezitez pas de créer une cart fidélité pour bénificier de nos offres imbattables  ";


// Send email
if(!$mail->send()){
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;

}else{
    echo 'Message has been sent';
    session_start();
    $_SESSION['email']=$_POST['email'];
    $host="localhost";
    $user="root";
    $password="";
    $db="2a7";

    $con = mysqli_connect($host,$user,$password,$db);

    $sql="select * from client where email='".$_POST['email']."'AND mdp='".$_POST['mdp']."' limit 1";
    $result=mysqli_query($con,$sql);

        if(!$result || mysqli_num_rows($result) == 1)
        {
            $_SESSION['email']=$_POST['email'];
            $retrive=mysqli_fetch_array($result);
            $_SESSION['nom']=$retrive['nom'];
            $_SESSION['prenom']=$retrive['prenom'];
    }

    if (substr($_SESSION['email'],0,4) == 'info')
    {
      header("location:../nalika-master/nalika/index.php");
      exit();
    }else
    {
      header("location:index.php");
      exit();
    }
}
}

?>
