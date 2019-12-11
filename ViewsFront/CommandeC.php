<?PHP
include "config.php";
include "cart.php";
class CommandeC {
function afficherCommande ($Commande){
		echo "Nom: ".$Commande->getNom()."<br>";
		echo "ID: ".$Commande->getID()."<br>";
		echo "Prix: ".$Commande->getPrix()."<br>";
		echo "Quantite: ".$Commande->getQuantite()."<br>";

	}

	function ajouterCommande($Commande){

		$sql="insert into Commande (Nom,ID,Prix,Quantite) values (:Nom,:ID,:Prix,:Quantite)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
		
        $Nom=$Commande->getNom();
        $ID=$Commande->getID();
        $Prix=$Commande->getPrix();

        $Quantite=$Commande->getQuantite();
		$req->bindValue(':Nom',$Nom);
		$req->bindValue(':ID',$ID);
		$req->bindValue(':Prix',$Prix);
		$req->bindValue(':Quantite',$Quantite);

		
            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}
	
	/*function afficherCommande(){
		//$sql="SElECT * From Commande e inner join formationphp.Commande a on e.Nom= a.Nom";
		$sql="SElECT * From Commande";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	*/
	function supprimerCommande($ID){
		$sql="DELETE FROM Commande where ID= :ID";
		/*$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':ID',$ID);
		try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }*/
	}
	function modifierCommande($Commande,$Nom){
		$sql="UPDATE Commande SET Nom=:Nomn, ID=:ID,Prix=:Prix,Quantite=:Quantite WHERE Nom=:Nom";
		
		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{		
        $req=$db->prepare($sql);
		$Nomn=$Commande->getNom();
        $ID=$Commande->getID();
        $Prix=$Commande->getPrix();
        $Quantite=$Commande->getQuantite();
		$datas = array(':Nomn'=>$Nomn, ':Nom'=>$Nom, ':ID'=>$ID,':Prix'=>$Prix,':Quantite'=>$Quantite);
		$req->bindValue(':Nomn',$Nomn);
		$req->bindValue(':Nom',$Nom);
		$req->bindValue(':ID',$ID);
		$req->bindValue(':Prix',$Prix);
		$req->bindValue(':Quantite',$Quantite);

		
		
            $s=$req->execute();
			
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   echo " Les datas : " ;
  print_r($datas);
        }
		
	}
	

}
?>