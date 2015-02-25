<?php
include_once "security.php";
//pull in the XML file

if ($_GET['id']== ""){

	echo "<h2>You didn't choose a file to edit!</h2>";
	echo "<a href=\"newstool.php\">Go back to index and choose a file</a>";
	exit;
} else {
$file = simplexml_load_file("../xml/". $_GET['id'].".xml");
	
?>
<html>
<title>Edit an XML News Item</title>
<body>
<h1>Edit an XML News Item</h1>

<a href="newstool.php">Cancel</a><br><br>
<form name="editNews" action="updateNews.php" method="post">
  <table border=1 cellspacing=0 cellpadding=3>
    <tr valign=top> 
      <td width="135">News ID</td>
<td width="634"> <?php echo $_GET['id'];?><input type="hidden" name="id" value="<?php echo $_GET['id']; ?>"></td>
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
      <td>Headline</td>
      <td> <input name="headline" type="text" id="headline" size="60" value="<?php echo stripslashes($file->headline);?>"></td>
    </tr>
    <tr valign=top> 
      <td>Creation Date</td>
      <td><?php echo $file->pubdate;?><input type="hidden" name="pubdate" value="<?php echo $_GET['id']; ?>"></td>
    </tr>
    <tr valign=top> 
      <td>Author</td>
      <td> <select name="authorid" id="authorid">
	<?php
	$aList = simplexml_load_file("../xml/authors.xml");
	foreach ($aList->xpath("author") as $author){
		if ((string)$author['id'] == (string)$file->authorid){
			echo "<option value='". $author['id']."' selected>". $author->name."</option>\n";
		
		}else{
			echo "<option value='". $author['id']."'>". $author->name."</option>\n";
		}
	}
	?>
        </select></td>
    </tr>
    <tr valign=top> 
      <td>Category</td>
      <td><select name="categoryid" id="categoryid">
          <?php
	$categoryList = simplexml_load_file("../xml/category.xml");
	foreach ($categoryList->xpath("item[@status='live']") as $cat){
		if ((string)$cat['id'] == (string)$file->categoryid){
			echo "<option value='". $cat['id']."' selected>". $cat['label']."</option>\n";
		
		}else{
			echo "<option value='". $cat['id']."'>". $cat['label']."</option>\n";
		}
	}
	?>
        </select></td>
    </tr>
<tr valign=top> 
      <td>URL</td>
      <td> <input name="url" type="text" id="url" size="60" value="<?php echo $file->url;?>"></td>
    </tr>
    <tr valign=top> 
      <td>Expiration Date</td>
      <td><input name="expiredate" type="text" id="expiredate" value="<?php echo $file->expiredate;?>">
        (2004-01-01)</td>
    </tr>
    <tr valign=top> 
      <td>Keywords</td>
      <td> <p> 
          <input name="keywords" type="text" id="keywords" size="50" value="<?php echo $file->keywords;?>">
          <font size="-1"><br>
          </font><font size="-1">(separate keywords with commas)</font> </p></td>
    </tr>
    <tr valign=top> 
      <td>Description</td>
      <td><textarea name="description" cols="50" rows="5" id="description"><?php echo stripslashes($file->description);?></textarea></td>
    </tr>

    <tr valign=top> 
      <td colspan=2> <div align="center"> 
          <input type="submit" name="Edit News" value="Edit News Item">
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
