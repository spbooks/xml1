<?php
include_once "security.php";

//lets load up the admins!
$admins = simplexml_load_file("../xml/admin.xml");
?>

<html>
<head>
<title>Admin Index</title>
</head>
<body>
<h1><a href="adminindex.php">Main</a>::Admin Index</h1>
<a href="admintool_edit.php">Update Admin Listing</a>

<p>Available Admins</p>
<ul>
<?php
foreach ($admins->admin as $admin){
	echo $admin->name . "(" . $admin->email . ")<br>";

}

?>
</ul>
</body>
</html>
