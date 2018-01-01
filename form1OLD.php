<?php
session_start();
include_once "includes/config.php";
include_once "includes/functions.php";
if(isset($_SESSION["aadhaar"])) {
    include "header.php";
    include "sidebar.php";
    if(isset($_POST["action"]) && isset($_POST["aadhaar_number"]) && isset($_POST["otp"]) && $_POST["action"] == md5("form1")) {
        $aadhaar_number = $_POST["aadhaar_number"];
        $otp = $_POST["otp"];
        $response = kycFullData($aadhaar_number,$otp);
        print_r($response);
        $address = $response["kyc"]["poa"]["co"].", ".$response["kyc"]["poa"]["house"]." ".$response["kyc"]["poa"]["street"].", ".$response["kyc"]["poa"]["vtc"]." ".$response["kyc"]["poa"]["dist"]." - ".$response["kyc"]["poa"]["pc"].", ".$response["kyc"]["poa"]["state"];
        $date_of_birth = $response["kyc"]["poi"]["dob"];
        $age_explode = explode('-',$date_of_birth);
        $age = date('Y') - $age_explode[2];
    }

    ?>
    <section id="main-content">
        <section class="wrapper">
            <h3><i class="fa fa-angle-right"></i> Form 1 (Self declaration of Medical fitness)</h3>

            <!-- BASIC FORM ELELEMNTS -->
            <div class="row mt">
                <div class="col-lg-12">
                    <div class="form-panel">
                        <!--<h4 class="mb"><i class="fa fa-angle-right"></i> Form Elements</h4>-->
                        <form class="form-horizontal style-form" method="POST" action="submit.php">
                            <input type="hidden" name="action" value="<?=md5("submitform1");?>">
                            <input type="hidden" name="aadhaar_number" value="<?=$aadhaar_number;?>">
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Name:</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="<?=$name;?>" disabled>
                                    <input type="hidden" name="name" value="<?=$name;?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">In Relation</label>

                                <div class="rad col-sm-10" style="margin-top:-5%;margin-left:16.5%">
                                    <input type="radio" name="radio" id="radio2" class="rad radio" value="Son" checked/>
                                    <label for="radio2">Son</label>
                                </div>
                                <div class="rad col-sm-10" style="margin-top:-6%;margin-left:27%">
                                    <input type="radio" name="radio" id="radio3" value="Wife" class="radio"/>
                                    <label for="radio3">Wife</label>
                                </div>
                                <div class="rad col-sm-10" style="margin-top:-6%;margin-left:37.5%;">
                                    <input type="radio" name="radio" id="radio4" value="Daughter" class="radio"/>
                                    <label for="radio4">Daughter</label>
                                </div>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control"
                                           style="width:60%;margin-top:-4.5%;margin-left:60.5%;" name="in_relation">
                                </div>

                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Permanent Address:</label>

                                <div class="col-sm-10">
                                    <input type="text" value="<?=$address;?>" class="form-control" disabled>
                                    <input type="hidden" name="permadd" value="<?=$address;?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Temporary Address:</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="tempadd">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Date Of Birth:</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="<?=$date_of_birth;?>" disabled>
                                    <input type="hidden" name="dob" value="<?=$date_of_birth;?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Age:</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="<?=$age;?>" disabled>
                                    <input type="hidden" name="age" value="<?=$age;?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Identification Marks:</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="idmarks">
                                </div>
                            </div>
                    </div>
                    <div class="form-panel">
                        <h4 class="mb"><i class="fa fa-angle-right"></i> Declaration</h4>

                        <div class="form-group">
                            <label class="col-sm-10 control-label">(a) Do you suffer from epilepsy, or from sudden
                                attacks of loss of consciousness or giddiness from any cause ?</label>

                            <div class="row mt">
                                <div class="col-sm-2 text-center">
                                    <div class="switch switch-square"
                                         data-on-label="<i class=' fa fa-check'></i>"
                                         data-off-label="<i class='fa fa-times'></i>">
                                        <input type="checkbox" name="a"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-10 control-label">(b) Are you able to distinguish with each eye (or if
                                you have held a driving license to
                                drive a motor vehicle for a period of not less than five years and if you have lost,
                                the sight of one eye after the said period of five years and if the application is for
                                driving a motor vehicle other than a transport vehicle fitted with an outside mirror
                                on the steering wheel side) or with eye, at a distance of 25 metres in good day light
                                (with glasses, if worn ) a motor car number plate?</label>

                            <div class="row mt">
                                <div class="col-sm-2 text-center">
                                    <div class="switch switch-square"
                                         data-on-label="<i class=' fa fa-check'></i>"
                                         data-off-label="<i class='fa fa-times'></i>">
                                        <input type="checkbox" name="b"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-10 control-label">(c) Have you lost either hand or foot or are you
                                suffering from a defect or muscular power of either arm or leg ?</label>

                            <div class="row mt">
                                <div class="col-sm-2 text-center">
                                    <div class="switch switch-square"
                                         data-on-label="<i class=' fa fa-check'></i>"
                                         data-off-label="<i class='fa fa-times'></i>">
                                        <input type="checkbox" name="c"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-10 control-label">(d) Can you readily distinguish the pigmentary
                                colours, red and green ?</label>

                            <div class="row mt">
                                <div class="col-sm-2 text-center">
                                    <div class="switch switch-square"
                                         data-on-label="<i class=' fa fa-check'></i>"
                                         data-off-label="<i class='fa fa-times'></i>">
                                        <input type="checkbox" name="d"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-10 control-label">(e) Do you suffer from night blindness ?</label>

                            <div class="row mt">
                                <div class="col-sm-2 text-center">
                                    <div class="switch switch-square"
                                         data-on-label="<i class=' fa fa-check'></i>"
                                         data-off-label="<i class='fa fa-times'></i>">
                                        <input type="checkbox" name="e"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-10 control-label">(f) Are you so deaf as to be unable to hear (and if
                                the application is for driving a light motor vehicle, with or without hearing aid) the
                                ordinary sound signal ?</label>

                            <div class="row mt">
                                <div class="col-sm-2 text-center">
                                    <div class="switch switch-square"
                                         data-on-label="<i class=' fa fa-check'></i>"
                                         data-off-label="<i class='fa fa-times'></i>">
                                        <input type="checkbox" name="f"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-10 control-label">(g) Do you suffer from any other disease or
                                disability likely to cause your driving of a
                                motor vehicle to be a source of danger to the public.</label>

                            <div class="row mt">
                                <div class="col-sm-2 text-center">
                                    <div class="switch switch-square"
                                         data-on-label="<i class=' fa fa-check'></i>"
                                         data-off-label="<i class='fa fa-times'></i>">
                                        <input type="checkbox" name="g"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="checkbox-inline">
                                <input type="checkbox" name="declare" value="declare1">I hereby declare that to the best
                                of my knowledge and belief, the particulars gives above
                                and the declaration made therein are true.
                            </label>
                        </div>
                    </div>
                    <div class="form-panel">
                        <h4 class="mb"><i class="fa fa-angle-right"></i> Note</h4>

                        <div class="form-group">
                            <b>(1)</b> Applicant who answers `Yes' to any of the questions (a), (c), (e), (f) and (g)
                            or `No' to either of the questions (b) and (d) should amplify his answers with
                            full particulars, and may be required to give further information relating
                            thereto.
                        </div>
                        <div class="form-group">
                            <b>(2)</b> This declaration is to be submitted invariably certificate in Form 1-A.

                        </div>
                        <div class="col-sm-10 text-center">
                            <button type="submit" class="btn btn-theme">Submit</button>
                        </div>
                        <br><br><br>
                    </div>


                </div>
                <!-- /row -->


        </section>
        <! --/wrapper -->
    </section><!-- /MAIN CONTENT -->

    <!--main content end-->
    <?php
    include "footer.php";
} else {
    echo "Access Denied";
}
?>