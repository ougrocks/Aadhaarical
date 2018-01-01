<?php
session_start();
if(isset($_SESSION["aadhaar"])) {
    require_once '../includes/config.php';
    require_once '../includes/functions.php';
    $aadhaar_number = $_SESSION["aadhaar"];
    $check_query = "SELECT * FROM flags WHERE aadhaar_no = '$aadhaar_number'";
    $check_result = mysql_query($check_query);
    if(mysql_num_rows($check_result) == 1) {
        $check_flag_forms_row = mysql_fetch_assoc($check_result);
        if ($check_flag_forms_row["flag_form1"] == 1 && $check_flag_forms_row["flag_form2"] == 1) {

            ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <meta name="description" content="">
                <meta name="author" content="Dashboard">
                <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

                <title>Aadhaaric Licence - One Step to avoid Touts</title>

                <!-- Bootstrap core CSS -->
                <link href="assets/css/bootstrap.css" rel="stylesheet">
                <link href="assets/css/ribbon.css" rel="stylesheet">
                <!--external css-->
                <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet"/>
                <link rel="stylesheet" type="text/css" href="assets/js/bootstrap-datepicker/css/datepicker.css"/>
                <link rel="stylesheet" type="text/css" href="assets/js/bootstrap-daterangepicker/daterangepicker.css"/>


                <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>


                <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
                <!-- Custom styles for this template -->
                <link href="assets/css/style.css" rel="stylesheet">
                <link href="assets/css/style-responsive.css" rel="stylesheet">

                <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
                <!--[if lt IE 9]>
                <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
                <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

                <![endif]-->

                <style>

                    #main-content {
                        margin-left: 0px;
                        width: 70%;
                    }

                    .rad div {
                        clear: both;

                    }

                    .rad label {
                        width: 100%;
                        border-radius: 3px;
                        border: 1px solid #D1D3D4;
                        cursor: pointer;
                    }

                    /* hide input */
                    .rad input.radio:empty {
                        margin-left: -999px;
                    }

                    /* style label */
                    .rad input.radio:empty ~ label {
                        position: relative;
                        float: left;
                        line-height: 2.5em;
                        text-indent: 3.25em;

                        cursor: pointer;
                        -webkit-user-select: none;
                        -moz-user-select: none;
                        -ms-user-select: none;
                        user-select: none;
                    }

                    .rad input.radio:empty ~ label:before {
                        position: absolute;
                        display: block;
                        top: 0;
                        bottom: 0;
                        left: 0;
                        content: '';
                        width: 2.5em;
                        background: #D1D3D4;
                        border-radius: 3px 0 0 3px;
                    }

                    /* toggle hover */
                    .rad input.radio:hover:not(:checked) ~ label:before {
                        content: '\2714';
                        text-indent: .9em;
                        color: #C2C2C2;
                    }

                    .rad input.radio:hover:not(:checked) ~ label {
                        color: #888;
                    }

                    /* toggle on */
                    .rad input.radio:checked ~ label:before {
                        content: '\2714';
                        text-indent: .9em;
                        color: #9CE2AE;
                        background-color: #4DCB6D;
                    }

                    .rad input.radio:checked ~ label {
                        color: #777;
                    }

                    /* radio focus */
                    .rad input.radio:focus ~ label:before {
                        box-shadow: 0 0 0 3px #999;
                    }
                </style>
            </head>

        <body>

            <section id="container">
                <!-- **********************************************************************************************************************************************************
                TOP BAR CONTENT & NOTIFICATIONS
                *********************************************************************************************************************************************************** -->
                <!--header start-->
                <header class="header black-bg">

                    <!--logo start-->
                    <a href="index.php" style="margin-left:37%" class="logo"><b> Learning Driver Licence Test</b></a>
                    <!--logo end-->

                    <div class="top-menu" style="margin:1em">
                        <ul class="nav pull-right top-menu">
                            <div><h3>Time Left:<span id="time"></span></h3></div>
                        </ul>
                    </div>
                </header>

                <!--main content start-->
                <center>
                    <section id="main-content">
                        <section class="wrapper">


                            <!-- BASIC FORM ELELEMNTS -->
                            <div class="row mt">
                                <div class="col-lg-12">
                                    <div class="form-panel" style="margin-top:-3%">


                                        <form class="form-horizontal style-form" name="licencetest" method="post"
                                              action="result.php">


                                            <?php

                                            require 'config.php';
                                            $query = $db->query("SELECT * FROM test_ques ORDER BY RAND() LIMIT 10");
                                            if (!empty($query)) {
                                                $i = 1;
                                                $c = 0;

                                                while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                                                    //print_r($ques);


                                                    ?>
                                                    <div style="display:inline-block;">


                                                        <p>

                                                        <h2>Question <?= $i++ ?>.</h2><br><br><br><br>

                                                        <h3><?= $row['question']; ?></h3></p>
                                                        <input type="hidden" name="ques<?= $i ?>"
                                                               value=<?= $row['id']; ?>>


                                                        <?php
                                                        if ($row['pic'] != NULL) {
                                                            ?>

                                                            <img src="<?= $row['pic']; ?>"/>
                                                            <br>
                                                        <?php
                                                        }?>

                                                        <div class="rad col-sm-10">
                                                            <input type="radio" name="option<?= $i ?>"
                                                                   id="radio<?= ++$c ?>" class="rad radio" value="a"/>
                                                            <label for="radio<?= $c ?>"><?= $row['a']; ?></label>
                                                        </div>

                                                        <div class="rad col-sm-10">
                                                            <input type="radio" name="option<?= $i ?>"
                                                                   id="radio<?= ++$c ?>" class="rad radio" value="b"/>
                                                            <label for="radio<?= $c ?>"><?= $row['b']; ?></label>
                                                        </div>


                                                        <div class="rad col-sm-10">
                                                            <input type="radio" name="option<?= $i ?>"
                                                                   id="radio<?= ++$c ?>" class="rad radio" value="c"/>
                                                            <label for="radio<?= $c ?>"><?= $row['c']; ?></label>
                                                        </div>

                                                    </div>


                                                <?php

                                                }

                                            }

                                            ?>
                                            <div style="display:inline-block; width:100%; text-align: center;">
                                                <br>
                                                <input type="submit" class="btn btn-success" value="Finish Test"
                                                       style="width:40%; display:inline;"/>
                                                <br><br>
                                            </div>
                                        </form>


                                    </div>
                                </div>
                                <!-- col-lg-12-->
                            </div>
                            <!-- /row -->


                        </section>
                        <! --/wrapper -->
                    </section>
                </center>
                <!-- /MAIN CONTENT -->

                <!--main content end-->
                <!--footer start-->

                <!--footer end-->
            </section>

            <!-- js placed at the end of the document so the pages load faster -->
            <script src="assets/js/jquery.js"></script>
            <script src="assets/js/bootstrap.min.js"></script>
            <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
            <script src="assets/js/jquery.scrollTo.min.js"></script>
            <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>


            <!--common script for all pages-->
            <script src="assets/js/common-scripts.js"></script>

            <!--script for this page-->
            <script src="assets/js/jquery-ui-1.9.2.custom.min.js"></script>

            <!--custom switch-->
            <script src="assets/js/bootstrap-switch.js"></script>

            <!--custom tagsinput-->
            <script src="assets/js/jquery.tagsinput.js"></script>

            <!--custom checkbox & radio-->

            <script type="text/javascript" src="assets/js/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
            <script type="text/javascript" src="assets/js/bootstrap-daterangepicker/date.js"></script>
            <script type="text/javascript" src="assets/js/bootstrap-daterangepicker/daterangepicker.js"></script>

            <script type="text/javascript" src="assets/js/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>


            <script src="assets/js/form-component.js"></script>


            <script>
                //custom select box

                $(function () {
                    $('select.styled').customSelect();
                });

            </script>
            <script type="text/javascript">
                function startTimer(duration, display) {
                    var timer = duration, minutes, seconds;
                    setInterval(function () {
                        minutes = parseInt(timer / 60, 10);
                        seconds = parseInt(timer % 60, 10);

                        minutes = minutes < 10 ? "0" + minutes : minutes;
                        seconds = seconds < 10 ? "0" + seconds : seconds;

                        display.textContent = minutes + ":" + seconds;
                        if (minutes == 0 && seconds == 0) {
                            document.licencetest.submit();
                        }
                        if (--timer < 0) {
                            timer = duration;
                        }
                    }, 1000);
                }

                window.onload = function () {
                    var fiveMinutes = 120,
                        display = document.querySelector('#time');
                    startTimer(fiveMinutes, display);

                };
            </script>


        </script>
        </
        body >
        < / html >
<?php
        } else {
            header("Location: ../learning.php");
        }
    } else {
        header("Location: ../learning.php");
    }
        }
else {
    echo "Access Denied";
}
?>