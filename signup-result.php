<?php 
	if (isset($_POST['signup-submit'])) {
		include 'db.php';
		include "includes/signup.inc.php";

		$regData = new NewClass(mysqli_real_escape_string($conn,$_POST['uidsignup']),mysqli_real_escape_string($conn,$_POST['mailsignup']),mysqli_real_escape_string($conn,md5($_POST['pwdsignup'])));

	}
?>