<?php 
include 'loggedIN.php';
if (isset($_SESSION['mail']) && isset($_SESSION['pwd'])) {
?>

<div class="profileSettings" >
	<form action="profileResult.php" method="POST">
		<input type="name" name="profileUid" placeholder="username..">
			<br>
		<input type="password" name="profilePwd" placeholder="password..">
			<br>
		<input type="password" name="profilePwd2" placeholder="New Password">
			<br>
		<button type="submit" name="profileSubmit">Click</button>
	</form>
</div>

<?php 
include 'footer.php';
}
?>