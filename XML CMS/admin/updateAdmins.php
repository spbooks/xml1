<?php
//first, we delete the old article
$dir = "../xml/";
$filetoburn = $dir .   "admin.xml";
unlink($filetoburn);


//create document root
$doc = new DomDocument;
$root = $doc->createElement("admins");
$doc->appendChild($root);


//looping through data structure
foreach ($_POST['admin']  as $key => $admin){
	
	//ignore the deleted ones!
	if ($_POST['delete'][$key] == "yes"){
		continue;
	}
	
	if ($admin['name'] != ''){
	
	//create admin
	$head = $doc->createElement("admin");
	$root->appendChild($head);
	//add ID attribute
	$head->setAttribute('ID', $key);

	//create name
	$author = $doc->createElement("name");
	$head->appendChild($author);
	$atext = $doc->createTextNode($admin['name']);
	$author->appendChild($atext);

	//create username
	$author = $doc->createElement("username");
	$head->appendChild($author);
	$atext = $doc->createTextNode($admin['username']);
	$author->appendChild($atext);

	//create password
	$author = $doc->createElement("password");
	$head->appendChild($author);
	$atext = $doc->createTextNode($admin['password']);
	$author->appendChild($atext);

	//create email
	$author = $doc->createElement("email");
	$head->appendChild($author);
	$atext = $doc->createTextNode($admin['email']);
	$author->appendChild($atext);
	}
}


//write to the file
$filename = "../xml/admin.xml";
$doc->save($filename);

header("Location:admintool.php");


/*





*/
?>