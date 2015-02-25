<?php
//first, we delete the old newsitem
$dir = "../xml/";
$filetoburn = $dir .  $_POST['id'] . ".xml";
unlink($filetoburn);


//create document root
$doc = new DomDocument;
$root = $doc->createElement("news");
$doc->appendChild($root);

//add ID attribute
$root->setAttribute('id', $_POST['id']);



//create headline
$head = $doc->createElement("headline");
$root->appendChild($head);
$htext = $doc->createTextNode($_POST['headline']);
$head->appendChild($htext);

//create authorID
$author = $doc->createElement("authorid");
$root->appendChild($author);
$atext = $doc->createTextNode($_POST['authorid']);
$author->appendChild($atext);

//create categoryID
$cat = $doc->createElement("categoryid");
$root->appendChild($cat);
$ctext = $doc->createTextNode($_POST['categoryid']);
$cat->appendChild($ctext);

//create abstract
$abs = $doc->createElement("url");
$root->appendChild($abs);
$abstext = $doc->createTextNode($_POST['url']);
$abs->appendChild($abstext);


//create body
$body = $doc->createElement("description");
$root->appendChild($body);
$cdata = $doc->createCdataSection($_POST['description']);
$body->appendChild($cdata);

//create keywords
$key = $doc->createElement("keywords");
$root->appendChild($key);
$ktext = $doc->createTextNode($_POST['keywords']);
$key->appendChild($ktext);


//create status
$stat = $doc->createElement("status");
$root->appendChild($stat);
$stext = $doc->createTextNode($_POST['status']);
$stat->appendChild($stext);


//create expireDate
$ex = $doc->createElement("expiredate");
$root->appendChild($ex);
$xtext = $doc->createTextNode($_POST['expiredate']);
$ex->appendChild($xtext);

//create pubDate
$pub = $doc->createElement("pubdate");
$root->appendChild($pub);
$pubtext = $doc->createTextNode($_POST['pubdate']);
$pub->appendChild($pubtext);



//write to the file
$filename = "../xml/".$_POST['id'] . ".xml";
$doc->save($filename);

header("Location:newstool.php");

?>