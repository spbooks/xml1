<?php
include "header.php";
$xslDir = "xslt/";

//detect our incoming content
$incoming = $_GET['id'];
if (eregi("article",$incoming)){
	$xslt = $xslDir."articles.xsl";
}elseif(eregi("webcopy",$incoming) or eregi("homepage",$incoming)){
	$xslt = $xslDir."webcopy.xsl";
}


$dom = new domDocument();
$dom->load($xslt);
$proc = new xsltprocessor;
$xsl = $proc->importStylesheet($dom);
  
$document = new DomDocument();
$document->load($fileDir . $incoming . ".xml");
print $proc->transformToXml($document);

?> 
