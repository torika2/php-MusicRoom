<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<header class="headerPhp">
	<nav>
		<a href="#">
			<img src="img/yamaha.png" alt="logo">
		</a>
		<ul style="margin-top: -62px;">
			<li> <a name="index" href="index.php">HOME</a> </li>
			<li> <a href="" style="color:orange;"><b>SHOP</b></a> </li>
			<li> <a href="#">CONTACT</a> </li>
		</ul>
			<form method="POST" action="login.php" class="form1">
				<input class="inp1" type="email" name="mailuid" placeholder="E-mail ..">
				<input class='inp2'type="password" name="pwd" placeholder="Password...">
				<button class="login-submit" type="submit" name="submitlog">LOGIN</button>
			</form>
			<form method="POST" action="signup.php" class="signupForm">
				<input type="submit" name="submitsignup" class="signup" value="SIGN UP">
			</form>

	</nav>
</header>









