<?php 
session_start();
	if (isset($_POST['commentInputType']) && isset($_POST['commentButtonSend']) && isset($_POST['id'])) {
			include 'db.php';
			mysqli_real_escape_string($conn,htmlspecialchars($_POST['commentInputType']));
					$id = $_POST['id'];
					$selectInput = $_POST['commentInputType'];
					mysqli_query($conn,"INSERT INTO comment(comm) VALUES ('$selectInput')");
					header("Location:home.php?commentWritten");
	}else{
		header("Location:home.php?inputCommentField");
	}
?>