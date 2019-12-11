<?php
session_start();

$bdd = new PDO('mysql:host=localhost;dbname=mybase', 'root', '');


if( isset($_SESSION['Id_admin']) AND isset($_SESSION['Email_admin']) ) {

   $getid = intval($_SESSION['Id_admin']);
   $requser = $bdd->prepare('SELECT * FROM admin WHERE id = ?');
   $requser->execute(array($getid));
   $userinfo = $requser->fetch();
 
?>



<?php include("./include/header.php");
      include ("../Core/produitCore.php");
      include ("../Entities/photo.php");
      include ("../Core/photoCore.php");

      
if (isset($_GET['id'])){
   
$produitCoreInstance=new produitCore();

$listProduits = $produitCoreInstance->afficherListProduits();

 $result= $produitCoreInstance->recupererProduit($_GET['id']);
  foreach($result as $row){
    $id   = $row['id'];
    $marque = $row['marque'];
   ?>


<style>

.divewi{
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%,-50%);
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
}

.enzel{
  width: 110px;
  height: 36px;
  background: #6a89cc;
  margin: 23px;
  border: none;
  outline: none;
  cursor: pointer;
  color: #fff;
  font-family: "montserrat",sans-serif;
  text-transform: uppercase;
  font-size: 13px;
  transition: 0.4s;
  transform-style: preserve-3d;
  perspective: 800px;
}

.enzel::after{
  content: '';
  position: absolute;
  background: #4a69bd;
  transition: 0.4s;
}

.enzel1:hover{
  transform: rotateX(-20deg);
}
.enzel1:after{
  width: 100%;
  height: 24px;
  top: -24px;
  left: 0;
  transform-origin: 0 100%;
  transform: rotateX(90deg);
}



</style>


   <!-- Begin Page Content -->
          <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-9 main-chart">
            <!--CUSTOM CHART START -->
            <div class="border-head">
              <h3>Photos des produits</h3>          
              <button style="margin-left: 0px;" class="enzel enzel1" onclick="window.location.href='ajouterphoto.php'"><i class="fa fa-plus">&nbsp;&nbsp;&nbsp;</i>photo</button>
            </div>


            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                       <tr>
                      <th width="900">Image</th>
                      

                     <th>supprimer</tH>
           
                    </tr>
                    </tr>
                  </thead>

                  <tbody>
             <?PHP
                    $photoCoreInstance=new photoCore();
                    $id_photo=$id;
                    $listPhotos = $photoCoreInstance->afficherlistPhotosParCat($id_photo)
                  ?>
  
        
           
            <?PHP
                   foreach($listPhotos as $row){
                    ?>
                     
             <tr> <td>
                   <?PHP 
                    echo '<img src="uploads/'.$row['img'].'"  width="100" height="100"/>';
                    ?>
                </td>
                <td>
            <form method="POST" action="supprimerphoto.php">
                <input type="hidden" value="<?PHP echo $row['id']; ?>" name="id">
                <input type="submit" id="delete" name="supprimer" class="btn delicious-btn" value="" style="background-image: url('img/delete-button.png') ; background-repeat: no-repeat;  background-size: 32px">
            </form>
        </td>  </tr>
                <?PHP
              }
              ?>

       
       


  </tbody>
                </table>
  <?PHP
}

}
?>
                  
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->
  <?php include("./include/footer.php");?>
  <?php   
}
else {
     header('Location: login.php');
}

?>
    
    



