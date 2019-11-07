<?php 
	require 'header.php';
?>
	<main class="signupMain">
		<div class="wrapper-main">
			<section class="section-default">
				<?php if(isset($_POST['submitsignup'])) {
					require 'signup-result.php';
				?>
				<form class="form-signup" action="signup-result.php" method="post">
					<input type="text" name="uidsignup" placeholder="Username"><br><br>
					<input type="email" name="mailsignup" placeholder="E-mail"><br><br>
					<input type="password" name="pwdsignup" placeholder="Password.."><br>
					<button type="submitsign" name="signup-submit" class="phpsubmitsignup">Signup</button>
				</form>
				<?php } ?>
			</section>
		</div>
	</main>
<?php 
	require 'footer.php';
?>