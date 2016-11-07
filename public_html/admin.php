<?php
	session_start();

	// If session details have not been set then the page is redirected back to index
	if (!isset($_SESSION['username']) && !isset($_SESSION['firstname'])) {
		header('Location: index.php');
	}

	var_dump($_SESSION['username']);
	$loggedFirstname = $_SESSION['firstname'];

	
	// load config and header file
    require_once("../resources/config.php");
    require_once("../resources/functions.php");
	require_once(TEMPLATES_PATH . "/header.php");
?>



Hello <?php echo $loggedFirstname; ?>







<?php require_once(TEMPLATES_PATH . "/footer.php"); ?>