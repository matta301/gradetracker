<?php

	$className = 'login-page';

	// Load config and header file
    require_once("../resources/config.php");
   	require_once("../resources/functions.php");
	require_once(TEMPLATES_PATH . "/header.php");

?>
<?php
		
		$noMatch = $output ='';

		// Form submission
		if ($_SERVER["REQUEST_METHOD"] == "POST")
		{
			// User input is processed and cleaned
			$username 		= clean_input($_POST['username']);
			$loginPassword  = clean_input($_POST['password']);

			// Passes username and password through to login function 
			$sessionDetails = login($username, $loginPassword);
			
			
			// If a matching record is found page is redirected to admin screen
			if ($sessionDetails == false) 
			{
				// Error message is displayed if there are no matching records
				$noMatch = 'Sorry there are no matching records';

			} else {

				session_start();

				$_SESSION['username']  = $sessionDetails[0];
				$_SESSION['firstname'] = $sessionDetails[1];			

				header('Location: /gradetracker.git/trunk/public_html/admin.php');		
			}	

		}









?>
<style type="text/css">
	
	.login-page {}
	.login-page .log-in-container {
		border: 1px solid firebrick;
		position: absolute;
		left: 0;
		right: 0;
		margin: auto;
		top: 50%;
		transform: translateY(-50%);
		-webkit-transform: translateY(-50%);
		-moz-transform: translateY(-50%);
		-o-transform: translateY(-50%);
		padding: 2em;
	}

	


</style>
<section class="log-in-container small-11 medium-6 large-4 small-centered">

	<form action="" method="post">

		Username
		<input type="text" name="username">

		Password
		<input type="password" name="password">
		<p><?php echo $noMatch; ?></p>
		<input type="submit" value="submit">
	</form>

</section>
<?php // require_once(TEMPLATES_PATH . "/footer.php"); ?>