<?php

	require_once("../config.php");



	$pass = 'password';	

	$crypt = password_hash($pass, PASSWORD_BCRYPT);
	

	// Performs query that returns the username, firstname and password
	$newMemberQuery = $connect->query("INSERT INTO `members`(`username`, `firstname`, `email`, `password`)
								    VALUES ('joe','matthew','matt_a70@hotmail.com','$crypt')");


	if ($newMemberQuery) {
		echo 'Success';
	}else {
		echo 'Error';
	}

?>