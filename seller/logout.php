<?php
    session_start();
        $_SESSION['seller_id']="";
        unset($_SESSION['seller_id']);
		session_destroy();
    header('location:index.php');
?>