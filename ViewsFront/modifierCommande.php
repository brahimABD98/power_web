<?PHP
    //include "cart.php";
    $database_name = "mybase";
    $con = mysqli_connect("localhost","root","",$database_name);
    mysqli_select_db($con,$database_name);
    /*$query = "UPDATE product SET Quantity='$_GET[Quantite]' WHERE ID='$_GET[ID]'";
    if(mysqli_query($con,$query))
        header("refresh:1; url=cart.php");
    else
        echo"Not updated";*/
?>
<?PHP
if (isset($_POST['modifier'])){
$query="UPDATE commande SET Quantite='$_POST[Quantite]' WHERE ID='$_POST[ID]'";
if(mysqli_query($con,$query))
header("refresh:0; url=cart.php");
else
echo"Not updated";
}
?>