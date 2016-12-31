<?php
	# Start session
	session_start();
	

	unset($_POST);
	unset($_SESSION['user']);

	$_SESSION['user']['valid'] = 'false';
	$_SESSION['message'] = '<p>Uspješno ste se odjavili!</p>';
	
	header("Location: index.php?menu=5");
	exit;

