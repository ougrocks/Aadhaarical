<?php
/**
 * Created by PhpStorm.
 * User: !ntruder
 * Date: 23-05-2015
 * Time: 18:24
 */
include_once 'includes/config.php';
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
if(isset($_POST["upload"])) {
    $salon_name = $_POST["salon_name"];
    $salon_id = $_POST["salon_d"];
    if (!empty($_FILES["file"]["name"])) {

        $file_name=$_FILES["file"]["name"];
        $temp_name=$_FILES["file"]["tmp_name"];
        $imgtype=$_FILES["file"]["type"];
        $ext= GetImageExtension($imgtype);
        $imagename=trim($salon_name).date("d-m-Y")."-".time().$ext;
        $image = "upload/images/salon/cover/".$imagename;

        if(move_uploaded_file($temp_name, $image)) {
            $check = "SELECT * FROM photos WHERE salon_id = '$salon_id'";
            $check_result = mysql_query($check);
            $check_row_count = mysql_num_rows($check_result);
            if($check_row_count > 0) {
                $image_update_query = "UPDATE photos SET url = '$image' WHERE salon_id = '$salon_id'";
                mysql_query($image_update_query);
            } else {
                $query = "INSERT INTO photos VALUES(uuid(),'$image','$salon_id','Salon Cover Photo', '$salon_name', 'salon_cover')";
                mysql_query($query) or die("error in $query == ----> " . mysql_error());
                $random = mt_rand();
                echo "Upload Successful, Check path ->$image for image which has been uploaded";
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

?>