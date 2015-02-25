<?php
include_once "security.php";

$handle = opendir("../xml/");
while ($file = readdir ($handle)) {
	if ($file == "." or $file == ".." or is_dir($file)) {
		continue;
	}
		
	if (eregi("news",$file)){
		$articleFile = simplexml_load_file("../xml/".$file);
		$xid = (string)$articleFile['id'];
		$hl = (string)$articleFile->headline;
		$listArray[$xid] = $hl;
	}//end outer if
}//end directory while
?>
<html>
<head>
<title>News Index</title>
<script>
function confirmDelete(processID)
{
	var msg = "Do you really want to delete " + processID + "?\n\nWARNING: Deletion is final!";
	if (confirm(msg))
	{
		location.href = "newstool_delete.php?id=" + processID;
	}
}
</script>

</head>
<body>
<h1><a href="adminindex.php">Main</a>::News Index</h1>
<br><a href="newstool_create.php">Create News Item</a><br>
<ul>
<?php

if (count($listArray)>0){
	foreach ($listArray as $key => $value){
		echo "<li>". $value;
		echo "&nbsp;<a href=\"newstool_edit.php?id=". $key ."\">edit</a>&nbsp;";
		echo "&nbsp;<a href=\"javascript:confirmDelete('".$key."')\">delete</a></li>";
	}
}
?>
</ul>
</body>
</html>
