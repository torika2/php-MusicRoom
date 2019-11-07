<?php
if (isset($_SESSION['pwd']) && isset($_SESSION['mail'])) {
		include 'db.php';
		$mail = $_SESSION['mail'];
		$id = mysqli_query($conn,"SELECT * FROM users WHERE mail = '$mail'");
		$result1 = mysqli_fetch_assoc($id);
		$result = $result1['id'];
		$result2=mysqli_query($conn,"SELECT * FROM classes WHERE user_id = '$result'ORDER BY id DESC");

		while($data2 = mysqli_fetch_assoc($result2)){
?>
			<div name="posted" class="postTextArea">			
				<div class="deleteButton"><a href="postHTML.php?delete=<?php echo $data2['id']; ?>">DELETE</a></div>
				<p style="margin:10px;font-size:17px;"><b><?php echo $data2['content'] ?></b></p>
					<form action="like.php" method="POST">
						<input type="hidden" name="postrid" value="<?php echo $data2['id']?>">
						<input class="likesubmit2"  type="submit" value='Like'>
						<div class="likesubmit" ><p style="margin:5px;"><?php echo $data2['likes']; ?></p></div>
					</form>
			</div>
			<br>
<?php
			
		}
		if (isset($_GET['delete'])) {
			$id_delete = $_GET['delete'];
			mysqli_query($conn,"DELETE FROM `classes` WHERE id = '$id_delete'");
		}

}