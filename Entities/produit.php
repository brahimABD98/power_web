<?PHP
class produit{

	private $id;
	private $marque;
	private $prix;
	private $type;
	private $categorie;
	private $description;
	private $quantite;

	function __construct($id,$marque,$prix,$type,$categorie,$description,$quantite){
		$this->id=$id;
		$this->marque=$marque;
		$this->prix=$prix;
		$this->type=$type;
		$this->categorie=$categorie;
		$this->description=$description;
		$this->quantite=$quantite;
	}
	
	function getid(){
		return $this->id;
	}
	function getmarque(){
		return $this->marque;
	}
	function getprix(){
		return $this->prix;
	}
	function gettype(){
		return $this->type;
	}
	function getcategorie(){
		return $this->categorie;
	}

	
	function getdescription(){
		return $this->description;
	}

	
	function getquantite(){
		return $this->quantite;
	}

	function setid($id){
		$this->id=$id;
	}
	function setmarque($marque){
		$this->marque=$marque;
	}
	function setprix($prix){
		$this->prix=$prix;
	}
	function settype($type){
		$this->type=$type;
	}
	function setcategorie($categorie){
		$this->categorie=$categorie;
	}
	
	function setdescription($description){
		$this->description=$description;
	}
	
	function setquantite($quantite){
		$this->quantite=$quantite;
	}
}

?>