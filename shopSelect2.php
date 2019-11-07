<?php
if (isset($_SESSION['mail']) && isset($_SESSION['pwd'])) {
	$result = mysqli_query($conn,"SELECT * FROM shop ");
?>
	<?php while($data = mysqli_fetch_assoc($result)){?>	
		<div class="searchResult">
			<a href="shop.php <?php echo $data['id']?>"><img src="<?php echo $data['products'] ?>"></a>
		</div>
<?php
		}
}else{
	$result = mysqli_query($conn,"SELECT * FROM shop ");
?>
	<?php while($data = mysqli_fetch_assoc($result)){?>	
		<div class="searchResult">
			<a href='signup.php'><img src="<?php echo $data['products'] ?>"></a>
		</div>
<?php
		}
}