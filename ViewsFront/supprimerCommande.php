<?PHP
include "CommandeC.php";
include "cart.php";
$database_name = "mybase";
$con = mysqli_connect("localhost","root","","$database_name");
mysqli_select_db($con,$database_name);
$query = "DELETE FROM commande WHERE ID='$_GET[ID]'";
if(mysqli_query($con,$query))
	header("refresh:0; url=cart.php");
else 
	echo"NOT Deleted";

if ($_GET[all]==1){

		$query='DELETE FROM commande';
		if(mysqli_query($con,$query))
		header("refresh:1; url=cart.php");
		else 
		echo"NOT Deleted";
}
?>