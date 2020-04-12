
<?php

$params = array(
'ivp_method'  => 'create',
'ivp_store'   => '23295',
'ivp_authkey' => 'nzjnk-DNj4#kK2k6',
'ivp_cart'    => date('his'),
'ivp_test'    => '0',
'ivp_amount'  => '1.00',
'ivp_currency'=> 'AED',
'ivp_desc'    => 'Product Description',
'return_auth' => 'https://naseemo.com/returnsuccess',
'return_can'  => 'https://naseemo.com/returncancelled',
'return_decl' => 'https://naseemo.com/returndecline'
);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://secure.telr.com/gateway/order.json");
curl_setopt($ch, CURLOPT_POST, count($params));
curl_setopt($ch, CURLOPT_POSTFIELDS,$params);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Expect:'));
$results = curl_exec($ch);
curl_close($ch);
$results = json_decode($results,true);

$ref= trim($results['order']['ref']);
$url= trim($results['order']['url']);
if (empty($ref) || empty($url)) {
echo 'Failed to create order';
}
else
{
	 header('Location: ' . $url);
}

//print_r($results);

?>