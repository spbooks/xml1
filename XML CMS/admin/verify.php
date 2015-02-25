<?php
session_start();
$admins = simplexml_load_file("../xml/admin.xml");



foreach ($admins->admin as $admin){
	if (($_POST["username"] == (string) $admin->username) and ($_POST["password"] == (string)$admin->password)){
		$_SESSION["login"] = "true";
		header("Location:adminindex.php");
		exit;
	}
}

//we didn't find anything, so we will exit back to the home page
$_SESSION["error"] = "<font color=red>Wrong username or password. Try again.</font>";
header("Location:login.php");
?>
