<?php
$params = array(
		'ivp_method'  => 'create',
		'ivp_store'   => '18669',
		'ivp_authkey' => '5VKz-mXMKf#cvmt6',
		'ivp_cart'    => date('his'),
		'ivp_test'    => '1',
		'ivp_amount'  => '100.00',
		'ivp_currency'=> 'AED',
		'ivp_desc'    => 'Product Description',
		'return_auth' => 'https://domain.com/return.html',
		'return_can'  => 'https://domain.com/return.html',
		'return_decl' => 'https://domain.com/return.html'
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
print_r($results);
?>