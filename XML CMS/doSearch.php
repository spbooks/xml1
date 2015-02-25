<?php
include "header.php";
$term = $_POST['term'];
?>
<html>
<head>
<title>Search Results</title>
<link href="xmlcms.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php
include "navtop.php";
?>
<div id="navSide">
		<?php include "search.php"; include "news.php";?>
</div>
<?php
$handle = opendir("xml/");
while ($file = readdir ($handle)) {
	if ($file == "." or $file == ".." or is_dir($file)) {
		continue;
	}
		
	if (eregi("news",$file) or eregi("article",$file) or eregi("webcopy",$file)){
		$articleFile = simplexml_load_file("xml/".$file);
		$catFile = simplexml_load_file("xml/category.xml");
		//loop through all the status listings

		if ((eregi($term,(string)$articleFile->keywords) 
			or eregi($term,(string)$articleFile->headline)
			or eregi($term,(string)$articleFile->abstract))
			and (string)$articleFile->status == "live"){
			
			$cid = (string)$articleFile->categoryid;
			
			if ($cid){
			foreach ($catFile->xpath('/category/item[@id='.$cid .']') as $item){
				$list['category'] = (string)$item['label'];
			} 
			}
			$list['id'] = (string)$articleFile['id'];
			$list['headline'] = (string)$articleFile->headline;
			$searchArray[] = $list;
		}//end inner if
	}//end outer if
}//end directory while



echo "<div id='mainContent'>";
if (count($searchArray)>0){
	echo "<h1>Search Results for " . $_POST['term'] ."</h1>\n";
	
	echo "<table border='1' cellspacing='0' cellpadding='3' width='85%'>\n";
	echo "<tr valign='top'>\n";
	echo "<th>Content Item</th><th>Category</th><th>Content Type</th>\n";
	echo "</tr>\n";
	foreach ($searchArray as $key => $list){
		echo "<tr valign='top'><td><a href=\"innerpage.php?id=".$list['id']."\">";
		echo $list['headline'] . "</a></td>";
		echo "<td>" . $list['category'] . "&nbsp;</td>";
		echo "<td>";
		$stripped = ereg_replace("[0123456789]","",$list['id']);
		echo $stripped;
		echo "</td>";
		echo "\n</tr>";
	}
	echo "</table>";
	
}else{
	echo "<h1>Sorry!</h1>";
	echo "No files found with the search term " . $_POST['term']."<br><br>";
}
echo "</div>";
?>
</body>
</html>