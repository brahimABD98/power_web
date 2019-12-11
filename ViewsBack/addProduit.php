<?PHP

include "../Entities/produit.php";
include "../Core/produitCore.php";



if (isset($_POST['marque']) and isset($_POST['prix']) and isset($_POST['type']) and isset($_POST['categorie']) and isset($_POST['description']) and isset($_POST['quantite']))   { 	
    	

$produitInstance = new produit(0,$_POST['marque'],$_POST['prix'],$_POST['type'],$_POST['categorie'],$_POST['description'],$_POST['quantite']);

$produitCoreInstance=new produitCore();
$produitCoreInstance->ajouterProduit($produitInstance);


//echo'<script>window.location.href = "index.php";</script>';
header('Location: gestiondeproduit.php');

	
}
else{	
    echo "vérifier les champs";
}


?>