<?php
//first, we delete the old article
$dir = "../xml/";
$filetoburn = $dir .   "category.xml";
unlink($filetoburn);


//create document root
$doc = new DomDocument;
$root = $doc->createElement("category");
$doc->appendChild($root);


//looping through data structure
foreach ($_POST['cat']  as $key => $cat){
	
	//ignore the deleted ones!
	if ($_POST['delete'][$key] == "yes"){
		continue;
	}
	
	if ($cat['label'] != ''){
	
	//create admin
	$head = $doc->createElement("item");
	$root->appendChild($head);
	//add ID attribute
	$head->setAttribute('id', $key);
	$head->setAttribute('label', $cat['label']);
	$head->setAttribute('status', $cat['status']);

	}
}


//write to the file
$filename = "../xml/category.xml";
$doc->save($filename);

header("Location:categorytool.php");


?>