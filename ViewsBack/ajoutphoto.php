<?PHP
include("include/header.php");
include "../Entities/photo.php";
include "../Core/photoCore.php";


if (isset($_POST['id_photo']) )
{
    	if($_FILES){
     $file = $_FILES['image']['tmp_name'];
     $image_size =getimagesize($_FILES['image']['tmp_name']);

   if(isset($file) && ($image_size != FALSE))
        {
             $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
             $image_name =addslashes($_FILES['image']['name']);
             $image= base64_encode($image);

             file_put_contents('./uploads/'.$image_name,file_get_contents($_FILES['image']['tmp_name']));
        }   
}

$photoInstance =new photo($image_name,$_POST['id_photo']);

$photoCoreInstance=new PhotoCore();
$photoCoreInstance->ajouterPhoto($photoInstance);
echo'<script>window.location.href = "index.php";</script>';




	
}else{
	echo "vérifier les champs";
}

//*/

?>
<?php include("./include/footer.php");?>