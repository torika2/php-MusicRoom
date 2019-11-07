<?php 
if (isset($_POST['buySubmit'])) {
	include 'db.php';
	$result = mysqli_query($conn,"SELECT fasi FROM classes");
	if ($data['fasi'] == $data['fasi']) {
		echo "<a style='color:green;'>Success</a>";
	}
}
?>