<?php
/**
 * Created by PhpStorm.
 * User: KThanksBye
 * Date: 6/6/2015
 * Time: 4:08 PM
 */
require_once 'includes/config.php';
include_once 'includes/functions.php';
if(isset($_POST["action"]) && isset($_POST["aadhaar_number"]) && isset($_POST["otp"]) && $_POST["action"] == md5("register") && isset($_POST["password"]) && isset($_POST["confirm_password"])) {
    if(is_numeric($_POST["aadhaar_number"])) {
        if($_POST["password"] == $_POST["confirm_password"]) {
        $aadhaar_number = preg_replace('/\s+/', '', $_POST["aadhaar_number"]);
        $otp = $_POST["otp"];
        $response = kycCall($aadhaar_number,$otp);
        if($response == false) {
            $error = md5("authfail");
            header("Location: index.php?error=$error");
        } else {
            $check__query = "SELECT * FROM login WHERE aadhaar_no = '$aadhaar_number'";
            $result = mysql_query($check__query) or die(mysql_error());
            if(mysql_num_rows($result) == 1) {
                $error = md5("already");
                header("Location: index.php?error=$error");
            } else {
                $login_id = GUID();
                $password = md5($_POST["password"]);
                $response_name = $response["name"];
                $response_image = $response["image"];
                $insert_query = "INSERT INTO login VALUES('$login_id','$aadhaar_number','$password','$response_name','$response_image')";
                $result_insert_query = mysql_query($insert_query);
                if($result_insert_query) {
                    header("Location: index.php?success=$login_id");
                } else {
                    echo "Problem in Server";
                }
            }
        }
        } else {
            $error = md5("passwordnotmatch");
            header("Location: index.php?error=$error");
        }
    } else {
        $error = md5("invalid");
        header("Location: index.php?error=$error");
    }
}
if(isset($_POST["action"]) && isset($_POST["aadhaar_number"]) && $_POST["action"] == md5("sendOTP")){
    if(is_numeric(preg_replace('/\s+/', '', $_POST["aadhaar_number"]))) {
        $aadhaar_number = preg_replace('/\s+/', '', $_POST["aadhaar_number"]);
        $response = sendOTP($aadhaar_number);
        if($response == 1) {
            header("Location: learning.php?aadhaar=$aadhaar_number");
        } else {
            header("Location: 500.php");
        }
    } else {
        echo "Invalid Aadhaar Card Number";
    }
}

if(isset($_POST["action"]) && isset($_POST["aadhaar_number"]) && isset($_POST["password"]) && $_POST["action"] == md5("login")) {
    if(is_numeric(preg_replace('/\s+/', '', $_POST["aadhaar_number"]))) {
        $aadhaar_number = preg_replace('/\s+/', '', $_POST["aadhaar_number"]);
        $password = $_POST["password"];
        $response = login($aadhaar_number,$password);
        if($response == true) {
            header("Location: home.php");
        } else {
            $temp = md5("wrongpassword");
            header("Location: index.php?error=$temp");
        }
    }
}

