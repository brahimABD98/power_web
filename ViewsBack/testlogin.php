<?PHP
include "../Entities/admin.php";
include"../config.php";
echo"debut ";



if (isset($_POST['email']) and isset($_POST['mdp']))
{
    echo "entrez";
            //  Récupération de l'utilisateur et de son pass hashé
        $db = config::getConnexion();
        $req = $db->prepare('SELECT id, mdp FROM admin WHERE email = :email');
        $email = $_POST['email'];
        $req->execute(array('email' => $email));
        $resultat = $req->fetch();

        // Comparaison du pass envoyé via le formulaire avec la base
        //$isPasswordCorrect = password_verify($_POST['pass'], $resultat['pass']);
       
        $user_pass1 = $_POST['mdp'];
        $user_pass2 = $resultat['mdp'];
        if ( $user_pass1 == $user_pass2 )
        {
            $isPasswordCorrect = true;
        }
        else {
            
            $isPasswordCorrect = false;
        }
        
        echo "****";
        echo $isPasswordCorrect;
        echo $isPasswordCorrect;
        echo "*****";
    echo $_POST['mdp'];
    echo $resultat['mdp'];
        if (!$resultat)
        {   
            echo "test2";
            echo 'Mauvais identifiant ou mot de passe !';

            //header('Location: login.php?erreur=4');

        }
        else
        {
            if ($isPasswordCorrect) {
                session_start();
                $_SESSION['Id_admin'] = $resultat['id'];
                $_SESSION['Email_admin'] = $email;
                $_COOKIE['id'] = $resultat['id'];
                echo 'Vous êtes connecté !';
                header("Location: index.php?id=".$_SESSION['Id_admin']);


            }
            else {
                echo "test3";
                echo 'Mauvais identifiant ou mot de passe !';
                //header('Location: login.php?erreur=4');
                
            }

        }

}else 
echo "fail";
?>