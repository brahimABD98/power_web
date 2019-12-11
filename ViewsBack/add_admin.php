<?PHP
require "../core/adminC.php";

echo $_POST['email'];
	echo $_POST['nom'];
	echo $_POST['prenom'];
	echo	$_POST['mdp'];
if (isset($_POST['email']) and isset($_POST['nom']) and isset($_POST['prenom']) and isset($_POST['mdp']))
{
	echo "cc";
$admin1=new admin($_POST['nom'],$_POST['prenom'],$_POST['mdp'],$_POST['email']);
$admin1C=new adminC();
$admin1C->ajouter($admin1);

header('Location: index.php');
}

?>
