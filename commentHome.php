<?php 
	if (isset($_POST['commentInputType']) && isset($_POST['commentButtonSend'])) {
			include 'db.php';
			mysqli_real_escape_string($conn,$_POST['commentInputType']);
			htmlspecialchars($_POST['commentInputType']);
		if (isset($_POST['commentInputType']) && isset($_POST['id']) && isset($_POST['uid']) && isset($_POST['username'])) {
					$id = $_POST['id'];
					$post_id = $_POST['uid'];
					$user_name = $_POST['username'];
					$selectInput = htmlspecialchars($_POST['commentInputType']);
				
				$pattern ='/^[-a-zA-Z0-9_\x{30A0}-\x{30FF}'
        		 .'\x{3040}-\x{309F}\x{4E00}-\x{9FBF}\s]*$/u';

			if (preg_match($pattern,$selectInput)) { 
					mysqli_query($conn,"INSERT INTO comment(comm,post_id,user_comm,user_name) VALUES ('$selectInput','$id','$post_id','$user_name') ");
					header("Location:home.php?commentSuccess");

			}else{ 
    			header("Location:home.php?deleteFailed");
			} 
					
		}
	}
?>