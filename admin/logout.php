<?php
	session_start();
		
		$_SESSION['login_user']="";
		
	unset($_SESSION['login_user']);
		session_destroy();
		
				//echo "loged out successfully<a href='../index.php'>Login Again</a>";
				
		header('location:index.php');
?>

