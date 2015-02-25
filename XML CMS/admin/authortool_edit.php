<?php
include_once "security.php";
//lets load up the admins!
$authors = simplexml_load_file("../xml/authors.xml");
?>

<html>
<head>
<title>Author Listing Update</title>
</head>
<body>
<h1><a href="adminindex.php">Main</a>::Author Listing Update</h1>

<a href="authortool.php">Cancel</a>
<form method="post" action="updateAuthors.php">
<table border="1" cellspacing="0" cellpadding="3">
<tr>
<th>Delete?</th>
<th>Name</th>
<th>Byline</th>
<th>Email</th>
</tr>
<?php
$count=1;

foreach ($authors->author as $writer){
	echo "<tr valign='top'>\n";
	echo "<td><input type='checkbox' name='delete[".$writer['id']."]' value='yes'></td>";
	echo "<td><input type='text' name='author[". $count."][name]' value='". $writer->name . "'></td>";
	echo "<td><input type='text' name='author[". $count."][byline]' value='". $writer->byline. "'></td>";
	echo "<td><input type='text' name='author[". $count."][email]' value='". $writer->email . "'></td>";
	echo "</tr>\n";
	$count++;

}

for ($i=$count;$i < $count+3; $i++){
	echo "<tr valign='top'>\n";
	echo "<td>&nbsp;</td>";
	echo "<td><input type='text' name='author[". $i."][name]'></td>";
	echo "<td><input type='text' name='author[". $i."][byline]'></td>";
	echo "<td><input type='text' name='author[". $i."][email]'></td>";
	echo "</tr>\n";
}

?>
<tr>
<td colspan='5'><input type="submit" name="submit" value="Update"></td>
</tr>
</table>
</form>
</body>
</html>
