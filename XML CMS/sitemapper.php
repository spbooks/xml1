<?php
//first, we delete the old article
$dir = "xml/";
$filetoburn = $dir .  "sitemap.xml";
unlink($filetoburn);

//create document root
$doc = new DomDocument;
$root = $doc->createElement("sitemap");
$root = $doc->appendChild($root);

//add ID attribute
$ts = date("mdyhms");
$root->setAttribute('created', $ts);


//now let's grab content
$handle = opendir("xml/");
while ($file = readdir ($handle)) {
	if ($file == "." or $file == ".." or is_dir($file)) {
		continue;
	}
		
	$mfile = simplexml_load_file("xml/".$file);
	//loop through all the status listings
		if ((string)$mfile->status == "live"){
			$list['id'] = (string)$mfile['id'];
			$list['type'] = ereg_replace("[0123456789]","",$list['id']);
			$list['date'] = ereg_replace("[^0123456789]","",$list['id']);
			$list['headline'] = (string)$mfile->headline;
			$mapArray[] = $list;
		}//end inner if
}//end directory while




foreach ($mapArray as $key => $list){
//create content
$content = $doc->createElement("content");
$content = $root->appendChild($content);
$content->setAttribute('id', $list['id']);

//create headline
$head = $doc->createElement("headline");
$head = $content->appendChild($head);
$htext = $doc->createTextNode($list['headline']);
$htext = $head->appendChild($htext);

//create type
$type = $doc->createElement("type");
$type = $content->appendChild($type);
$htext = $doc->createTextNode($list['type']);
$htext = $type->appendChild($htext);

//create date
$date = $doc->createElement("date");
$date = $content->appendChild($date);
$htext = $doc->createTextNode($list['date']);
$htext = $date->appendChild($htext);

}
//write to the file
$filename = "xml/sitemap.xml";
$doc->save($filename);


if ($_GET['sortby']){
	$sortingrule =$_GET['sortby'];
}else{
	$sortingrule ="headline";
}


/* NOW WE CAN GET BUSY! */
$xml = new DomDocument; // from /ext/dom
$xml->load('xml/sitemap.xml');

$xsl = new DomDocument;
$xsl->load('xslt/sitemap.xsl');

/* Configure the transformer */
$proc = new xsltprocessor;
$proc->importStyleSheet($xsl); // attach the xsl rules
$proc->setParameter("","SORT","$sortingrule");
echo $proc->transformToXML($xml); // actual transformation

?>