<?php
/**
 * Created by PhpStorm.
 * User: KThanksBye
 * Date: 6/6/2015
 * Time: 4:51 PM
 */
function getTime() {
    $offset=5.5*60*60; //converting 5 hours to seconds.
    $dateFormat="d-m-Y H:i:s";
    $timeNdate=gmdate($dateFormat, time()+$offset);
    return $timeNdate;
}
function GUID() {
    if (function_exists('com_create_guid') === true) {
        return trim(com_create_guid(), '{}');
    }
    return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
}
function sendOTP($aadhaar_number) {
    $json_data ='{"aadhaar-id":"'.$aadhaar_number.'",
                    "location":{
                    "type":"pincode",
                    "pincode":"560067"
                    },
                    "channel":"SMS"
                 }';
    $otp_url = "https://ac.khoslalabs.com/hackgate/hackathon/otp/";
    $ch = curl_init($otp_url);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    curl_setopt($ch, CURLOPT_POSTFIELDS, "$json_data");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($ch);
    curl_close($ch);
    $convert_array = array();
    $convert_array = json_decode($output,true);
    return $convert_array["success"];
}

function kycCall($aadhaar_number,$otp) {
    $json_data ='{
                    "consent": "Y",
                    "auth-capture-request": {
                        "aadhaar-id": "'.$aadhaar_number.'",
                        "modality": "otp",
                        "otp": "'.$otp.'",
                        "device-id": "public",
                        "certificate-type": "preprod",
                        "location": {
                            "type": "pincode",
                            "pincode": "201014"
                        }
                    }
                 }';
    $URL = "https://ac.khoslalabs.com/hackgate/hackathon/kyc/raw";
    $ch = curl_init($URL);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    curl_setopt($ch, CURLOPT_POSTFIELDS, "$json_data");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($ch);
    curl_close($ch);
    $convert_array = array();
    $convert_array = json_decode($output,true);
    $image = $convert_array['kyc']['photo'];
    if(isset($convert_array['kyc']['poi'])) {
        $response = array("name" => $convert_array['kyc']['poi']['name'], "image" => $image);
        return $response;
    } else {
        return false;
    }
}

function login($aadhaar_number,$password) {
    $password = md5($password);
    $login_check_query = "SELECT aadhaar_no,password FROM login WHERE aadhaar_no = '$aadhaar_number' AND password = '$password'";
    $result_login_check_query = mysql_query($login_check_query);
    if(mysql_num_rows($result_login_check_query) == 1) {
        session_start();
        $_SESSION["aadhaar"] = $aadhaar_number;
        return true;
    } else {
        return false;
    }
}

function kycFullData($aadhaar_number,$otp) {
    $json_data ='{
                    "consent": "Y",
                    "auth-capture-request": {
                        "aadhaar-id": "'.$aadhaar_number.'",
                        "modality": "otp",
                        "otp": "'.$otp.'",
                        "device-id": "public",
                        "certificate-type": "preprod",
                        "location": {
                            "type": "pincode",
                            "pincode": "201014"
                        }
                    }
                 }';
    $URL = "https://ac.khoslalabs.com/hackgate/hackathon/kyc/raw";
    $ch = curl_init($URL);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    curl_setopt($ch, CURLOPT_POSTFIELDS, "$json_data");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($ch);
    curl_close($ch);
    $convert_array = array();
    $convert_array = json_decode($output,true);
    return $convert_array;
}

function fetchPincode($aadhaar_numer) {
    $query = "SELECT pincode FROM form1 WHERE aadhaar_no = '$aadhaar_numer'";
    $execute = mysql_query($query);
    $row = mysql_fetch_assoc($execute);
    $pincode = $row["pincode"];
    return $pincode;
}
function GetImageExtension($imagetype)
{
    if(empty($imagetype)) return false;
    switch($imagetype)
    {
        case 'image/bmp': return '.bmp';
        case 'image/gif': return '.gif';
        case 'image/jpeg': return '.jpg';
        case 'image/png': return '.png';
        case 'application/pdf': return '.pdf';
        default: return false;
    }

}

function getState($pincode)
{


    $URL = "https://data.gov.in/api/datastore/resource.json?resource_id=6176ee09-3d56-4a3b-8115-21841576b2f6&api-key=6ba8790f6fa5445b23d2c9b2a6a47f2a&filters[pincode]=".$pincode."&sort[pincode]=asc%20&limit=1";

    $ch = curl_init($URL);

    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($ch);
    curl_close($ch);

    $state = array();
    $state = json_decode($output,true);

    return $state['records'][0]['statename'];
//print_r();
}