<?PHP


class PhotoCore {



	function ajouterPhoto($photo){
		$sql="insert into photo (img,id_photo) values (:img,:id_photo)";
		$db =new PDO('mysql:host=localhost;dbname=mybase', 'root', '');
		try{
        $req=$db->prepare($sql);

        $img=$photo->getImg();
        
        $id_photo=$photo->getId_photo();
        




		$req->bindValue(':img',$img);
		
		$req->bindValue(':id_photo',$id_photo);
		


            $req->execute();

        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }

	}
     function afficherlistPhotosParCat($id_photo){

        $sql="SElECT * From photo where id_photo ='".$id_photo."' ";

        $db =new PDO('mysql:host=localhost;dbname=mybase', 'root', '');
        try{

            $liste=$db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
    function afficherlistPhotosParCat2($id_photo){

        $sql="SElECT * From photo where id_photo ='".$id_photo."' limit 1 ";

        $db =new PDO('mysql:host=localhost;dbname=mybase', 'root', '');
        try{

            $liste=$db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }

    function supprimerPhoto($id){

        $sql="DELETE FROM photo where id= :id";

       $db =new PDO('mysql:host=localhost;dbname=mybase', 'root', '');
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

}

?>