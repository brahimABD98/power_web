<?PHP
include "../Core/produitCore.php";

$produitCoreInstance=new produitCore();

if (isset($_POST["id"]))
 	{
    $produitCoreInstance->supprimerProduit($_POST["id"]);

	header('Location: index.php');
	}

?>