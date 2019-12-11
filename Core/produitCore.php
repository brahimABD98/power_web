<?PHP
include "../config.php";
class produitCore {
function afficherproduit ($produit){
		echo "id: ".$produit->getid()."<br>";
		echo "marque: ".$produit->getmarque()."<br>";
		echo "prix: ".$produit->getprix()."<br>";
		echo "type: ".$produit->gettype()."<br>";
		echo "categorie: ".$produit->getcategorie()."<br>";
		echo "description: ".$produit->getdescription()."<br>";
		echo "quantite: ".$produit->getquantite()."<br>";
	}

    function ajouterProduit($produit){
        $sql="insert into produit (id,marque,prix,type,categorie,description,quantite) values (:id,:marque,:prix,:type,:categorie,:description,:quantite)";
        $db = config::getConnexion();
        try{
        $req=$db->prepare($sql);
        
        $id=0;
        $marque=$produit->getmarque();
        $prix=$produit->getprix();
        $type=$produit->gettype();
        $categorie=$produit->getcategorie();
        $description=$produit->getdescription();
        $quantite=$produit->getquantite();

        $req->bindValue(':id',$id);
        $req->bindValue(':marque',$marque);    
        $req->bindValue(':prix',$prix);
        $req->bindValue(':type',$type);
        $req->bindValue(':categorie',$categorie);
        $req->bindValue(':description',$description);
        $req->bindValue(':quantite',$quantite);
        
            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
        
    }
    

	function afficherListProduits(){
        //$sql="SElECT * From employe e inner join formationphp.employe a on e.cin= a.cin";
        $sql="SElECT * From produit";
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
          function supprimerProduit($id){

        $sql="DELETE FROM produit where id= :id";

        $db = config::getConnexion();
        $req=$db->prepare($sql);
        $req->bindValue(':id',$id);
        try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
   function recupererProduit($id){
        $sql="SELECT * from produit where id=$id";
        $db = config::getConnexion();
        try{
            $liste=$db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }

function modifierProduit($produit,$id){

        $sql="UPDATE produit SET marque=:marque,prix=:prix,type=:type,categorie=:categorie,quantite=:quantite,description=:description WHERE id=:id";

        $db = config::getConnexion();
       $db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
        try{
                $req=$db->prepare($sql);

                
                $marque=$produit->getmarque();
                $description=$produit->getdescription();
                 $prix=$produit->getPrix();
                $type=$produit->gettype();
                $categorie=$produit->getcategorie();
                $quantite=$produit->getquantite();


                $datas = array(':id'=>$id,':marque'=>$marque, ':prix'=>$prix, ':type'=>$type,':categorie'=>$categorie,':quantite'=>$quantite,':description'=>$description);
                var_dump($datas);
         $req->bindValue(':id',$id);
        $req->bindValue(':marque',$marque);
        $req->bindValue(':prix',$prix);
        $req->bindValue(':type',$type);
        $req->bindValue(':categorie',$categorie);
        $req->bindValue(':quantite',$quantite);
        $req->bindValue(':description',$description);
        


                $s= $req->execute();

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
