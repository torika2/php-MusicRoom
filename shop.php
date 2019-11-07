<?php 
include "loggedIN.php";
if (isset($_SESSION['mail']) && isset($_SESSION['pwd'])) {
?>
<link rel="stylesheet" type="text/css" href="style.css">
	<form style="margin:10px;" method="POST" action="shop.php">
		<input type="search" class="searchInp" name="search" placeholder="Search...">
		<input type="number" class="searchFasi" name="searchFasi" placeholder="0$">
		<input type="number" class="searchFasi" name="searchFasi2" placeholder="2000$">
		<input type="submit" class="searchSubmit" name="searchSubmit" value="Search">
		<a href="shop.php" class='indexA'>X</a>
	</form>
<main class="sellMain">
<?php 
	if (isset($_POST['search']) && isset($_POST['searchSubmit']) || isset($_POST['searchFasi1']) && isset($_POST['searchSubmit'])) {
		include "db.php";
		$product = mysqli_real_escape_string($conn,$_POST['search']);
		$result = mysqli_query($conn,"SELECT * FROM shop WHERE product_name = '$product'");
		
?>
	<?php while($data = mysqli_fetch_assoc($result)){?>	
		<div class="guitarSell">
			<a href="productInfo.php?id=<?php echo $data['id']?>" ><img src="<?php echo $data['products'] ?>"></a>
		</div>
<?php 
		}
		if (isset($_POST['searchFasi']) && isset($_POST['searchFasi2']) && isset($_POST['searchSubmit'])) {
			$fasi = mysqli_real_escape_string($conn,$_POST['searchFasi']);
			$fasi2 = mysqli_real_escape_string($conn,$_POST['searchFasi2']);
			$result = mysqli_query($conn,"SELECT id,products,fasi FROM shop WHERE fasi BETWEEN '$fasi' AND '$fasi2'");
			while($data = mysqli_fetch_assoc($result)){ ?>	
				<div class="guitarSell">
			<a href="productInfo.php?id=<?php echo $data['id']?>" ><img src="<?php echo $data['products'] ?>"></a>
				</div>
<?php 
			}
		}
	}elseif(!isset($_POST['search']) && !isset($_POST['searchSubmit']) && !isset($_POST['searchFasi']) && !isset($_POST['searchFasi2'])){
		include "db.php";
		$result = mysqli_query($conn,"SELECT * FROM shop ");
?>
	<?php while($data = mysqli_fetch_assoc($result)){?>	
		<div class="guitarSell">
			<a href="productInfo.php?id=<?php echo $data['id']?>" ><img src="<?php echo $data['products'] ?>"></a>
		</div>

<?php 
		}
	}
include"footer.php";
}else{
	header("Location:index.php?youHaveToLogin");
}
?>