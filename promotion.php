
<?php
include "../../core/produitC.php";
include "../../entities/produit.php";

$instance = new ProduitC();



if(isset($_POST['ajouter'])&&isset($_POST['produits'])&&isset($_POST['Pourcentage']) ){
    	$referance=$_POST['produits'];
    	$pourcentage=$_POST['Pourcentage'];
    	
        
    	$sql = "INSERT INTO promotion (id_product,pourcentage)
VALUES ('$referance','$pourcentage')";
$c=config::getConnexion();
$c->exec($sql);
 $query = "UPDATE produit SET promotion = 1 WHERE referance=".$referance;
$c->exec($query);
    header('Location: modifierpromotion.php');
    }

$result=$instance->afficherProduitsanspromotion();
$liste=$result->fetchall();


include 'header.php' ;

?>

<section id="main-content">
      <section class="wrapper">
<div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
              <h4 class="mb"><i class="fa fa-angle-right"></i> Ajouter promotions</h4>
              <form class="form-horizontal style-form" method="POST">
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Produit</label>
                  <div class="col-sm-10">
                   <select name="produits" id="produits" required>
                   	<?php
                   		foreach ($liste as $p ) {
                   			echo '<option name="produit" value="'.$p["referance"].'"  >'.$p["nom"].'</option>';
                   		}


                   	?>
                   	
                   </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">Pourcentage</label>
                  <div class="col-sm-10">
                    <input name="Pourcentage" type="text" class="form-control" pattern="[0-9]{2}" title="le pourcentage doit etre entre 0 et 100 ." required>
                   
                  </div>
                </div>
               
                <button name="ajouter" type="submit" class="btn btn-theme">Ajouter</button>
              </form>
            </div>
          </div>
          <!-- col-lg-12-->
        </div>
      </section></section>
<script src="lib/jquery/jquery.min.js"></script>
<script type="text/javascript" language="javascript" src="lib/advanced-datatable/js/jquery.js"></script>
<script src="lib/bootstrap/js/bootstrap.min.js"></script>
<script class="include" type="text/javascript" src="lib/jquery.dcjqaccordion.2.7.js"></script>
<script src="lib/jquery.scrollTo.min.js"></script>
<script src="lib/jquery.nicescroll.js" type="text/javascript"></script>
<script type="text/javascript" language="javascript" src="lib/advanced-datatable/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="lib/advanced-datatable/js/DT_bootstrap.js"></script>
<!--common script for all pages-->
<script src="lib/common-scripts.js"></script>
<!--script for this page-->
<script type="text/javascript">