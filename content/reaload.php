<?php  
	session_start()
	//Valida si la session esta creada, si no redirecciona al login
	if (!isset($_SESSION['user'])) {
		header('Location: login.php');
	}
?>