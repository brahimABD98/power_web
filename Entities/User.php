<?PHP
class User{

	private $user_id;
	private $user_email;
	private $user_pass;

	

	
	

	function __construct($user_id,$user_email,$user_pass){
		
		$this->user_id=$user_id;
		$this->user_email=$user_email;
		$this->user_pass=$user_pass;
		
	
		

		
	}
	
	function getUser_id(){
		return $this->user_id;
	}
	function getUser_email(){
		return $this->user_email;
	}
	function getUser_pass(){
		return $this->user_pass;
	}
	
   
   

	function setUser_id($user_id){
		$this->user_id = $user_id;
	}
	
	function setUser_email($user_email){
		$this->user_email = $user_email;
	}
	function setUser_pass($user_pass){
		$this->user_pass= $user_pass;
	}
	
   
   
}

?>