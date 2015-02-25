<?php
function getCountArticles($methodName, $params, $appData){
$xmlCtr = 0;
$dh = opendir($HTTP_SERVER_VARS['DOCUMENT_ROOT']."/xml/");
while ($file = readdir($dh)){
		if (eregi("article",$file)){
			$xmlCtr++;
		}
}
return $xmlCtr;
}
function searchArticles($methodName, $params, $appData){
  $handle = opendir("xml/");
  while ($file = readdir ($handle)) {
	  if ($file == "." or $file == ".." or is_dir($file)) {
		continue;
	  }
		
	if (eregi("news",$file) or eregi("article",$file) 
    or eregi("webcopy",$file)){
    $articleFile = simplexml_load_file("xml/".$file);
    //loop through all the status listings

		if ((eregi($term,(string)$articleFile->keywords) 
		or eregi($term,(string)$articleFile->headline)
		or eregi($term,(string)$articleFile->abstract))
		and (string)$articleFile->status == "live"){
				
		  $list['id'] = (string)$articleFile['id'];
		  $list['headline'] = (string)$articleFile->headline;
		  $searchArray[] = $list;
		}//end inner if
	}//end outer if
}//end directory while 

 return $searchArray;   
}

$xmlRpcServer = xmlrpc_server_create();
xmlrpc_server_register_method($xmlRpcServer, "getCountArticles", "getCountArticles");
xmlrpc_server_register_method($xmlRpcServer, "searchArticles", "searchArticles");
//capture the HTTP POST request
$requestXml = $HTTP_RAW_POST_DATA;
//Use xmlrpc_server_call_method() to send a request 
//and return a response.
$response = xmlrpc_server_call_method($xmlRpcServer, $requestXml, '');
// print the response for the client
print $response;
xmlrpc_server_destroy($xmlRpcServer);
?>
