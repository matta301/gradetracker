<?php


function clean_input($data) {

	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);

	return $data;
}




function login($username, $loginPassword){

	// DB connection
	global $connect;

	// Performs query that returns the username, firstname and password
	$loginQuery = $connect->query(
									"SELECT `username`, `firstname`, `email`, `password` 
								   	 FROM `members` WHERE `username` = '$username'"
						   		 );

	// Stores the result as an Assoc Array	
	if ($loginQuery) {
	
		$result = $loginQuery->fetch_assoc();		
		
		// Closes DB connection
		mysqli_close($connect);

		// User input is matched against DB records and password verified
		if ($username === $result['username'] && password_verify($loginPassword, $result['password'])) {

			// If resutls have been found within the database then retuns array with results
	 		return array($result['username'], $result['firstname']);	
			
		}else {
			// If no matching results retun false
			return false;
		}

	}else {

		//	If query is false returns false 
		return false;
	}
}

?>