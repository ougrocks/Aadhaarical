<?php
$aadhaar_number = $_GET["aadhaarId"];
$xml_data ='{"aadhaar-id":"'.$aadhaar_number.'",
"location":{
"type":"pincode",
"pincode":"560067"
},
"channel":"SMS"
}';


$URL = "https://ac.khoslalabs.com/hackgate/hackathon/otp/";

$ch = curl_init($URL);

curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
curl_setopt($ch, CURLOPT_POSTFIELDS, "$xml_data");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$output = curl_exec($ch);
curl_close($ch);
$convert_array = array();
$convert_array = json_decode($output,true);
echo $convert_array["success"];

?>