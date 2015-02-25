<?php



$xml = domxml_open_file("../xml/keywords.xml");

$root = $xml->root();

$keywordList = split(",","XML, HTML");
print_r($keywordList);

if (count($keywordList)>0){
	foreach ($keywordList as $kw){
		$node_array = $root->get_elements_by_tagname("keyword");
		for ($i = 0; $i<count($node_array); $i++) {
		   $node = $node_array[$i];
		   if (inarray($node->get_attribute("term"),$keywordList)){
		   
		   }
		}	
	}
}



function extractText($array){
	if(count($array) <= 1){
		//we only have one tag to process!
		for ($i = 0; $i<count($array); $i++){
			$node = $array[$i];
			$value = $node->get_content();
		}
		return $value;
	} 
	
}
	
?>