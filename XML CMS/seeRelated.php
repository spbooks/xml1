<?php
$incoming = $_GET['id'];
$file = simplexml_load_file("xml/". $incoming . ".xml");
$categoryID = $file->categoryid;

$handle = opendir("xml/");
while ($file = readdir ($handle)) {
	if ($file == "." or $file == ".." or is_dir($file) or !eregi("article",$file)) {
		continue;
	}
		
	$articleFile = simplexml_load_file("xml/".$file);
	if ((string)$articleFile->status == "live" and eregi("article",$_GET['id']) and (string) $articleFile['id'] != $_GET['id']){
		$xid = (string)$articleFile['id'];
		$hl = (string)$articleFile->headline;
		$abs = (string)$articleFile->abstract;
		$relate['id'] = $xid;
		$relate['headline'] = $hl;
		$relate['abstract'] = $abs;
		$relateArray[] = $relate;
	}//end inner if
}//end directory while

if (count($relateArray)>0){
	echo "<div style='background-color:#ccccff;padding:1px 3px 3px 3px;width:auto;height:auto;'>\n";
	echo "<h3>Related Articles</h3>\n";
	foreach ($relateArray as $key => $listing){
		echo "<a href=\"innerpage.php?id=".$listing['id']."\">";
		echo $listing['headline'];
		echo "</a><br>";
		echo $listing['abstract'];
		echo "<br><br>\n";
	}
	echo "\n</div>";
}
?> 
