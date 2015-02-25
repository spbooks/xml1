<?php
//create document root
$doc = new DomDocument;
$root = $doc->createElement("news");
$doc->appendChild($root);

//add ID attribute
//FIRST, let's generate an ID
$ts = date("mdyhms");
$idstring = "news". $ts;
//NEXT, let's make sure that the id they chose isn't going to overwrite a file!
$dh = opendir('../xml/');

while ($file = readdir($dh)){
	$string = $id . ".xml";
	
	if (eregi("^\\.\\.?$", $file)) {
		continue;
	}
	if (eregi($idstring, $file)){
		$newts = $ts + 2;
		$id = "news". $newts;
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
$filename = "../xml/".$id . ".xml";
$doc->save($filename);

header("Location:newstool.php");

?>