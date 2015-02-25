<?php
//create document root
$doc = new DomDocument;
$root = $doc->createElement("webcopy");
$doc->appendChild($root);

//add ID attribute
//FIRST, let's generate an ID
$ts = date("mdyhms");
$idstring = "webcopy". $ts;
//NEXT, let's make sure that the id they chose isn't going to overwrite a file!
$dh = opendir('../xml/');

while ($file = readdir($dh)){
	$string = $id . ".xml";
	
	if (eregi("^\\.\\.?$", $file)) {
		continue;
	}
	if (eregi($idstring, $file)){
		$newts = $ts + 2;
		$id = "webcopy". $newts;
	}else{
		$id = $idstring;
	
	}
}
$root->setAttribute('id', $id);

//create headline
$head = $doc->createElement("headline");
$root->appendChild($head);
$htext = $doc->createTextNode($_POST['headline']);
$head->appendChild($htext);


//create navlabel
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
$pubtext = $doc->createTextNode($_POST['pubDate']);
$pub->appendChild($pubtext);



//write to the file
$filename = "../xml/".$id . ".xml";
$doc->save($filename);

header("Location:webcopytool.php");



?>