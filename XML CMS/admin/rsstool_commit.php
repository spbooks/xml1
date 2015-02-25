<?php
include_once "security.php";


//use DOM to create our new file
//create document root
$doc = new DomDocument;
$root = $doc->createElement("rss");
$root = $doc->appendChild($root);
$root->setAttribute('version', '0.91');

//create headline
$channel = $doc->createElement("channel");
$channel = $root->appendChild($channel);


//create channel title
$title = $doc->createElement("title");
$title = $channel->appendChild($title);
$text = $doc->createTextNode("myxmlbook.com articles");
$text = $title->appendChild($text);


//create channel description
$title = $doc->createElement("description");
$title = $channel->appendChild($title);
$text = $doc->createTextNode("Articles from myxmlbook.com");
$text = $title->appendChild($text);


//add channel link
$title = $doc->createElement("link");
$title = $channel->appendChild($title);
$text = $doc->createTextNode("http://myxmlbook.com/xml/feed.rss");
$text = $title->appendChild($text);



//now we add the individual items
foreach ($_POST['allow'] as $key => $value){
	if ($value == "yes"){
		$title = $_POST[title][$key];
		$desc = $_POST[description][$key];
		
		$item = $doc->createElement("item");
		$item = $channel->appendChild($item);

		//add item title
		$ititle = $doc->createElement("title");
		$ititle = $item->appendChild($ititle);
		$it_text = $doc->createTextNode($title);
		$it_text = $ititle->appendChild($it_text);

		//add item description
		$idesc = $doc->createElement("description");
		$idesc = $item->appendChild($idesc);
		$id_text = $doc->createTextNode($desc);
		$id_text = $idesc->appendChild($id_text);

		//add item link
		$ilink = $doc->createElement("link");
		$ilink = $item->appendChild($ilink);
		$il_text = $doc->createTextNode("http://www.myxmlbook.com/innerpage.php?id=".$key);
		$il_text = $ilink->appendChild($il_text);

	}

}

//write to the file
$filename = "../xml/feed.rss";
$doc->save($filename);

header("Location:adminindex.php");

?>