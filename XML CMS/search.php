<form name="searchWidget" method="post" action="doSearch.php">
 Search site:  
 <input name="term" type="text" id="term"><br/>
 <input name="Search" type="submit" id="Search" value="Search">
</form>
<br>
<?php 
if (eregi("MSIE",$_SERVER['HTTP_USER_AGENT'])){
?>
<a href="cats.php">Browse by Category</a>
<br><br>
<?php
}
?>
<br><a href="sitemapper.php" target="sitemap">sitemap</a><br><br>
<img src="images/php5-power-micro.png"/>
<br><br>
<small><a href="admin/login.php">admin</a></small>
<br>
<small><a href="testrss.php" target="rss">rss feed</a></small>
