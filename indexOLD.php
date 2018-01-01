
<!DOCTYPE HTML>
<html>
<head>
<title>Aadhaaric Licence</title>
<link href="css/style.css" rel='stylesheet' type='text/css' />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Shadow Tres Forms,Login Forms,Sign up Forms,Registration Forms,News latter Forms,Elements."/>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <link href="http://fonts.googleapis.com/css?family=Ubuntu+Mono:400,700,400italic,700italic|Ubuntu:300,400,500,700,300italic,400italic,500italic,700italic|Ubuntu+Condensed" rel="stylesheet" type="text/css">
<script>var __links = document.querySelectorAll('a');function __linkClick(e) { parent.window.postMessage(this.href, '*');} ;for (var i = 0, l = __links.length; i < l; i++) {if ( __links[i].getAttribute('data-t') == '_blank' ) { __links[i].addEventListener('click', __linkClick, false);}}</script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script>$(document).ready(function(c) {
	$('.alert-close').on('click', function(c){
		$('.message').fadeOut('slow', function(c){
	  		$('.message').remove();
		});
	});	  
});
</script>
<!---->
<script>$(document).ready(function(c) {
	$('.close-one').on('click', function(c){
		$('.message1').fadeOut('slow', function(c){
	  		$('.message1').remove();
		});
	});	  
});
</script>
<!---->
<script>$(document).ready(function(c) {
	$('.close-two').on('click', function(c){
		$('.message2').fadeOut('slow', function(c){
	  		$('.message2').remove();
		});
	});	  
});
</script>
</head>
<body>
 <div class="shadow-forms">
 		<h1>Aadhaaric Licence</h1>
	<div class="message warning shape"  style="float: left; margin-left:10%; ">
	<div class="one-login-head">
			 
			 <h2><img src="images/user.png" alt=""/>
			 LOG IN</h2>	
	</div>
		<form action="submit.php" method="post">
			<ul>
                <input type="hidden" value="<?=md5("login");?>" name="action">
				<li>
					<input type="text" name="aadhaar_number" class="text" placeholder="Aadhaar ID" ><a href="#" class=" icon arrow"></a>
				</li>
				<li>
					<input type="password" name="password" placeholder="Password"><a href="#" class=" icon arrow"></a>
				</li>
			</ul>
					

				<div class="submit">
						<input type="submit" value="LOG IN" >
				</div>
            <?php
            if(isset($_GET["error"]) && $_GET["error"] == md5("wrongpassword")) {
                echo '<br><center><p>Wrong Password !!</p></center>';
            }
            if(isset($_GET["error"]) && $_GET["error"] == md5("blank")) {
                echo '<br><center><p>Fields cant be Blank !!</p></center>';
            }
                ?>
				</form>
		</div>
			
	<!--Second-login-->
<div class="message1 warning shape" style="float:right; margin-right: 17%; margin-top: 3%;">
	<div class="login-head">
			
			 <h2><img src="images/user.png" alt=""/>
			SIGN UP</h2>
	</div>
		<form action="submit.php" method="post">
			<ul>
				<li>
                    <input type="hidden" value="<?=md5("sendOTP");?>" name="action">
					<input type="text" class="text" name="aadhaar_number" placeholder="Aadhaar ID"><a href="#" class=" icon arrow"></a>
				</li>
			</ul>
			<div class="buttons">
				<ul>
					<li class="fb" style="width:50%;">
					<input type="submit" class="hvr-shutter-in-vertical" style="cursor: pointer;" value="Get OTP">
					</li>
				</ul>
			</div>
            </form>
    <?php
    if(isset($_GET["success"])) {
        echo '<center><p>'.$_GET["success"].' Registered Successfully.</center>';
    }
    if(isset($_GET["error"]) && $_GET["error"] == md5("authfail")) {
        echo '<center><p>Authentication Failed.</p></center>';
    }
    if(isset($_GET["error"]) && $_GET["error"] == md5("already")) {
        echo '<center><p>Aadhaar Card Already Registered.</p></center>';
    }
    if(isset($_GET["error"]) && $_GET["error"] == md5("passwordnotmatch")) {
        echo '<center><p>Recheck Password, Password doesnt match.</p></center>';
    }
    if(isset($_GET["error"]) && $_GET["error"] == md5("invalid")) {
        echo '<center><p>Invalid Aadhaar Card.</p></center>';
    }
    ?>
			<div class="clear"></div>
			<br>
    <?php
    if(isset($_GET["aadhaar"])) {
    ?>
    <form action="submit.php" method="post">
			<ul>
				<li><input type="hidden" name="action" value="<?=md5("register");?>">
                    <input type="hidden" name="aadhaar_number" value="<?=$_GET["aadhaar"];?>">
					<input type="password" name="otp" placeholder="One Time Password"><a href="#" class=" icon arrow"></a>
				</li>
				<li>
					<input type="password" name="password" placeholder="Set an Account Password"><a href="#" class=" icon arrow"></a>
				</li>
				<li>
					<input type="password" name="confirm_password" placeholder="Confirm Account Password"><a href="#" class=" icon arrow"></a>
				</li>
			</ul>
				<div class="submit one">
						<input type="submit"  value="SIGN UP" >
				</div>
						
				</form>
    <?php } ?>
		</div>
	</div>
<!--- footer -->
<div class="footer clear" style="padding-top: 4%;">
	

</div>
</body>
</html>