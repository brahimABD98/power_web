<?PHP
include "../config.php";


class UserCore {

	function ajouterUser($User){
		$sql="insert into users (user_name,user_email,user_pass,joining_date) values (:user_name,:user_email,:user_pass,:joining_date)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
        $user_email=$User->getUser_email();
        $user_pass=$User->getUser_pass();
        $user_name=$User->getUser_name();
        $joining_date=$User->getJoining_date();
       

        //$datetime=$user->getDatetime();
      //  $etat=$user->getEtat();
        $req->bindValue(':user_email',$user_email);
		$req->bindValue(':user_name',$user_name);
		$req->bindValue(':user_pass',$user_pass);
		$req->bindValue(':joining_date',$joining_date);
        $req->execute();

        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }

	}

	function afficherListUsers(){
		//$sql="SElECT * From employe e inner join formationphp.employe a on e.cin= a.cin";
		$sql="SElECT * From users";
		$db = config::getConnexion();
		try{
            $liste=$db->query($sql);
            return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}

    function supprimerUser($user_id){

        $sql="DELETE FROM users where user_id= :user_id";

        $db = config::getConnexion();
        $req=$db->prepare($sql);
        $req->bindValue(':user_id',$user_id);
        try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
    function modifierUser($User,$user_id){

        $sql="UPDATE users SET user_email=:user_email,user_name=:user_name,user_pass=:user_pass,joining_date=:joining_date  WHERE user_id=:user_id";

        $db = config::getConnexion();
        $db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
        try{
        

        

        $req=$db->prepare($sql);
        $user_email=$User->getUser_email();
        $user_pass=$User->getUser_pass();
        $user_name=$User->getUser_name();
        $joining_date=$User->getJoining_date();
   

                $datas = array(':user_id'=>$user_id,':user_email'=>$user_email, ':user_name'=>$user_name, ':user_pass'=>$user_pass,':joining_date'=>$joining_date);

        $req->bindValue(':user_id',$user_id);
        $req->bindValue(':user_email',$user_email);
        $req->bindValue(':user_name',$user_name);
        $req->bindValue(':user_pass',$user_pass);
        $req->bindValue(':joining_date',$joining_date);


        //$req->bindValue(':img_name',$img_name);
        
                $s= $req->execute();

                   // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
            echo " Les datas : " ;
            print_r($datas);
        }
    }
    function recupererUser($user_id){
        $sql="SELECT * from users where user_id=$user_id";
        $db = config::getConnexion();
        try{
            $liste=$db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
     function verifUser($user_email,$user_pass){
        $sql="SELECT * from users where user_email=$user_email and user_pass=$user_pass";
        $db = config::getConnexion();
        try{
            $liste=$db->query($sql);
            return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }


/*
	function afficherlistMenusParCat($type){
		//$sql="SElECT * From employe e inner join formationphp.employe a on e.cin= a.cin";
		$sql="SElECT * From menu where type ='".$type."'";

        $db = config::getConnexion();
		try{

            $liste=$db->query($sql);
            return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}

	function Incrementerstat($menu,$id){

		$sql="UPDATE menu SET stat=:stat WHERE id=:id";

        $sql="SELECT * from menu where id=$id";
        $db = config::getConnexion();
        try{
            $result=$db->query($sql);
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }

        foreach($result as $row){
            $stat = $row['stat'];
        }

		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
        try{

                $req=$db->prepare($sql);


                if(!$stat){
                    $stat= 1;
                }else{
                   $stat ++ ;
                }


                $datas = array(':id'=>$id,':stat'=>$stat);

                $req->bindValue(':id',$id);
                $req->bindValue(':stat',$stat);
                $s= $req->execute();

                   // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
            echo " Les datas : " ;
            print_r($datas);
        }
	}

	function supprimerMenu($id){

		$sql="DELETE FROM menu where id= :id";

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

	function modifierMenu($menu,$id){

		$sql="UPDATE menu SET name=:name,type=:type,price=:price,ref=:ref,calories=:calories,img=:img,img_name=:img_name,description=:description WHERE id=:id";

		$db = config::getConnexion();
		$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
        try{
                $req=$db->prepare($sql);

                $name=$menu->getName();
                $type=$menu->getType();
                $price=$menu->getPrice();
                $ref=$menu->getRef();
                $img=$menu->getImg();
                $img_name=$menu->getImgName();
                $calories=$menu->getCalories();
                $description=$menu->getDescription();

                $datas = array(':id'=>$id,':name'=>$name, ':type'=>$type, ':price'=>$price,':ref'=>$ref,':calories'=>$calories,':img'=>$img,':img_name'=>$img_name,':description'=>$description);

                $req->bindValue(':name',$name);
                $req->bindValue(':id',$id);
                $req->bindValue(':type',$type);
                $req->bindValue(':price',$price);
                $req->bindValue(':ref',$ref);
                $req->bindValue(':calories',$calories);
                $req->bindValue(':img',$img);
                $req->bindValue(':img_name',$img_name);

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


	function recupererMenu($id){
		$sql="SELECT * from menu where id=$id";
		$db = config::getConnexion();
		try{
		    $liste=$db->query($sql);
		    return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	
	function rechercherListeEmployes($tarif){
		$sql="SELECT * from employe where tarifHoraire=$tarif";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }

	}
*/}

?>