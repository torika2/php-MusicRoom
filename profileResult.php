<?php
session_start();
if (isset($_POST['profileUid']) && isset($_POST['profilePwd']) && isset($_POST['profilePwd2']) && isset($_POST['profileSubmit'])) {
	$pwd = md5($_POST['profilePwd2']);
	$pwdLast = md5($_POST['profilePwd']);
	if (!empty($_POST['profileUid']) && !empty($_POST['profilePwd']) && !empty($_POST['profilePwd2'])) {
		include 'db.php';
		if ($pwd !== $pwdLast) {
			$mail = $_SESSION['mail'];
			$query = mysqli_query($conn,"SELECT * FROM users WHERE mail = '$mail'");
			$result = mysqli_fetch_assoc($query);
			if ($result['uid'] == $_POST['profileUid'] && $result['pwd'] ==  $pwdLast) {
				$update = mysqli_query($conn,"UPDATE users SET pwd = '$pwd' WHERE mail = '$mail'");
				header("Location:profile.php?changedSuccessfully");
				if ($update) {
					header("Location:profile.php?succesfullyChanged");
				}else{
					header("Location:profile.php?queyIsNotWorking");
				}
			}else{
				header("Location:profile.php?fieldsIsNotCorrect");
			}
		}else{
			header("Location:profile.php?passwordsEqualEachother");
		}
	}else{
		header("Location:profile.php?emptyFields");
	}
}

?>