<?php
require_once "header.php";
include'db.php';
?>

<link rel="stylesheet" type="text/css" href="indexStyle.css">

<main class="indexMain">
	<article class="indexArticle" style="border: solid 3px lightgrey;border-radius:3px;">
		<!-- Search Form -->
	<form style="margin:10px;" method="post" action="index.php">
		<input type="search" class="searchInp" name="search" placeholder="Search...">
		<input type="submit" class="searchSubmit" name="searchSubmit" value="Search">
		<a href="index.php" class='indexA'>X</a>
	</form>
	
	<?php
		require 'shopSelect.php';
	?>
		
	</article>
	<br><br>
			<!-- Product Output -->
	<article class="indexArticle2">
		<div class="someonePosting"><?php 
			$result = mysqli_query($conn,"SELECT content,created_at FROM classes;");
			while($data = mysqli_fetch_assoc($result)){
				echo "Someone's Posting :".$data['content']." ".$data['created_at']."<br>";
			}
		?></div>
	</article>
</main>
<aside class="aside">
	<li>
		<ul><a href="shop.php">Guitars</a></ul>
		<ul><a href="#">Drums</a></ul>
		<ul><a href="#">Pianos</a></ul>
		<ul><a href="#">Saxophone</a></ul>
	</li>
</aside>
<?php 
require 'footer.php';
?>