if(isset($_POST["action"]) && $_POST["action"] == md5("submitform1")) {
    $user_name = trim($_POST["name"]);
    $user_relation = $_POST["radio"];
    $user_relation_name = trim($_POST["in_relation"]);
    $user_permanent_address = $_POST["permadd"];
    $user_temp_address = $_POST["tempadd"];
    $user_dob = $_POST["dob"];
    $user_age = $_POST["age"];
    $user_idmarks = $_POST["idmarks"];
    $pincode = $_POST["pincode"];
    if(isset($_POST["declaration-a"])) {
        $form_a = $_POST["declaration-a"];
    }
    else {
        $form_a = "No";
    }
    if(isset($_POST["declaration-b"])) {
        $form_b = $_POST["declaration-b"];
    }
    else {
        $form_b = "No";
    }
    if(isset($_POST["declaration-c"])) {
        $form_c = $_POST["declaration-c"];
    }
    else {
        $form_c = "No";
    }
    if(isset($_POST["declaration-d"])) {
        $form_d = $_POST["declaration-d"];
    }
    else {
        $form_d = "No";
    }
    if(isset($_POST["declaration-e"])) {
        $form_e = $_POST["declaration-e"];
    }
    else {
        $form_e = "No";
    }
    if(isset($_POST["declaration-f"])) {
        $form_f = $_POST["declaration-f"];
    }
    else {
        $form_f = "No";
    }
    if(isset($_POST["declaration-g"])) {
        $form_g = $_POST["declaration-g"];
    }
    else {
        $form_g = "No";
    }
    $form_declare = $_POST["declare"];
    $aadhaar_number = $_POST["aadhaar_number"];
    $timestamp = getTime();
    if(isset($_POST["declare"])) {
        $check_query = "SELECT * FROM form1 WHERE aadhaar_no = '$aadhaar_number'";
        $result_check_query = mysql_query($check_query);
        if(mysql_num_rows($result_check_query) == 1) {
            $update_query = "UPDATE `aadhaaric_licence`.`form1`
                              SET `user_name` = '$user_name',
                              `user_relation` = '$user_relation',
                              `user_relation_name` = '$user_relation_name',
                              `user_pa` = '$user_permanent_address',
                              `user_ta` = '$user_temp_address',
                              `user_dob` = '$user_dob',
                              `user_age` = '$user_age',
                              `user_mark` = '$user_idmarks',
                              `a` = '$form_a',
                              `b` = '$form_b',
                              `c` = '$form_c',
                              `d` = '$form_d',
                              `e` = '$form_e',
                              `f` = '$form_f',
                              `g` = '$form_g',
                              `updated_timestamp` = '$timestamp'
                              WHERE `form1`.`aadhaar_no` = '$aadhaar_number'";
            $execute_update_query = mysql_query($update_query) or die(mysql_error());
            $update = md5("update");
            header("Location: form1.php?action=$update");
        } else {
            $id = GUID();
            $insert_query = "INSERT INTO form1 VALUES('$id','$aadhaar_number','$user_name','$user_relation','$user_relation_name','$user_permanent_address','$pincode','$user_temp_address',
                              '$user_dob','$user_age','$user_idmarks','$form_a','$form_b','$form_c','$form_d','$form_e','$form_f','$form_g',
                              '$timestamp','$timestamp')";
            $execute_insert_query = mysql_query($insert_query) or die(mysql_error());
            $flag_id = GUID();
            $insert_flags_query = "INSERT INTO flags VALUES('$flag_id','$aadhaar_number',0,1,0,0)";
            mysql_query($insert_flags_query);
            $insert = md5("insert");
            header("Location: form1.php?action=$insert");
        }
    } else {
        echo "Declare should be checked";
    }
}


