<?php
// uses https://github.com/albeebe/PHP-FindMyiPhone
error_reporting(0);
header("Content-type: text/html; charset=utf-8");
require_once('class.findmyiphone.php');
try {
	// replace with your details
	$ssm = new FindMyiPhone('iCloudLogin', 'iCloudPass');
} catch (Exception $e) {
	print "Error: ".$e->getMessage();
	exit;
}
// replace with your device name
$device = "deviceName";
$location = $ssm->locate($device);

// Google
$ch = curl_init();                                                                      
// replace with your Google key
$key = "yourKey";
curl_setopt_array($ch, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'https://maps.googleapis.com/maps/api/geocode/json?latlng='.$location->latitude.','.$location->longitude.'&result_type=locality&key='.$key
));
$response = curl_exec($ch);
curl_close($ch);
$respo=json_decode($response);
$city=$respo->results[0]->address_components[0]->long_name;
print_r($city);
?>