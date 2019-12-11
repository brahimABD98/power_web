<?php
require "../core/clientC.php";
if(isset($_GET["id"]))
{
$client=new clientC();
$client->supprimerclient($_GET["id"]);
}
header("location:login/logOut.php");
?>
