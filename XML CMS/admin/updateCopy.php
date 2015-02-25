<?php
//first, we delete the old article
$dir = "../xml/";
$filetoburn = $dir .  $_POST['id'] . ".xml";
unlink($filetoburn);


//create document root
$doc = new DomDocument;
$root = $doc->createElement("webcopy");
$doc->appendChild($root);

//add ID attribute
$root->setAttribute('id', $_POST['id']);

//create headline
$head = $doc->createElement("headline");
$root->appendChild($head);
$htext = $doc->createTextNode($_POST['headline']);
$head->appendChild($htext);

//create headline
$head = $doc->createElement("navigationlabel");
$root->appendChild($head);
$htext = $doc->createTextNode($_POST['navlabel']);
$head->appendChild($htext);


//create abstract
$abs = $doc->createElement("description");
$root->appendChild($abs);
$abstext = $doc->createTextNode($_POST['description']);
$abs->appendChild($abstext);


//create body
$body = $doc->createElement("body");
$root->appendChild($body);
$cdata = $doc->createCdataSection($_POST['body']);
$body->appendChild($cdata);


//create status
$stat = $doc->createElement("status");
$root->appendChild($stat);
$stext = $doc->createTextNode($_POST['status']);
$stat->appendChild($stext);



//create pubDate
$pub = $doc->createElement("pubdate");
$root->appendChild($pub);
$pubtext = $doc->createTextNode($_POST['pubdate']);
$pub->appendChild($pubtext);



//write to the file
$filename = "../xml/".$_POST['id'] . ".xml";
$doc->save($filename);

header("Location:webcopytool.php");



?>