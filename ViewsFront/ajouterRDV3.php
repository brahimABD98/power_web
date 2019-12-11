<?PHP
include "../Entities/Rdv.php";
include "../Core/RdvC.php";


if (isset($_POST['date'])  and isset($_POST['subject']) and ( strtotime ($_POST['date']) > strtotime('now') ) and isset($_POST['userid']) ){
    $date= date_create()->format('Y-m-d');
    
    $rdv1=new Rdv($date,$_POST['date'],$_POST['subject'],"en attente",$_POST['userid']);
    $rdv1C=new RdvC();
    $rdv1C->ajouterRDV($rdv1);


  
    //var_dump($rupture);

    header('Location:RDVf.php');

}else{
echo "verfier la date";

}


?>
