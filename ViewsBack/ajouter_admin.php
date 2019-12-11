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

  <title>ajouter Admin</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-dark">

  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">ajouter admin</div>
      <div class="card-body">
        <form method="POST"  action="add_admin.php">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="nom" name="nom"  placeholder="nom" required="required" >
                  <label for="nom">nom</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="prenom" name="prenom" class="form-control" placeholder="prenom" required="required">
                  <label for="prenom">prenom</label>
                </div>
              </div>
            </div>

              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="email" id="email" name="email" class="form-control" placeholder="email" required="required">
                  <label for="email">email</label>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
                <div class="form-label-group">
                  <input type="Password" id="mdp" name="mdp" class="form-control" placeholder="mdp" required="required">
                  <label for="mdp">mdp</label>
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
<!--
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
             
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="type" name="type" class="form-control" placeholder="type" required="required">
                  <label for="type">type</label>
                </div>
              </div>
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
          -->
         
          <button class="btn btn-primary" type="submit" name="valider" id="ajout">ajouter</button>
        </form>
        
      </div>
    </div>
  </div>


<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</script>

   Bootstrap core JavaScript
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  Core plugin JavaScript
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>
  <?php   
}
else {
     header('Location: login.php');
}

?>