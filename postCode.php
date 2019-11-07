<?php
class postResult{
	private $posted;
   	private $id;

	public function __construct($posted,$id){
		$this->post = $posted;
      	$this->id = $id;

		$this->postInsert();
	}
	private function postInsert(){

		if (isset($this->post)) {
			$conn = new mysqli('localhost','root','','sqlclasses') or die(mysqli_connect_error());
         //exit();
			if (!is_null($this->post)) {
           	 	$mail=$this->id;
            	$mail = $_SESSION['mail'];
            $result=$conn->query("SELECT * FROM users WHERE mail='$mail' ")->fetch_assoc(); 
            $id = $result['id'];
            $uid = $result['uid'];

        	   $result = $conn->query("INSERT INTO classes ( content,user_id,user_uid ) VALUES ('$this->post','$id','$uid')"); 
				$resultSelect = $conn->query("SELECT classes.content FROM classesINNER JOIN users ON classes.user_id ='$id'");
            	header("Location:postHTML.php?success");
			}else{
				header("Location:home.php?postIsEmpty");
				exit();
			}
		}else{
			header("Location:home.php?postIsnotIsset");
			exit();
		}
	}
}

?>