<?
require_once('nusoap.php'); 

$wsdl="http://localhost/hellowsdl.php";
$client=new soapclient($wsdl, 'wsdl'); 
$param=array(
'name'=>'kasamsun',
); 
echo $client->call('hello', $param);
?>
