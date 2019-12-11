<?PHP
require "../cores/clientC.php";

echo $_POST['email'];
	echo $_POST['nom'];
	echo $_POST['prenom'];
	echo	$_POST['mdp'];
if (isset($_POST['email']) and isset($_POST['nom']) and isset($_POST['prenom']) and isset($_POST['mdp']))
{
	echo "cc";
$client1=new client($_POST['nom'],$_POST['prenom'],$_POST['mdp'],$_POST['email'],$_POST['date'],$_POST['numtel']);
$client1C=new clientC();
$client1C->ajouter($client1);

header('Location: afficher.php');
}

?>
