<?php
require "../config.php";
include "../Entities/admin.php";
class adminc
{

  function ajouter($admin)
  {

      $sql ="insert into admin (nom,prenom,mdp,email) values (:nom,:prenom,:mdp,:email)" ;
      $db = config::getConnexion();
      $req = $db->prepare($sql);
      $email = $admin->getemail();
      $nom =$admin->getnom();
      $prenom =$admin->getprenom();
     
      $mdp =$admin->getmdp();

      $req->bindValue(':email',$email);
      $req->bindValue(':nom',$nom);
      $req->bindValue(':prenom',$prenom);
 
      $req->bindValue(':mdp',$mdp);
    try {
      $req->execute();
      return true;
    }
    catch (Exception $e)
    {
      echo 'error :'.$e->getMessage() ;
      return false ;
    }
  }

  function supprimeradmin($id){
  $sql="DELETE FROM admin where id_admin=:id";
  $db = config::getConnexion();
      $req=$db->prepare($sql);
  $req->bindValue('id',$id);
  try{
          $req->execute();
          
      }
      catch (Exception $e){
          die('Erreur: '.$e->getMessage());
      }
  }
  function afficherListAdmins(){
        //$sql="SElECT * From employe e inner join formationphp.employe a on e.cin= a.cin";
        $sql="SElECT * From admin";
       // $db = config::getConnexion();
               $db = config::getConnexion();

        try{
            $liste=$db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
             }
             }
  function modifieradmin($admin,$id){
    $sql="UPDATE admin SET email=:email,nom=:nom,prenom=:prenom,mdp=:mdp WHERE id_admin=:id";

    $db = config::getConnexion();
    //$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{
        $req=$db->prepare($sql);
        $email=$admin->getemail();
        $nom=$admin->getnom();
        $prenom=$admin->getprenom();

        $date=$admin->getdate();
        $mdp=$admin->getmdp();

    $req->bindValue(':id',$id);
    $req->bindValue(':email',$email);
    $req->bindValue(':nom',$nom);
    $req->bindValue(':mdp',$mdp);
    $req->bindValue(':prenom',$prenom);


            $s=$req->execute();

           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();

        }

  }

}

 ?>
