												<?php session_start(); ?>
<?php if(isset($_SESSION['pwd']) && isset($_SESSION['mail'])) { ?>
<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<header>
	<nav>

		<a href="home.php" class="home">
			<img src="img/yamaha.png" alt="logo">
		</a>
		<div class="imageSelect" >
           <img src="img/man.jpg" style="height: 70px; width: 65px;margin:auto;">
        </div>
		<ul>
			<li> <a href="home.php">HOME</a> </li>
			<li> <a href="postHTML.php">POSTS</a> </li>
			<li> <a href="shop.php" style="color:orange;"><b>SHOP</b></a> </li>
			<li> <a href="home.php">CONTACT</a> </li>
		</ul>
		<div class="forms">
			</div>
			<div class='usernameFieldDiv'>
			<a href="profile.php" class="usernameField"><?php echo $_SESSION['uid'] ?></a>
			</div>
			<div class="signup-button">
				<form method="POST" action="login.php" class="form2">
                    <button class="submit-logout" type="submit" name="logout-submit">LOGOUT</button>
                </form>
			</div>
		</div>
	</nav>
</header>
<?php
	}else{
		header("Location:index.php?youAreNotLoggedIn");
		exit();
	}
?>








