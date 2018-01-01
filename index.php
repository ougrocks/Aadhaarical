<!DOCTYPE HTML>
<html>
<head>
    <title>Aadhaaric Licence</title>
    <link href="css/style.css" rel='stylesheet' type='text/css'/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="keywords"
          content="Shadow Tres Forms,Login Forms,Sign up Forms,Registration Forms,News latter Forms,Elements."/>
    <link
        href="http://fonts.googleapis.com/css?family=Ubuntu+Mono:400,700,400italic,700italic|Ubuntu:300,400,500,700,300italic,400italic,500italic,700italic|Ubuntu+Condensed"
        rel="stylesheet" type="text/css">
    <script>
        /*var __links = document.querySelectorAll('a');
        function __linkClick(e) {
            parent.window.postMessage(this.href, '*');
        }
        for (var i = 0, l = __links.length; i < l; i++) {
            if (__links[i].getAttribute('data-t') == '_blank') {
                __links[i].addEventListener('click', __linkClick, false);
            }
        }*/
    </script>
    <script src="assets/js/jquery-1.8.3.min.js"></script>
    <script>
        $(document).ready(function (c) {
            $('.alert-close').on('click', function (c) {
                $('.message').fadeOut('slow', function (c) {
                    $('.message').remove();
                });
            });
            $('.close-one').on('click', function (c) {
                $('.message1').fadeOut('slow', function (c) {
                    $('.message1').remove();
                });
            });
            $('.close-two').on('click', function (c) {
                $('.message2').fadeOut('slow', function (c) {
                    $('.message2').remove();
                });
            });
            $('.open-register').on('click',function(event) {
                $('.message').removeClass('show').addClass('hide');
                $('.message1').removeClass('hide').addClass('show');
                event.preventDefault();
            });
            $('.open-login').on('click',function(event) {
                $('.message').removeClass('hide').addClass('show');
                $('.message1').removeClass('show').addClass('hide');
                event.preventDefault();
            });
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
</head>
<body>
<div class="shadow-forms">
    <h1>Aadhaaric Licence</h1>
    <div class="background"></div>
    <div class="background-overlay"></div>
    <div class="message warning show">
        <div class="one-login-head">

            <h2><img src="images/user.png" alt=""/>
                LOG IN</h2>
        </div>
        <form action="submit.php" method="post">
            <ul>
                <input type="hidden" value="<?= md5("login"); ?>" name="action">
                <li>
                    <input type="text" name="aadhaar_number" class="text" placeholder="Aadhaar ID"><a href="#"
                                                                                                      class=" icon arrow"></a>
                </li>
                <li>
                    <input type="password" name="password" placeholder="Password"><a href="#" class=" icon arrow"></a>
                </li>
            </ul>


            <div class="submit">
                <input type="submit" value="LOG IN">
            </div>
            <?php
            if(isset($_GET["error"]) && $_GET["error"] == md5("wrongpassword")) {
                echo '<br><center><p>Wrong Password !!</p></center>';
            }
            if(isset($_GET["error"]) && $_GET["error"] == md5("blank")) {
                echo '<br><center><p>Fields cant be Blank !!</p></center>';
            }
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
            <div class="submit">Don't Have Account? <a href="#" class="open-register">Register With Us</a></div>
        </form>

    </div>

    <!--Second-login-->
    <div class="message1 warning hide">
        <div class="login-head">

            <h2><img src="images/user.png" alt=""/>
                SIGN UP</h2>
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
<!--- footer -->
<div class="footer clear" style="padding-top: 4%;">

</div>
</body>
</html>