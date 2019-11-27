<?PHP
ob_start();

?>
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin - Register</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-dark">




<?PHP
include("include/header.php");
include ("../Entities/produit.php");
include ("../Core/produitCore.php");

if (isset($_GET['id'])){
  $produitCoreInstance=new produitCore();
    $result= $produitCoreInstance->recupererproduit($_GET['id']);

  foreach($result as $row){
    $id=$row['id'];
    $marque=$row['marque'];
    $prix=$row['prix'];
    $type=$row['type'];
    $categorie=$row['categorie'];
    $description=$row['description'];
    $quantite=$row['quantite'];
?>

<form method="POST">

  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">modifier un produit</div>
      <div class="card-body">
        <form>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="number" id="quantite" name="quantite" class="form-control" placeholder="quantite" required="required" autofocus="autofocus" value="<?PHP echo $quantite ?>">
                  <label for="reference">Quantite</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="marque" name="marque" class="form-control" placeholder="marque" required="required" value="<?PHP echo $marque ?>">
                  <label for="marque">marque</label>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="text" id="categorie" name="categorie" class="form-control" value="<?PHP echo $categorie ?>">
              <label for="categorie">categorie</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="prix" name="prix" class="form-control" placeholder="Password" required="required" value="<?PHP echo $prix ?>">
                  <label for="prix">prix</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="type" name="type" class="form-control" placeholder="type" required="required" value="<?PHP echo $type ?>">
                  <label for="type">type</label>
                </div>
                
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="description" id="description" name="description" class="form-control" placeholder="description" required="required" value="<?PHP echo $description ?>">
              <label for="description">description</label>
            </div>
          </div>
          <input type="submit" name="modifier" value="modifier">
          <input type="hidden" name="id_ini" value="<?PHP echo $_GET['id'];?>">
        </form>
        
      </div>
    </div>
  </div>
</form>

<?PHP
  }


if (isset($_POST['modifier'])){
  $produitInstance=new produit($_POST['id'],$_POST['marque'],$_POST['prix'],$_POST['type'],$_POST['categorie'],$_POST['description'],$_POST['quantite']);
  $produitCoreInstance->modifierProduit($produitInstance,$_POST['id_ini']);
  header('Location: index.php');
  ob_end_flush();
}     
}?>
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
</body>
<?php include("./include/footer.php");?>
</HTMl>

