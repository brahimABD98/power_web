<?PHP
class photo{

	private $id;
	private $img;
	private $id_photo;

	

	function __construct($img,$id_photo){
		$this->img=$img;
		$this->id_photo=$id_photo;
		
	
		}
	
	function getId(){
		return $this->id;
	}
	function getImg(){
		return $this->img;
	}
	function getId_photo(){
		return $this->id_photo;
	}
	
	

	function setId($id){
		$this->id = $id;
	}
	function setImg($img){
		$this->img = $img;
	}
	function setId_photo($id_photo){
		$this->Id_photo = $Id_photo;
	}
	
	

}

?>