<?PHP
include "../cores/clientC.php";


	$client1=new client($_POST['nom'],$_POST['prenom'],$_POST['mdp'],$_POST['email'],$_POST['date'],$_POST['numtel']);
	$client1C=new clientC();
	$client1C->modifierclient($client1,$_POST['id_client']);
	$_SESSION['nom']=$_POST['nom'];    
	$_SESSION['prenom']=$_POST['prenom'];
	header('location:afficher.php');
?>
