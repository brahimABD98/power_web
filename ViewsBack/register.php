<?php
session_start();

$bdd = new PDO('mysql:host=localhost;dbname=mybase', 'root', '');


if( isset($_SESSION['Id_admin']) AND isset($_SESSION['Email_admin']) ) {

   $getid = intval($_SESSION['Id_admin']);
   $requser = $bdd->prepare('SELECT * FROM admin WHERE id = ?');
   $requser->execute(array($getid));
   $userinfo = $requser->fetch();
 
?>
<html lang="en">
<?php include("include/header.php");?>
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

  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">ajouter un produit</div>
      <div class="card-body">
        <form method="POST"  action="addProduit.php">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="number" id="quantite" name="quantite" class="form-control" placeholder="quantite" required="required" autofocus="autofocus">
                  <label for="quantite">quantite</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="marque" name="marque" class="form-control" placeholder="marque" required="required">
                  <label for="marque">marque</label>
                </div>
              </div>
            </div>
          </div>
          <!--
          <div class="form-group">
            <div class="form-label-group">
              <input type="text" id="categorie" name="categorie" class="form-control" placeholder="categorie" required="required">
              <label for="categorie">categorie</label>
            </div>
          </div>-->

          <div class="form-group">
            <div class="form-label-group">
          <select name="categorie" style="margin-bottom: 18px;" class="browser-default custom-select form-control">
            <option selected>Categorie</option>
            <option value="Lunettes de soleil">Lunettes de soleil</option>
            <option value="Lunettes de vue">Lunettes de vue</option>
            <option value="Lunettes avec applique">Lunettes avec applique</option>
          </select>
        </div>
        </div>
          
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="prix" name="prix" class="form-control" placeholder="Password" required="required">
                  <label for="prix">prix</label>
                </div>
              </div>
              <!--
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="type" name="type" class="form-control" placeholder="type" required="required">
                  <label for="type">type</label>
                </div>
              </div>-->
              <div class="col-md-6">
                <div class="form-label-group">
          <select name="type" class="browser-default custom-select">
            <option selected>Sexe</option>
            <option value="Homme">Homme</option>
            <option value="Femme">Femme</option>
            <option value="Enfant">Enfant</option>
          </select>
              </div>
              </div>

            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="text" id="description" name="description" class="form-control" placeholder="description" required="required">
              <label for="description">description</label>
            </div>
          </div>
          
          <a onclick="verif()" class="btn btn-primary" id="verif">Verifier</a>
          <button class="btn btn-primary" type="submit" name="valider" id="ajout">ajouter</button>
        </form>
        
      </div>
    </div>
  </div>


<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
  document.getElementById("ajout").style.display='none';
  document.getElementById("verif").style.display='block'; 
function verif(){
  console.log("log");

  var quantite = document.getElementById("quantite").value;
  var marque = document.getElementById("marque").value;
  var description = document.getElementById("description").value;
  var prix = document.getElementById("prix").value;


  if((quantite=="") || (marque=="") || (prix=="") || (description==""))
  {
    swal("veuillez Remplir tous les champs");
    return false;
  }
  if(prix<=0){
    swal("Le prix doit etre positif");
    return false;
  } else if ((quantite>1000) || (quantite<=0)) {
    swal("quantite invalide");
  }
  else{
    swal("sucées", "Produit ajouté", "success");
    
    document.getElementById("verif").style.display='none';
    document.getElementById("ajout").style.display='block';
    
    return true;
  }


}
</script>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>
  <?php   
}
else {
     header('Location: login.php');
}

?>