<?PHP
include "../Core/RdvC.php";
$rdvC=new RdvC();
if (isset($_POST["ID_RDV"])){
    $rdvC->accepterRDV($_POST["ID_RDV"]);

    header('Location: RDVBACK2.php');
}

?>
