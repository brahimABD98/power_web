<?PHP
include "Commmande.php";
include "CommandeC.php";

if (isset($_POST['Nom']) and isset($_POST['ID']) and isset($_POST['Prix']) and isset($_POST['Quantite'])){
$Commande1=new Commande($_POST['Nom'],$_POST['ID'],$_POST['Prix'],$_POST['Quantite']);

$Commande1C=new CommandeC();
$Commande1C->ajouterCommande($Commande1);
header('Location: produit.php');
	
}else{
	echo "vérifier les champs";
}
?>