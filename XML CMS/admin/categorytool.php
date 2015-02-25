<?php
include_once "security.php";

//lets load up the admins!
$cats = simplexml_load_file("../xml/category.xml");
?>

<html>
<head>
<title>Category Index</title>
</head>
<body>
<h1><a href="adminindex.php">Main</a>::Category Index</h1>
<a href="categorytool_edit.php">Update Category Listing</a>

<p>Categories</p>
<ul>
<?php
foreach ($cats->item as $item){
	echo $item['label']." (". $item['status'].")<br>";

}

?>
</ul>
</body>
</html>
