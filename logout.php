<?php
	session_start();

	session_unset();
	session_destroy();

	if (!isset($_SESSION['pass'])) {
		header("Location: login.php");
	}
	if (!isset($_SESSION['student'])) {
		header("Location: studentLogin.php");
	}
?>