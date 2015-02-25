<?php
session_start();
if ($_SESSION["login"] != "true"){
	header("Location:login.php");
	$_SESSION["error"] = "<font color=red>You don't have privileges to see the admin page.</font>";
	exit;
}

?>
