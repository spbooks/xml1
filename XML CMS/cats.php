<?php
include "header.php";
?>
<html>
<head>
<script language="Javascript" src="Sarissa.js"></script>
<script type="text/javascript">
function initMenu(xfile){
	var xmlDoc = new ActiveXObject("Microsoft.XMLDOM");
	xmlDoc.async = false;
	xmlDoc.load(xfile);
	
	var nodes=xmlDoc.documentElement.childNodes;
	var len = nodes.length;
	var output;
	for (var i=0; i<=len-1; i++){
		if (typeof nodes.item(i).getAttribute("id") == 'undefined'){
			
		}else{
	
			if (nodes.item(i).getAttribute("status") == "live"){
				/*output +=  "<a href='cats.php?catid="+ nodes.item(i).getAttribute("id")+ 
				"'>"+ nodes.item(i).getAttribute("label") + 
				"</a><br>";*/
				output += nodes.item(i).getAttribute("id") + " ";
				
			}
		}
	}
	document.getElementById("content").innerHTML = output;		
}
</script>
<link href="xmlcms.css" rel="stylesheet" type="text/css" />
<title>Browse by Category</title>
</head>
<body onLoad="initMenu('xml/category.xml')">

<?php
include "navtop.php";
?>
<div id="navSide"> 
		<?php include "search.php"; include "news.php";?>
</div>

<div id="mainContent"> 
	<h1>Browse By Category</h1>
	<div id="content"> </div>
	<hr noshade/>
	<?php
	if ($_GET['catid']){
		$handle = opendir("xml/");
		while ($file = readdir ($handle)) {
			if ($file == "." or $file == ".." or is_dir($file)) {
				continue;
			}
				
			if (eregi("news",$file) or eregi("article",$file) or eregi("webcopy",$file)){
				$articleFile = simplexml_load_file("xml/".$file);
				if ($_GET['catid'] == (string)$articleFile->categoryid 
					and (string)$articleFile->status == "live"){
					$xid = (string)$articleFile['id'];
					$hl = (string)$articleFile->headline;
					$catArray[$xid] = $hl;
				}
			}//end outer if
		}//end directory while
		if(count($catArray)>0){
		echo "<h1>Results</h1>\n";
		foreach ($catArray as $key => $value){
			echo "<a href=\"innerpage.php?id=".$key."\">";
			echo $value;
			echo "</a><br>";
		}
		}else{
			echo "No documents to display!";
		}
	}
	?>
</div>
</body>
</html>
