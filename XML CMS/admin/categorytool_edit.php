<?php
include_once "security.php";

//lets load up the admins!
$cats = simplexml_load_file("../xml/category.xml");
?>

<html>
<head>
<title>Admin Listing Update</title>
</head>
<body>
<h1><a href="adminindex.php">Main</a>::Category Listing Update</h1>

<a href="categorytool.php">Cancel</a>
<form method="post" action="updateCats.php">
<table border="1" cellspacing="0" cellpadding="3">
<tr>
<th>Delete?</th>
<th>Label</th>
<th>Status</th>
</tr>
<?php
$count=1;

foreach ($cats->item as $item){
	echo "<tr valign='top'>\n";
	echo "<td><input type='checkbox' name='delete[".$item['id']."]' value='yes'></td>";
	echo "<td><input type='text' name='cat[". $count."][label]' value='". $item['label'] . "'></td>";
	echo "<td><select name='cat[". $count."][status]'>";
	echo "<option value='live'>live</option>\n<option value='in progress'>in progress</option>\n</select></td>";
	echo "</tr>\n";
	$count++;

}

for ($i=$count;$i < $count+3; $i++){
	echo "<tr valign='top'>\n";
	echo "<td>&nbsp;</td>";
	echo "<td><input type='text' name='cat[". $i."][label]'></td>";
	echo "<td><select name='cat[". $count."][status]'>";
	echo "<option value='live'>live</option>\n<option value='in progress'>in progress</option>\n</select></td>";
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
