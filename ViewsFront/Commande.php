<?PHP
class commande{
	private $Nom;
	private $ID;
	private $Prix;
	private $Quantite;

	function __construct($Nom,$ID,$Prix,$Quantite){
		$this->Nom=$Nom;
		$this->ID=$ID;
		$this->Prix=$Prix;
		$this->Quantite=$Quantite;
	}
	
	function getNom(){
		return $this->Nom;
	}
	function getID(){
		return $this->ID;
	}
	function getPrix(){
		return $this->Prix;
	}
	function getQuantite(){
		return $this->Quantite;
	}

	function setID($ID){
		$this->ID=$ID;
	}
	function setPrix($Prix){
		$this->Prix;
	}
	function setQuantite($Quantite){
		$this->Quantite=$Quantite;
	}
	
}

?>