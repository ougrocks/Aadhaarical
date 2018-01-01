<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<form action="submit.php" method="post">
    <input name="aadhaar_number" type="text" placeholder="Aadhaar Number">
    <input type="hidden" name="action" value="<?php echo md5("sendOTP");?>">
    <input type="submit" value="Send OTP">
</form>
</body>
</html>