if(isset($_POST["action"]) && $_POST["action"] == md5("submitform2")) {
    $rto_office = $_POST["rto_office"];
    $category_full ='';
    if(!empty($_POST['cat'])) {
        foreach($_POST['cat'] as $category) {
           $category_full = $category_full." ".$category;
        }
    }
    $qualification = $_POST["qualification"];
    $blood_group = $_POST["bgroup"];
    $rh_factor = $_POST["rhfactor"];
    $p1 = $_POST["p1"];
    $p2 = $_POST["p2"];
    $p3 = $_POST["p3"];
    $p4 = $_POST["p4"];
    if(isset($_POST["check1"])) {
        $check1 = $_POST["check1"];
    } else {
        $check1 = "No";
    }
    if(isset($_POST["check2"])) {
        $check2 = $_POST["check2"];
    } else {
        $check2 = "No";
    }
    $today_date = $_POST["today_date"];
    $place = $_POST["place"];
    $timestamp = getTime();
    $aadhaar_number = $_POST["aadhaar_number"];
    if (!empty($_FILES["medcert"]["name"]) && !empty($_FILES["drivecert"]["name"])) {

        $file_name=$_FILES["medcert"]["name"];
        $file_name1=$_FILES["drivecert"]["name"];
        $temp_name=$_FILES["medcert"]["tmp_name"];
        $temp_name1=$_FILES["drivecert"]["tmp_name"];
        $imgtype=$_FILES["medcert"]["type"];
        $imgtype1=$_FILES["drivecert"]["type"];
        $ext= GetImageExtension($imgtype);
        $ext1= GetImageExtension($imgtype1);
        $imagename="medical".date("d-m-Y")."-".time().$ext;
        $imagename1="driving".date("d-m-Y")."-".time().$ext1;
        $image = "upload/medical/".$imagename;
        $image1 = "upload/driving/".$imagename1;

        if(move_uploaded_file($temp_name, $image) && move_uploaded_file($temp_name1, $image1)) {
            $check = "SELECT * FROM form2 WHERE aadhaar_no = '$aadhaar_number'";
            $check_result = mysql_query($check);
            $check_row_count = mysql_num_rows($check_result);
            if($check_row_count > 0) {
                $image_update_query = "UPDATE form2 SET medical_url = '$image',driving_url = '$image1', updated_timestamp = '$timestamp', rto_office = '$rto_office',
                                        `category` = '$category_full', `qualification` = '$qualification', `bgroup` = '$blood_group', `rh_factor` = '$rh_factor', `p1` = '$p1',
                                        `p2` = '$p2', `p3` = '$p3', `p4` = '$p4', `check1` = '$check1', `check2` = '$check2', `today_date` = '$today_date', `current_place` = '$place'
                                        WHERE aadhaar_no = '$aadhaar_number'";
                mysql_query($image_update_query);
                $random = md5("form2sub");
                header("Location: form2.php?action=$random");
            } else {
                $id = GUID();

                $query = "INSERT INTO form2 VALUES('$id','$aadhaar_number','$rto_office','$category_full', '$qualification', '$blood_group', '$rh_factor',
                          '$p1', '$p2', '$p3', '$p4', '$image', '$image1', '$check1', '$check2', '$today_date', '$place', '$timestamp', '$timestamp')";
                mysql_query($query) or die("error in $query == ----> " . mysql_error());
                $update_flags = "UPDATE flags SET flag_form2 = 1 WHERE aadhaar_no = '$aadhaar_number'";
                mysql_query($update_flags);
                $random = md5("form2sub");
                header("Location: form2.php?action=$random");
            }
        }else{

            exit("Error While uploading Content on the server");
        }

    }
    else
    {
        echo "error";
    }
}


