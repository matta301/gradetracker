<?php
	//session_start();
/*
	$user = $_SESSION['firstname'];
	echo $user;
*/

	/*print_r($_SESSION);*/

?>

<?php
session_start();
if (!isset($_SESSION['count'])) {
  $_SESSION['count'] = 0;
} else {
  $_SESSION['count']++;
}
?>

<p>
Hello visitor, you have seen this page <?php echo $_SESSION['count']; ?> times.
</p>

<p>
To continue, <a href="nextpage.php?<?php echo htmlspecialchars(SID); ?>">click
here</a>.
</p>