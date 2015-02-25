<?php
include "header.php";
//open the homepage file using simpleXML functions
$file = $fileDir . "homepage.xml";
$homePage = simplexml_load_file($file);
?>
<html>
<head>
<title><?php echo $homePage->headline; ?></title>
<link rel="stylesheet" href="xmlcms.css" type="text/css">
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

//print out headline
echo "<h1>".$homePage->headline . "</h1>";
echo "<small>". $homePage->description . "</small>";
echo "<br>";
echo $homePage->body;


?>
</div>
</body>
</html>