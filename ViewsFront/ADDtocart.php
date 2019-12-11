<?PHP
include "Commande.php";
include "CommandeC.php";

if (isset($_REQUEST['Nom']) and isset($_REQUEST['ID']) and isset($_REQUEST['Prix'])	){
$Commande1=new Commande($_REQUEST['Nom'],$_REQUEST['ID'],$_REQUEST['Prix'],1);

$Commande1C=new CommandeC();
$Commande1C->ajouterCommande($Commande1);
header('Location: produit.php');
	
}else{
	echo "vérifier les champs";
}
?>