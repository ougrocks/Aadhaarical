<?php
session_start();
include_once "includes/config.php";
if(isset($_SESSION["aadhaar"])) {
include "header.php";
    ?>
    <link href="css/style.css" rel='stylesheet' type='text/css'/>
    <?php
include "sidebar.php"
?>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script>
        $(document).ready(function (c) {
            $(".get-otp").on('click',function(event){
                $.ajax({
                    url : 'otp.php',
                    data : {
                        aadhaarId : $('#aadhaar-id').val()
                    },
                    success : function(msg) {
                        if(msg == 1) {
                            $(".register-error").text("OTP has been sent to your registered mobile number in Aadhaar");
                            $(".after-otp").show();
                        } else {
                            $(".register-error").text("OTP Not Sent, Invalid Aadhaar Number");
                        }
                    },
                    error : function(msg) {
                        $(".register-error").text(msg);
                    }
                });

            })
        });
    </script>
      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->

      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper site-min-height">
          	<h3><i class="fa fa-angle-right"></i> Blank Page</h3>
          	<div class="row mt">
          		<div class="col-lg-12">
                    <div class="message1 default">
                            <div class="login-head">

                                <h2><img src="images/user.png" alt=""/>
                                    Learning Licence</h2>
                            </div>
                            <form action="submit.php" method="post">
                                <ul>
                                    <li>
                                        <input type="hidden" name="action" value="<?=md5("register");?>">
                                        <input id="aadhaar-id" name="aadhaar_number" type="text" class="text" placeholder="Aadhaar ID"><a href="#" class=" icon arrow"></a>
                                    </li>
                                </ul>
                                <div class="buttons">
                                    <ul>
                                        <li class="fb">
                                            <a href="#" class="hvr-shutter-in-vertical get-otp">Get OTP</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="register-error" style="color:mediumseagreen">OTP will be sent to your registered mobile number of your Aadhaar</div>
                                <div class="clear"></div>
                                <br>
                                <div class="after-otp" style="display: none">
                                    <div style="color:mediumseagreen">Enter received OTP here</div>
                                    <ul>
                                        <li>
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
                                        <input type="submit" value="SIGN UP">
                                    </div>
                                </div>
                                <div class="submit">Already Have an Account? <a href="#" class="open-login">Login Here</a></div>
                            </form>
                        </div>

                    </div>
          		</div>

			
		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->
    <?php
    include "footer.php";
} else {
    echo "Access Denied";
}
?>