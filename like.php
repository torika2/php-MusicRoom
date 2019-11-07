<?php
include 'db.php';
if (isset($_POST['postrid'])) {
 	$like = $_POST['postrid'];
	$b = mysqli_query($conn,"SELECT * FROM classes WHERE id = '$like'");
	while($a = mysqli_fetch_assoc($b)){	
			mysqli_query($conn,"UPDATE classes SET likes=likes+1 WHERE id = '$like'");
			header("Location:postHTML.php");
		}
}
exit();
?>