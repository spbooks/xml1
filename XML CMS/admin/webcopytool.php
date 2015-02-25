<?php
include_once "security.php";

//lets load up the articles!

$handle = opendir("../xml/");
while ($file = readdir ($handle)) {
	if ($file == "." or $file == ".." or is_dir($file)) {
		continue;
	}
		
	if (eregi("webcopy",$file)){
		$articleFile = simplexml_load_file("../xml/".$file);
		//loop through all the status listings
		$xid = (string)$articleFile['id'];
		$hl = (string)$articleFile->headline;
		$listArray[$xid] = $hl;
	}//end outer if
}//end directory while
?>

<html>
<head>
<title>Web Copy Index</title>
<script>
function confirmDelete(processID)
{
	var msg = "Do you really want to delete " + processID + "?\n\nWARNING: Deletion is final!";
	if (confirm(msg))
	{
		location.href = "webcopytool_delete.php?id=" + processID;
	}
}
</script>

</head>
<body>
<h1><a href="adminindex.php">Main</a>::Web Copy Index</h1>
<br><a href="webcopytool_create.php">Create New Web Copy</a><br>
<br><a href="adminindex.php">Cancel</a><br>

<ul>
<?php
if (count($listArray)>0){
	foreach ($listArray as $key => $value){
		echo "<li>". $value;
		echo "&nbsp;<a href=\"webcopytool_edit.php?id=".$key."\">edit</a>&nbsp;";
		echo "&nbsp;<a href=\"javascript:confirmDelete('".$key."')\">delete</a></li>";
	}
}
?>
</ul>
</body>
</html>
