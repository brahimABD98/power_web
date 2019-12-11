
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Sign-Up/Login Form</title>
  <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel="stylesheet" href="./style.css">

</head>
<body>
  <?php
  session_start();
  if(empty($_SESSION))
  {?>
    <!-- partial:index.partial.html -->
    <div class="form">
      
      <ul class="tab-group">
        <li class="tab active"><a href="#signup">Sign Up</a></li>
        <li class="tab"><a href="#login">Log In</a></li>
      </ul>
      
      <div class="tab-content">
  
        <div id="signup">   
          <h1>Inscription</h1>
          
          <form action="../ajouterClient.php" method="post">
          
          <div class="top-row">
            <div class="field-wrap">
              <label>
                Nom<span class="req">*</span>
              </label>
              <input name="nom" type="text" required autocomplete="off" />
            </div>
        
            <div class="field-wrap">
              <label>
                Prenom<span class="req">*</span>
              </label>
              <input name="prenom" type="text"required autocomplete="off"/>
            </div>
          </div>

          <div class="field-wrap">
            <label>
              Addresse Email<span class="req">*</span>
            </label>
            <input name="email" type="email"required autocomplete="off"/>
          </div>
          
          <div class="field-wrap">
            <label>
              mot de passe<span class="req">*</span>
            </label>
            <input name="mdp" type="password"required autocomplete="off"/>
          </div>
          
          <div class="field-wrap">
            <label>
              numéro<span class="req">*</span>
            </label>
            <input name="numtel" type="tel"required autocomplete="off" pattern="[0-9]{2}[0-9]{3}[0-9]{3}"/>
          </div>

           <div class="field-wrap">
            <label>
             date de naissance<span class="req">*</span>
            </label>
           <input name="date" type="text" onfocus="(this.type='date')" onblur="if(!this.value)this.type='text'" required />
          </div>
          
          <button type="submit" class="button button-block"/>Inscription</button>
          
          </form>

        </div>
        
        <div id="login">   
          <h1>Bienvenue</h1>
          
          <form action="../log.php" method="post">
          
            <div class="field-wrap">
            <label>
              adresse email<span class="req">*</span>
            </label>
            <input name="email" type="email"required autocomplete="off"/>
          </div>
          
          <div class="field-wrap">
            <label>
              mot de passe<span class="req">*</span>
            </label>
            <input name="mdp" type="password"required autocomplete="off"/>
          </div>
          
          <p class="forgot"><a href="reser.html">mot de passe oubliée ?</a></p>
          
          <button class="button button-block"/>connexion</button>
          
          </form>

        </div>
        
      </div><!-- tab-content -->
      
    </div> <!-- /form -->
    <!-- partial -->

   <script src='jquery.min.js'></script><script  src="./script.js"></script>
<?php
  }
  ?>


<?php
    if(empty($_SESSION))
    {
     ?>
    <a href="login.php" style="
    margin-left: 250px;
    margin-top: 20px;
    position: absolute;">SignUp/SignIn</a>
  <?php }else {
    ?>
    <h4 style="
    margin-left: 250px;
    margin-top: 20px;
    position: absolute;"><strong>Bienvenue </strong>  <?php echo $_SESSION['nom'] ?> <?php echo $_SESSION['prenom'] ?></h4>
    <a href="LogOut.php" style="
    margin-left: 250px;
    margin-top: 40px;
    position: absolute;"> <h6>Se déconnecter</h6> </a>
    <?php
  } ?>
</body>
</html>