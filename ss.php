<?php 
if (isset($_POST['buySubmit'])) {
	include 'db.php';
	$result = mysqli_query($conn,"SELECT * FROM classes");
	$data = mysqli_feth_assoc($result);
	var_dump($data);
	exit();
	if ($data['id'] == $_GET['id']) {
		echo "<a style='color:green;'>Success</a>";
	}
}

 ?>