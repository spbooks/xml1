<?php
include_once "security.php";
$dir = "../xml/";
$filetoburn = $dir .  $_GET['id'] . ".xml";
unlink($filetoburn);

header("Location: articletool.php");
?>
