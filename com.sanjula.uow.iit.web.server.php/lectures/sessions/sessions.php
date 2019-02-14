<?php
		session_start();
		$_SESSION['user'] = $_POST['username'];
		$_SESSION['id'] = $_POST['id'];
		header('location: sessions_welcome.php');
?>