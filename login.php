<?php 
session_start();
if (isset($_POST['submitlog'])) {
	include 'db.php';
    include "includes/login.inc.php";
    $regData = new LoginUsers(mysqli_real_escape_string($conn,$_POST['mailuid']),mysqli_real_escape_string($conn,md5($_POST['pwd'])));
}
if(isset($_POST['logout-submit'])){
session_unset();
session_destroy();
ob_start();
header("location:index.php?loggedOut");
ob_end_flush(); 
include 'index.php';
exit();
}
?>