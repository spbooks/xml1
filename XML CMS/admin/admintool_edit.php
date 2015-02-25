<?php
include_once "security.php";

//lets load up the admins!
$admins = simplexml_load_file("../xml/admin.xml");
?>

<html>
<head>
<title>Admin Listing Update</title>
</head>
<body>
<h1><a href="adminindex.php">Main</a>::Admin Listing Update</h1>

<a href="admintool.php">Cancel</a>
<form method="post" action="updateAdmins.php">
<table border="1" cellspacing="0" cellpadding="3">
<tr>
<th>Delete?</th>
<th>Name</th>
<th>Username</th>
<th>Password</th>
<th>Email</th>
</tr>
<?php
$count=1;

foreach ($admins->admin as $admin){
	echo "<tr valign='top'>\n";
	echo "<td><input type='checkbox' name='delete[".$admin['ID']."]' value='yes'></td>";
	echo "<td><input type='text' name='admin[". $count."][name]' value='". $admin->name . "'></td>";
	echo "<td><input type='text' name='admin[". $count."][username]' value='". $admin->username . "'></td>";
	echo "<td><input type='text' name='admin[". $count."][password]' value='". $admin->password . "'></td>";
	echo "<td><input type='text' name='admin[". $count."][email]' value='". $admin->email . "' size='40'></td>";
	echo "</tr>\n";
	$count++;

}

for ($i=$count;$i < $count+3; $i++){
	echo "<tr valign='top'>\n";
	echo "<td>&nbsp;</td>";
	echo "<td><input type='text' name='admin[". $i."][name]'></td>";
	echo "<td><input type='text' name='admin[". $i."][username]'></td>";
	echo "<td><input type='text' name='admin[". $i."][password]'></td>";
	echo "<td><input type='text' name='admin[". $i."][email]' size='40'></td>";
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
