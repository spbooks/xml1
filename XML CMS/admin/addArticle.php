<?php
//create document root
$doc = new DomDocument;
$root = $doc->createElement("article");
$doc->appendChild($root);

//add ID attribute
//FIRST, let's generate an ID
$ts = date("mdyhms");
$idstring = "article". $ts;
//NEXT, let's make sure that the id they chose isn't going to overwrite a file!
$dh = opendir('../xml/');

while ($file = readdir($dh)){
	$string = $id . ".xml";
	
	if (eregi("^\\.\\.?$", $file)) {
		continue;
	}
	if (eregi($idstring, $file)){
		$newts = $ts + 2;
		$id = "article". $newts;
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
$atext = $doc->createTextNode($_POST['authorID']);
$author->appendChild($atext);

//create categoryID
$cat = $doc->createElement("categoryid");
$root->appendChild($cat);
$ctext = $doc->createTextNode($_POST['categoryID']);
$cat->appendChild($ctext);

//create abstract
$abs = $doc->createElement("abstract");
$root->appendChild($abs);
$abstext = $doc->createTextNode($_POST['abstract']);
$abs->appendChild($abstext);


//create body
$body = $doc->createElement("body");
$root->appendChild($body);
$cdata = $doc->createCdataSection($_POST['body']);
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
$xtext = $doc->createTextNode($_POST['expireDate']);
$ex->appendChild($xtext);

//create pubDate
$pub = $doc->createElement("pubdate");
$root->appendChild($pub);
$pubtext = $doc->createTextNode($_POST['pubDate']);
$pub->appendChild($pubtext);



//write to the file
$filename = "../xml/".$id . ".xml";
$doc->save($filename);

header("Location:articletool.php");


/*
//update keywords
$kw = new DomDocument();
$kw->load("../xml/keywords.xml");
$kwroot = $xml->documentElement;

$xmlKwList = $kw->getElementsByTagName("keyword");
$keywordList = split(",",$_POST['keywords']);
$termList = array();

if (count($keywordList)>0){
	foreach ($xmlKwList as $xmlkey){
		$xmlterm = $xmlkey->getAttribute("term");
		
		if (in_array($xmlterm,$keywordList)){
			//we found a match!
			$content = $kw->createElement("content");
			$content->setAttribute("id",$idstring);
			$type = preg_replace("/\d/","",$idstring);
			$content->setAttribute('type', $type);
			$kw->appendChild($content);
			$termList[] = $xmlterm;
		}
	}
	
	//now we are outside the loop, so we have to figure out
	//if we still have work to do (ie leftover keyword entries that need
	//to be added new)
	
	$diff = array_diff($keywordList,$termList);
	print_r($diff);
	if (count($diff)>0){
		foreach ($diff as $key => $value){
			
			$key = $kw->createElement("keyword");
			$key = $kw->appendChild($key);
			$key->setAttribute('term', $value);
			
			$content = $kw->createElement("content");
			$content->setAttribute('id', $idstring);
			$type = preg_replace("/\d/","",$idstring);
			$content->setAttribute('type', $type);
			$content = $kw->appendChild($content);
		}
	}
}
exit;
//write to the file
$filename = "../xml/keywords.xml";
$kw->save($filename);


//update status
$stat = new DomDocument();
$stat->load("../xml/status.xml");
$sroot = $xml->documentElement;


$status = $stat->createElement("status");
$stat->setAttribute('term', $_POST['status']);
$status = $stat->appendChild($status);
		
$content = $stat->createElement("content");
$content->setAttribute('id', $idstring);
$type = preg_replace("/\d/","",$idstring);
$content->setAttribute('type', $type);
$content->setAttribute('expireDate', $_POST['expiredate']);
$content->setAttribute('authorID', $_POST['authorid']);
$content->setAttribute('categoryID', $_POST['categoryid']);
$content = $stat->appendChild($content);


//write to the file
$filename = "../xml/status.xml";
$stat->save($filename);
*/


?>