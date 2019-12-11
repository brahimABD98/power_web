<?PHP
include "../Entities/Demande.php";
include "../Core/DemandeC.php";


if (isset($_POST['lname']) and isset($_POST['num']) and isset($_POST['subject']) and isset ($_POST['message']) and  isset ($_POST['dateajout']))
{
    $date= $_POST['dateajout'];
   
$demande1=new Demande($date,$_POST['lname'],$_POST['num'],$_POST['subject'],$_POST['message'],"en attente");
$demande1C=new DemandeC();
$demande1C->ajouterDemande($demande1);

	header('Location:CaptchaTest.php');
   // header('Location: demande_produit.php');
   
    /*header('Location: ajouterDemande.php');*/

}else{
  
	echo "vérifier les champs";}
?>
