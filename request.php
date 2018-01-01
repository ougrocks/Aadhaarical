<?php
$xml_data ='{
"aadhaar-id": "458875908262",
"location": {
"type": "pincode",
"pincode": "560067"
},
"modality": "demo",
"certificate-type": "preprod",
"demographics": {
"name": {
"matching-strategy": "exact",
"name-value": "Sumanyu Soniwal"
},
"address-format": "freetext",
    "address-freetext": {
      "matching-strategy": "exact",
      "address-value": "S/O Umesh Chand Verma, 1/7-4, NATH COMPLEX COMPOUND, DHAKRAN CROSSING, M.G. ROAD, AGRA, Uttar Pradesh, 282010"
    }
}
}';


$URL = "https://ac.khoslalabs.com/hackgate/hackathon/auth/raw";

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