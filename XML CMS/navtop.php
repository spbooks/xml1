<div id="navTop">
<a href="index.php"><img src="images/logo.gif" border="0"/></a>&nbsp;
<?php

$handle = opendir("xml/");
while ($file = readdir ($handle)) {
	if ($file == "." or $file == ".." or is_dir($file)) {
		continue;
	}
		
	if (eregi("webcopy",$file)){
		$articleFile = simplexml_load_file("xml/".$file);
		//loop through all the status listings

		if ((string)$articleFile->status == "live"){
			$xid = (string)$articleFile['id'];
			$hl = (string)$articleFile->navigationlabel;
			$topArray[$xid] = $hl;
		}//end inner if
	}//end outer if
}//end directory while
//now we take the result array from above and loop through it to get information
//from our XML webcopy files
//
//the resulting links will be placed on the page with two spaces in between
//each of them horizontally
//
foreach ($topArray as $key => $value){
	echo "<a href=\"innerpage.php?id=".$key."\">";
	echo $value;
	echo "</a>&nbsp;&nbsp;";
}
?>
</div>