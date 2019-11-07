<?php
if (isset($_POST['search']) && isset($_POST['searchSubmit'])) {
	include'db.php';
	if (!empty($_POST['search'])) {
 		$search = mysqli_real_escape_string($conn,htmlspecialchars($_POST['search']));
		$result = mysqli_query($conn,"SELECT * FROM shop WHERE product_name='$search'");
 	while($data=mysqli_fetch_assoc($result)) {
 		if ($data['product_name'] == $_POST['search']) { 
?>	
			<div class="searchResult">
				<a href="signup.php=<?php $data['id']?>"><img src="<?php echo $data['products'] ?>"></a>
			</div>
<?php

		}else{
			header("Location:index.php?incorrectProductName");
		}
	}
	}else{
		include'shopSelect2.php';
	}
}else{
	include'shopSelect2.php';
}

?>