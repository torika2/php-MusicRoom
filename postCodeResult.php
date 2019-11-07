<?php 
		session_start();
if (isset($_POST['postsubmit']) && isset($_POST['id'])) {
	include 'db.php';
		include 'postCode.php';

		$postData = new postResult(htmlspecialchars($_POST['articleinp']),$_POST['id']);
}else{
	header("Location:home.php?EnterInputToPost");
	exit();
}

?>