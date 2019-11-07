<?php require 'loggedIN.php' ?>
<?php if (isset($_SESSION['pwd']) && isset($_SESSION['mail'])) { 
			include 'db.php';
?>
<main class="homeMain">
	<div class="wrapper-main">
		<section class="section-default">
			<form method="post" action="postCodeResult.php">
				<textarea name="articleinp" class="article1" placeholder="What You Think?"></textarea>
					<br><br>
				<input type="hidden" name="id" value="<?php $_SESSION['mail']?>">
				<div class="postForm">
					<input class="postsubmit" type="submit" name="postsubmit" value="POST">
				</div>
			</form>
		</section>						
	</div>
</main>
<?php
		$mail = $_SESSION['mail'];
		$id = mysqli_query($conn,"SELECT * FROM users WHERE mail = '$mail'");
		$result1 = mysqli_fetch_assoc($id);
		$result = $result1['id'];
		$result2=mysqli_query($conn,"SELECT * FROM classes INNER JOIN users WHERE users.mail = '$mail' ORDER BY classes.id DESC;");
		$inPutQuery = mysqli_query($conn,"SELECT * FROM users INNER JOIN classes WHERE users.mail = '$mail'");
		while($data2 = mysqli_fetch_assoc($result2)){
			$postIdData = mysqli_fetch_assoc($inPutQuery);
?>
		<!-- To Input-Output Post -->

			<div name="posted" class="postTextArea">			
				<div class="usernamePost"><p><b><?php echo"Posted By : ".$data2['user_uid']; ?></b></p></div>
				<p style="margin:10px;font-size:17px;"><b><?php echo $data2['content'] ?></b></p>
				<form action="likeHomePost.php" method="POST">
					<input type="hidden" name="postid" value="<?php echo $data2['id']?>">
					<button class="likeHomePost" name="likeIsset">Like</button>
					<div class="likesubmit" ><p style="margin:5px;"><?php echo $data2['likes']; ?></p></div>
				</form>
			</div>

		<!-- To Input Comment -->

		<div class="CommentPlace">
			<form method="POST" action="commentHome.php">
				<input type="text" name="commentInputType" placeholder="<?php echo "Tell what you think to - ".$data2['user_uid']?>">
				<input type="hidden" name="id" value="<?php echo $data2['id']?>">
				<input type="hidden" name="uid" value="<?php echo $postIdData['id']?>">
				<input type="hidden" name="username" value="<?php echo $postIdData['uid']?>">
				<button type="submit" name="commentButtonSend">Send</button>
			</form>
			
<?php 
		include 'commentHome.php';	
	
	?> <!-- To OutPut Comment --> <?php

$selectTogether = mysqli_query($conn,"SELECT * FROM classes INNER JOIN comment WHERE comment.user_comm = classes.id  ORDER BY comment.comment_id DESC");

while($selectData = mysqli_fetch_assoc($selectTogether)){
	if($selectData['id'] == $selectData['user_comm']){
?> 
	<div class='commentWrite'>
<?php
		echo $selectData['user_name']." : ".$selectData['comm']."<br>";
		if($data2['id'] == $selectData['post_id']){
?> 
			<a href="home.php?delete=<?php echo $selectData['comment_id'] ?>" style ='float:right;margin-top: -18px;text-decoration: none;color:darkred;'>Delete</a>
<?php 
		}

?>
	</div> 
<?php 
	}
}
	

	?> <!-- To Delete Comment --> <?php

	if (isset($_GET['delete'])) {
		$id = $_GET['delete'];
		$id = mysqli_real_escape_string($conn,$id);
		$id = htmlspecialchars($id);

		$pattern ='/^[-a-zA-Z0-9_\x{30A0}-\x{30FF}'
         .'\x{3040}-\x{309F}\x{4E00}-\x{9FBF}\s]*$/u';

		if (preg_match($pattern,$id)) { 
   			mysqli_query($conn,"DELETE FROM comment WHERE comment_id = '$id'");
		} 
		else { 
    		header("Location:home.php?delete=");
		} 
		
	}

?>			
	</div><?php
}
?>
<?php
require 'footer.php'; 
}

?>