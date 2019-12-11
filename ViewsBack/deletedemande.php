
<?php
/*include "../../core/config.php";
$sup=$_GET['sup'];
$req="DELETE FROM demande WHERE ID_D='$sup'";
$db=config::getConnexion();
$db->query($req);*/
 ?>

<?PHP
include "../Core/DemandeC.php";
$demandeC=new DemandeC();
if (isset($_POST["ID_D"])){
    $demandeC->supprimerDemande($_POST["ID_D"]);
    header('Location: demandeBACK.php');
}

?>
