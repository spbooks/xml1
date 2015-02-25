<?php
include_once "security.php";

$handle = opendir("../xml/");
while ($file = readdir ($handle)) {
	if ($file == "." or $file == ".." or is_dir($file)) {
		continue;
	}
		
	if (eregi("article",$file)){
		$articleFile = simplexml_load_file("../xml/".$file);
		if ((string)$articleFile->status == "live"){
			$xid = (string)$articleFile['id'];
			$hl = (string)$articleFile->headline;
			$abs = (string)$articleFile->abstract;
			$list['id'] = $xid;
			$list['headline'] = $hl;
			$list['abs'] = $abs;
			$listArray[] = $list;
		}//end inner if
	}//end outer if
}//end directory while
?>

<html>
<head>
<title>Create RSS Feed</title>
</head>
<body>
<h1><a href="adminindex.php">Admin</a>::Create RSS Feed</h1>
<br><a href="adminindex.php">Cancel</a><br>
<p>Please check the box next to articles you want to add to the RSS feed:</p>

<form action="rsstool_commit.php" method="post">
<?php
if (count($listArray)>0){
	foreach ($listArray as $key=> $list){
		echo "<input type='checkbox' name='allow[". $list['id']."]' value='yes'> ". $list['headline'];
		echo "\n&nbsp;<input type='hidden' name='title[".$list['id']."]' value='".$list['headline']."'>";
		echo "\n&nbsp;<input type='hidden' name='description[".$list['id']."]' value='".$list['abs']."'>";
		echo "<br>";
	}
?>
<br>
<input type="submit" name="submit" value="Build RSS Feed">
<?php
}else{
	echo "<b>Sorry, there are no live articles to publish!</b>";
}

?>
</form>
</body>
</html>
