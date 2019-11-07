<?php
include 'db.php';
if (isset($_POST['postid']) && isset($_POST['likeIsset'])) {
 	$id = $_POST['postid'];
	$b = mysqli_query($conn,"SELECT * FROM classes WHERE content = '$id'");
		while($a = mysqli_fetch_assoc($b)){
			mysqli_query($conn,"UPDATE classes SET likes=likes+1 WHERE content = '$id'");	
		}
		header("Location:home.php");
}
exit();
?>