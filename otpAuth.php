<?php
$xml_data ='{
  "consent": "Y",
  "auth-capture-request": {
"aadhaar-id": "458875908262",
"modality": "otp",
"otp": "340913",
"device-id": "public",
"certificate-type": "preprod",
"location": {
"type": "pincode",
"pincode": "201014"
}
}}';


$URL = "https://ac.khoslalabs.com/hackgate/hackathon/kyc/raw";

$ch = curl_init($URL);

curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
curl_setopt($ch, CURLOPT_POSTFIELDS, "$xml_data");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$output = curl_exec($ch);
curl_close($ch);


var_dump($output);

?>