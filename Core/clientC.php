<?php
require "../config.php";
include "../entities/client.php";
class clientc
{

  function ajouter($client)
  {

      $sql ="insert into client (nom,prenom,mdp,email,date,numtel) values (:nom,:prenom,:mdp,:email,:date,:numtel)" ;
      $db = config::getConnexion();
      $req = $db->prepare($sql);
      $email = $client->getemail();
      $nom =$client->getnom();
      $prenom =$client->getprenom();
      $date =$client->getdate();
      $numtel =$client->getnumtel();
      $mdp =$client->getmdp();

      $req->bindValue(':email',$email);
      $req->bindValue(':nom',$nom);
      $req->bindValue(':prenom',$prenom);
      $req->bindValue(':date',$date);
      $req->bindValue(':numtel',$numtel);
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

  function supprimerclient($id){
  $sql="DELETE FROM client where id_client=:id";
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
  function afficherListClients()
  {
    $sql ="select * from client" ;
    $db = config::getConnexion();
    try {
          $tab = $db->query($sql);
          return $tab;

    } catch (Exception $e) {
       echo 'error :'.$e->getMessage();
    }


  }
  function modifierclient($client,$id){
    $sql="UPDATE client SET email=:email,nom=:nom,prenom=:prenom,mdp=:mdp,numtel=:numtel,date=:date WHERE id_client=:id";

    $db = config::getConnexion();
    //$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{
        $req=$db->prepare($sql);
        $email=$client->getemail();
        $nom=$client->getnom();
        $prenom=$client->getprenom();
        $numtel=$client->getnumtel();
        $date=$client->getdate();
        $mdp=$client->getmdp();

    $req->bindValue(':id',$id);
    $req->bindValue(':email',$email);
    $req->bindValue(':nom',$nom);
    $req->bindValue(':mdp',$mdp);
    $req->bindValue(':prenom',$prenom);
    $req->bindValue(':numtel',$numtel);
    $req->bindValue(':date',$date);


            $s=$req->execute();

           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();

        }

  }

}

 ?>
