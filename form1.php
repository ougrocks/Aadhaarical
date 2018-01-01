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
       // print_r($response);
        $address = $response["kyc"]["poa"]["co"].", ".$response["kyc"]["poa"]["house"]." ".$response["kyc"]["poa"]["street"].", ".$response["kyc"]["poa"]["vtc"]." ".$response["kyc"]["poa"]["dist"]." - ".$response["kyc"]["poa"]["pc"].", ".$response["kyc"]["poa"]["state"];
        $date_of_birth = $response["kyc"]["poi"]["dob"];
        $age_explode = explode('-',$date_of_birth);
        $age = date('Y') - $age_explode[2];
        $pincode = $response["kyc"]["poa"]["pc"];

    }

    ?>
    <section id="main-content">
        <section class="wrapper">
            <h3><i class="fa fa-angle-right"></i> Form 1 (Self declaration of Medical fitness)</h3>
            <?php
            if(isset($_GET["action"]) && $_GET["action"] == md5("update")) {
                ?>
                <div class="row mt">
                    <div class="col-lg-12">
                        <div class="form-panel">
                            <center>Entries Updated Successfully.
                            <a href="form2.php">Click here for Form2</a>
                            </center>
                        </div></div></div>
                <?php
            }
            if(isset($_GET["action"]) && $_GET["action"] == md5("insert")) {
                ?>
                <div class="row mt">
                    <div class="col-lg-12">
                        <div class="form-panel">
                            <center>Entries Inserted Successfully.
                                <a href="form2.php">Click here for Form2</a></center>
                        </div></div></div>
            <?php
            }
            if(isset($age) && $age < 18) {
                ?>
                <div class="row mt">
                    <div class="col-lg-12">
                        <div class="form-panel">
                            <center>Your age should be above 18 years for DL.</center>
                        </div></div></div>
                <?php
            } else {
            ?>



<?php
if(isset($address)) {
?>
            <!-- BASIC FORM ELELEMNTS -->
            <div class="row mt" <?php if(isset($_GET["action"])) echo 'style="display:none;"'; ?>>
                <div class="col-lg-12">
                    <form id="form-1" class="form-horizontal style-form" method="POST" action="submit.php">
                    <div class="form-panel">
                        <!--<h4 class="mb"><i class="fa fa-angle-right"></i> Form Elements</h4>-->
                            <input type="hidden" name="action" value="<?=md5("submitform1");?>"/>
                            <input type="hidden" name="aadhaar_number" value="<?=$aadhaar_number;?>">
                            <input type="hidden" name="pincode" value="<?=$pincode;?>">
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
                                    <input type="radio" name="radio" id="radio3" class="radio" value="Wife"/>
                                    <label for="radio3">Wife</label>
                                </div>
                                <div class="rad col-sm-10" style="margin-top:-6%;margin-left:37.5%;">
                                    <input type="radio" name="radio" id="radio4" class="radio" value="Daughter"/>
                                    <label for="radio4">Daughter</label>
                                </div>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" style="width:60%;margin-top:-4.5%;margin-left:60.5%;" name="in_relation"/>
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
                                    <input type="text" class="form-control" name="tempadd"/>
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
                                    <input type="text" class="form-control" name="idmarks"/>
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
                                        <input type="checkbox" value="Yes" name="declaration-a"/>
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
                                        <input type="checkbox" value="Yes" name="declaration-b"/>
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
                                        <input type="checkbox" value="Yes" name="declaration-c"/>
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
                                        <input type="checkbox" value="Yes" name="declaration-d"/>
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
                                        <input type="checkbox" value="Yes" name="declaration-e"/>

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
                                        <input type="checkbox" value="Yes" name="declaration-f"/>
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
                                        <input type="checkbox" value="Yes" name="declaration-g"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="checkbox-inline col-sm-10 text-right">
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
                    </form>
                </div>
                <?php } }?>
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