if(isset($_POST["action"]) && $_POST["action"] == md5("submitform4")) {
    $rto_office = $_POST["rto_office"];
    $category_full ='';
    if(!empty($_POST['cat'])) {
        foreach($_POST['cat'] as $category) {
            $category_full = $category_full." ".$category;
        }
    }
    $qualification = $_POST["qualification"];
    $blood_group = $_POST["bgroup"];
    $rh_factor = $_POST["rhfactor"];
    $p1 = $_POST["p1"];
    $p2 = $_POST["p2"];
    $p3 = $_POST["p3"];
    $date_of_test_1 = $_POST["d1"];
    $testing_auth_1 = $_POST["t1"];
    $result_of_test_1 = $_POST["r1"];

    $date_of_test_2 = $_POST["d2"];
    $testing_auth_2 = $_POST["t2"];
    $result_of_test_2 = $_POST["r2"];

    $date_of_test_3 = $_POST["d3"];
    $testing_auth_3 = $_POST["t3"];
    $result_of_test_3 = $_POST["r3"];

    $final_driving_test_result = "Date of Test 1: ".$date_of_test_1.",Authority of Test: ".$testing_auth_1.", Result of Test: ".$result_of_test_1." | ".
        "Date of Test 2: ".$date_of_test_2.",Authority of Test: ".$testing_auth_2.", Result of Test: ".$result_of_test_2." | ".
        "Date of Test 3: ".$date_of_test_3.",Authority of Test: ".$testing_auth_3.", Result of Test: ".$result_of_test_3." | ";

    $licence_number = $_POST["licence_no"];
    $licence_date = $_POST["licence_date"];
    if(isset($_POST["check1"])) {
        $check1 = $_POST["check1"];
    } else {
        $check1 = "No";
    }
    if(isset($_POST["check2"])) {
        $check2 = $_POST["check2"];
    } else {
        $check2 = "No";
    }
    $today_date = $_POST["today_date"];
    $place = $_POST["place"];
    $timestamp = getTime();
    $aadhaar_number = $_POST["aadhaar_number"];
    if (!empty($_FILES["medcert"]["name"]) && !empty($_FILES["drivecert"]["name"])) {

        $file_name=$_FILES["medcert"]["name"];
        $file_name1=$_FILES["drivecert"]["name"];
        $temp_name=$_FILES["medcert"]["tmp_name"];
        $temp_name1=$_FILES["drivecert"]["tmp_name"];
        $imgtype=$_FILES["medcert"]["type"];
        $imgtype1=$_FILES["drivecert"]["type"];
        $ext= GetImageExtension($imgtype);
        $ext1= GetImageExtension($imgtype1);
        $imagename="medical".date("d-m-Y")."-".time().$ext;
        $imagename1="driving".date("d-m-Y")."-".time().$ext1;
        $image = "upload/medical/".$imagename;
        $image1 = "upload/driving/".$imagename1;

        if(move_uploaded_file($temp_name, $image) && move_uploaded_file($temp_name1, $image1)) {
            $check = "SELECT * FROM form4 WHERE aadhaar_no = '$aadhaar_number'";
            $check_result = mysql_query($check);
            $check_row_count = mysql_num_rows($check_result);
            if($check_row_count > 0) {
                $image_update_query = "UPDATE form4 SET medical_url = '$image',driving_url = '$image1', updated_timestamp = '$timestamp',
                                        `category` = '$category_full', `qualification` = '$qualification', `bgroup` = '$blood_group', `rh_factor` = '$rh_factor', `p1` = '$p1',
                                        `licence_number` = '$licence_number', `licence_date` = '$licence_date',`final_test` = '$final_driving_test_result',`p2` = '$p2', `p3` = '$p3', `check1` = '$check1', `check2` = '$check2', `today_date` = '$today_date', `current_place` = '$place'
                                        WHERE aadhaar_no = '$aadhaar_number'";
                mysql_query($image_update_query);
                $random = md5("form4sub");
                header("Location: form4.php?action=$random");
            } else {
                $id = GUID();

                $query = "INSERT INTO form4 VALUES('$id','$aadhaar_number','$rto_office','$category_full', '$qualification', '$blood_group', '$rh_factor',
                          '$p1', '$p2', '$p3', '$final_driving_test_result', '$licence_number', '$licence_date', '$image', '$image1', '$check1', '$check2', '$today_date', '$place', '$timestamp', '$timestamp')";
                mysql_query($query) or die("error in $query == ----> " . mysql_error());
                $update_flags = "UPDATE flags SET flag_form4 = 1 WHERE aadhaar_no = '$aadhaar_number'";
                mysql_query($update_flags);
                $random = md5("form4sub");
                header("Location: form4.php?action=$random");
            }
        }else{

            exit("Error While uploading Content on the server");
        }

    }
    else
    {
        echo "error";
    }
}

if(isset($_POST["action"]) && $_POST["action"] == md5("changepass")) {
    if($_POST["newpwd"] != $_POST["cnewpwd"]) {
        $error = md5("nomatch");
        header("Location: change_pwd.php?error=$error");
    } else {
        $old_password = md5($_POST["oldpwd"]);
        $aadhaar_number = $_POST["aadhaar_number"];
        $new_password = md5($_POST["newpwd"]);
        $check_pass = "SELECT * FROM login WHERE aadhaar_no = '$aadhaar_number' AND password = '$old_password'";
        $result = mysql_query($check_pass);
        if(mysql_num_rows($result) == 1) {
            $update_query = "UPDATE login SET password = '$new_password' WHERE aadhaar_no = '$aadhaar_number'";
            mysql_query($update_query);
            $action = md5("passwordchange");
            header("Location: change_pwd.php?action=$action");
        } else {
            $action = md5("wrongpassword");
            header("Location: change_pwd.php?error=$action");
        }
    }
}