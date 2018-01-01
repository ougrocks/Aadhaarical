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
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
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
            <div class="submit">Don't Have Account? <a href="#" class="open-register">Register With Us</a></div>
        </form>

    </div>

    <!--Second-login-->
    <div class="message1 warning hide">
        <div class="login-head">

            <h2><img src="images/user.png" alt=""/>
                SIGN UP</h2>
        </div>
        <form>
            <ul>
                <li>
                    <input type="text" class="text" placeholder="Aadhaar ID"><a href="#" class=" icon arrow"></a>
                </li>
            </ul>
            <div class="buttons">
                <ul>
                    <li class="fb" style="width:50%;">
                        <a href="#" class="hvr-shutter-in-vertical">Get OTP</a>
                    </li>
                </ul>
            </div>
            <div>OTP will be sent to your registered mobile number of your Aadhaar</div>
            <div class="clear"></div>
            <br>
            <ul>
                <li>
                    <input type="password" placeholder="One Time Password"><a href="#" class=" icon arrow"></a>
                </li>
                <li>
                    <input type="password" placeholder=" Set an Account Password"><a href="#" class=" icon arrow"></a>
                </li>
                <li>
                    <input type="password" placeholder="Confirm Account Password"><a href="#" class=" icon arrow"></a>
                </li>
            </ul>
            <div class="submit one">
                <input type="submit" value="SIGN UP">
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