<?php
include "header.php";
//open the file with the given incoming ID
$inner = simplexml_load_file($fileDir.$_GET['id'] . ".xml");
?>
<html>
<head>
<title><?php echo $inner->navigationlabel; ?></title>
<link href="xmlcms.css" rel="stylesheet" type="text/css" />
</head>
<body>

<?php
include "navtop.php";
?>
<div id="navSide"> 
		<?php include "search.php"; include "news.php";?>
</div>

<div id="mainContent"> 
<?php
echo "<h1>". stripslashes($inner->headline) . "</h1>";
echo "<small>". stripslashes($inner->description) . "</small>";
echo "<br>";
echo $inner->body;

if (eregi("news", $_GET['id'])){
	echo "<br>link: <a href='".$inner->url . "'>". $inner->url."</a>";
}
?>
<br>
<?php
if (eregi("article",$_GET['id'])){
	include_once "seeRelated.php";
}
?>
</div>
</body>
</html>