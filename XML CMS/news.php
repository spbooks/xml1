<?php

$handle = opendir("xml/");
while ($file = readdir ($handle)) {
	if ($file == "." or $file == ".." or is_dir($file)) {
		continue;
	}
		
	if (eregi("news",$file)){
		$articleFile = simplexml_load_file("xml/".$file);
		//loop through all the status listings

		if ((string)$articleFile->status =="live"){
			$xid = (string)$articleFile['id'];
			$hl = (string)$articleFile->headline;
			$newsArray[$xid] = $hl;
		}//end inner if
	}//end outer if
}//end directory while

//now we take the result array from above and loop through it to get information
//from our XML webcopy files
//
//the resulting links will be placed on the page with a vertical break
//
if (count($newsArray)>0){
echo "<h1>News</h1>";
foreach ($newsArray as $key => $value){
	echo "<a href=\"innerpage.php?id=".$key."\">";
	echo $value;
	echo "</a><br>";

}
}
?>
