<?php 
include "loggedIN.php";
?>
<link rel="stylesheet" type="text/css" href="style.css">
<main class="infoMain">
<?php 
	include 'db.php';
	if(isset($_GET['id'])){
		$id = $_GET['id'];
		$result = mysqli_query($conn,"SELECT * FROM shop WHERE id = '$id'");
		$data = mysqli_fetch_assoc($result);
?>
			<div class="infoImgDiv">
				<img src="<?php echo $data['products'] ?>">
					<p><b><?php echo $data['product_name'] ?></b></p>
					<div class="productionInfoFasi"><a><?php echo $data['fasi']."$" ?><a></div>
			</div>

			<div style="margin-top: -90px;margin-left: 520px;">
				<form method="POST" action="ss.php">
					<input style="background-color:darkorange;" type="submit" name="buySubmit" value="Buy Now">
				</form>
<?php 
				if (isset($_POST['buySubmit'])) {
					include 'ss.php';
				}
?>
				<br>
				<form action="productInfo.php" method="POST">
					<input style="background-color:orange;"type="submit" name="cartSubmit" value="Add To Cart">
				</form>
			</div>
			<script type="text/javascript" src="script.js"></script>
<?php 
	} 
?>
</main>
<?php
include"footer.php";
?>