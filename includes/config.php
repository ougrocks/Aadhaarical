<?php
/**
 * Created by PhpStorm.
 * User: KThanksBye
 * Date: 6/6/2015
 * Time: 4:09 PM
 */
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "aadhaaric_licence";
$result = mysql_connect($hostname,$username,$password);
if($result) {
    $select_database = mysql_select_db($dbname) or die(mysql_error());
} else {
    $error = mysql_error($result);
    header("Location: 500.php?error=$error");
}
