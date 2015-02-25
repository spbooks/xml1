<?php
include_once "security.php";

//lets load up the admins!
$authors = simplexml_load_file("../xml/authors.xml");
?>

<html>
<head>
<title>Author Index</title>
</head>
<body>
<h1><a href="adminindex.php">Main</a>::Author Index</h1>
<a href="authortool_edit.php">Update Author Listing</a>

<p>Authors</p>
<ul>
<?php
foreach ($authors->author as $writer){
	echo $writer->name." (". $writer->email.")<br>";

}

?>
</ul>
</body>
</html>
