<?
$client = new SoapClient(NULL, 
        array( 
        "location" => "http://64.124.140.30:9090/soap", 
        "uri"      => "urn:xmethods-delayed-quotes", 
        "style"    => SOAP_RPC, 
        "use"      => SOAP_ENCODED 
           )); 
?>