<?php
include_once "security.php";
//pull in the XML file

if ($_GET['id'] == ""){

	echo "<h2>You didn't choose a file to edit!</h2>";
	echo "<a href=\"webcopytool.php\">Go back to index and choose a file</a>";
	exit;
} else {

$file = simplexml_load_file("../xml/". $_GET['id'].".xml");
?>
<html>
<title>Edit Web Copy</title>
<body>
<h1>Edit Web Copy</h1>

<a href="webcopytool.php">Cancel</a><br><br>
<form name="editArticle" action="updateCopy.php" method="post">
  <table border=1 cellspacing=0 cellpadding=3>
    <tr valign=top> 
      <td width="135">Web Copy ID</td>
      <td width="634"> <?php echo $_GET['id'];?><input type="hidden" name="id" value="<?php echo $_GET['id']; ?>"></td>
    </tr>
    <tr valign=top> 
      <td>Headline</td>
      <td> <input name="headline" type="text" id="headline" size="60" value="<?php echo $file->headline;?>"></td>
    </tr>

    <tr valign=top> 
      <td>Navigation Label</td>
      <td> <input name="navlabel" type="text" id="headline" size="60" value="<?php echo $file->navigationlabel;?>"></td>
    </tr>
    <tr valign=top> 
      <td>Creation Date</td>
      <td><?php echo $file->pubdate;?><input type="hidden" name="pubdate" value="<?php echo $file->pubdate; ?>"></td>
    </tr>
    <tr valign=top> 
      <td>Status</td>
      <td><select name="status">
          <option value="in progress">In progress</option>
          <option value="live">Live</option>
          <option value="Expired">Expired</option>
        </select></td>
    </tr>
    <tr valign=top> 
      <td>Description</td>
      <td><textarea name="description" cols="50" rows="5" id="description"><?php echo $file->description;?></textarea></td>
    </tr>
    <tr valign=top> 
      <td> <p>Content<br>
        </p></td>
      <td> <p>Copy and paste HTML:</p>
        <p> 
          <textarea name="body" cols="70" rows="10" wrap="soft" id="body"><?php echo stripslashes($file->body);?></textarea>
        </p>
        <p>&nbsp; </p></td>
    </tr>
    <tr valign=top> 
      <td colspan=2> <div align="center"> 
          <input type="submit" name="Edit Web Copy" value="Edit Web Copy">
          &nbsp; 
          <input name="reset" type="reset" id="reset" value="Reset">
        </div></td>
    </tr>
  </table>
</form>
</body>
</html>
<?php
}
?>