<?php
//first, we delete the old author file
$dir = "../xml/";
$filetoburn = $dir .   "authors.xml";
unlink($filetoburn);


//create document root
$doc = new DomDocument;
$root = $doc->createElement("authors");
$doc->appendChild($root);


//looping through data structure
foreach ($_POST['author']  as $key => $cat){
	
	//ignore the deleted ones!
	if ($_POST['delete'][$key] == "yes"){
		continue;
	}
	
	if ($cat['name'] != ''){
	
	//create admin
	$head = $doc->createElement("author");
	$root->appendChild($head);
	//add ID attribute
	$head->setAttribute('id', $key);

	//create name
	$n = $doc->createElement("name");
	$head->appendChild($n);
	$htext = $doc->createTextNode($cat['name']);
	$n->appendChild($htext);


	//create byline
	$n = $doc->createElement("byline");
	$head->appendChild($n);
	$htext = $doc->createTextNode($cat['byline']);
	$n->appendChild($htext);

	//create email
	$n = $doc->createElement("email");
	$head->appendChild($n);
	$htext = $doc->createTextNode($cat['email']);
	$n->appendChild($htext);

	}
}


//write to the file
$filename = "../xml/authors.xml";
$doc->save($filename);

header("Location:authortool.php");


?>