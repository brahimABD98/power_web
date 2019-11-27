
<?PHP include("./include/header.php");?>
   <!-- Begin Page Content -->
       <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-9 main-chart">
            <!--CUSTOM CHART START -->
            <div class="border-head">
                <h1 class="h4 text-gray-900 mb-4"><b>Ajouter une photo a un produit</b></h1>
              </div>
<form name="formSaisie" method="POST" action="ajoutphoto.php" enctype="multipart/form-data" class="user">

  
        <label for="marque" >produits disponibles : </label>
             <?PHP
            include "../Core/produitCore.php";

            $produitCoreInstance=new produitCore();
          
            $listProduits = $produitCoreInstance->afficherListProduits();

         ?>
         <div class="form-group">
        <select class="form-control" id="Options" name="Options" align="center">
            <option value="0">produit</option>
            <?PHP foreach($listProduits as $key=>$row){?>
                     <?php
                            $chb=$row['id'];
                        ?>
                     <option id="<?PHP echo $key+1; ?>" value="<?PHP echo $row['id']; ?>">
                        
                        <?PHP            
	                        echo $row['marque'];
                          ?>

                     </option>
             <?PHP } ?>

        </select>
      </div>




            


             <div class="form-group" align="center">
                <span >Images du produit</span>
                  </div>
                   <div class="form-group" align="center">
                <input name="image" type="file" >
          
</div>
       <br>
       
    
          <input type="hidden" class="form-control form-control-user" id="id_photo" name="id_photo" value="<?php echo $chb?>">

   

<script>
	var selectElem = document.getElementById('Options');
	var selectedValue = document.getElementById('id_photo');

	selectElem.addEventListener('change', function() {
	 var val = selectElem.value;
	selectedValue.value = val;
	})
</script>

    <p id="s1">
        <button class="btn btn-primary" type="submit" name="action" >Envoyer
        <!--<i class="material-icons right">send</i>-->
    </button></p>
</form>

<?php include("./include/footer.php");?>





 