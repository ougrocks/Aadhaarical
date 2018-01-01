<?php
session_start();
include_once "includes/config.php";
include_once "includes/functions.php";
if(isset($_SESSION["aadhaar"])) {
include "header.php";
include "sidebar.php";
$aadhaar_number = $_SESSION["aadhaar"];
$pincode = fetchPincode($aadhaar_number);

?>      <!--main content start-->
    <section id="main-content" xmlns="http://www.w3.org/1999/html">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> Form 4 (Application for Permanent Licence)</h3>
    <?php
    if(isset($_GET["action"]) && $_GET["action"] == md5("form4sub")) {
        ?>
        <div class="row mt">
            <div class="col-lg-12">
                <div class="form-panel">
                    <center>Form 4 Submitted Successfully.</center>
                </div></div></div>
    <?php } else {?>
          	<!-- BASIC FORM ELELEMNTS -->
          	<div class="row mt">
          		<div class="col-lg-12">
					<div class="form-panel">
                  	  <!--<h4 class="mb"><i class="fa fa-angle-right"></i> Form Elements</h4>-->
                      <form class="form-horizontal style-form" method="post" action="submit.php" enctype="multipart/form-data">
                      <input type="hidden" value="<?=md5("submitform4");?>" name="action">
                      <input type="hidden" name="aadhaar_number" value="<?=$aadhaar_number;?>">
                          <div class="form-group">
                              <label class="col-sm-2 control-label">RTO Office:</label>
                              <div class="col-sm-10">
                                  <select class="form-control col-sm-4" name="rto_office">
									<option></option>
								  </select>
								  &nbsp;&nbsp;&nbsp;(To be filled according to the PINCODE of the Permanent Address)
                              </div>
                          </div>
						 <div class="form-group">
                              <label class="col-sm-2 control-label">Category of Vehicle: (Atleast one)</label>
								<div class="checkbox col-sm-2">
									<label>
										<input type="checkbox" value="MCWOG" name="cat[]">
										Motor cycle without gear
									</label>
								</div>
								<div class="checkbox col-sm-2">
								<label>
									<input type="checkbox" value="MCWG" name="cat[]">
									Motor cycle with gear
								</label>
								</div>
								<div class="checkbox col-sm-2">
								<label>
									<input type="checkbox" value="IG" name="cat[]">
									Invalid Carriage
								</label>
								</div>
								<div class="checkbox col-sm-2">
								<label>
									<input type="checkbox" value="LMV" name="cat[]">
									Light Motor Vehicle
								</label>
								</div>
								<div class="checkbox col-sm-2">
								<label>
									<input type="checkbox" value="MGV" name="cat[]">
									Medium Goods Vehicle
								</label>
								</div>
								<div class="checkbox col-sm-2">
								<label>
									<input type="checkbox" value="MPMV" name="cat[]">
									Medium passenger motor vehicle
								</label>
								</div>
								<div class="checkbox col-sm-2">
								<label>
									<input type="checkbox" value="HGV" name="cat[]">
									Heavy goods vehicle
								</label>
								</div>
								<div class="checkbox col-sm-2">
								<label>
									<input type="checkbox" value="RR" name="cat[]">
									Road roller
								</label>
								</div>
																			
                              </div>
					
							
							
						  <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Educational Qualification:</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="qualification" >
                              </div>
                          </div>
						  
						 
						  <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Blood Group (Optional):</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="bgroup" >
                              </div>
                          </div>
						  <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">RH Factor (Optional):</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="rhfactor" >
                              </div>
                          </div>
						  <div class="form-group">
                              <label class="col-sm-8 control-label">Have you previously held driving licence. If so give details:</label>
                              <div class="col-sm-4">
                                  <input type="text" class="form-control" name="p1" >
                              </div>
                          </div>
						  <div class="form-group">
                              <label class="col-sm-8 control-label">Particulars and date of every conviction which has been ordered to be endorsed to any licence held by the applicant</label>
                              <div class="col-sm-4">
                                  <input type="text" class="form-control" name="p2" >
                              </div>
                          </div>
						  <div class="form-group">
                              <label class="col-sm-8 control-label">Have you been disqualified for obtaining a licence to drive ? If so, for what reasons</label>
                              <div class="col-sm-4">
                                  <input type="text" class="form-control" name="p3" >
                              </div>
                          </div>
						  <div class="form-group">
                              <label class="col-sm-4 control-label">Have you been subjected to a driving test as to your fitness or ability to drive a vehicle in respect of which a licence to drive is applied for ? If so give the following details :</label>
                              <div class="col-sm-8">
                                <div class="content-panel">
									  <table class="table table-hover">
									  
										  <thead>
										  <tr>
											  <th>#</th>
											  <th>Date Of Test</th>
											  <th>Testing Authority</th>
											  <th>Result Of Test</th>
										  </tr>
										  </thead>
										  <tbody>
										  <tr>
											  <td>1</td>
											  <td><input type="text" class="form-control" name="d1" ></td>
											  <td><input type="text" class="form-control" name="t1" ></td>
											  <td><input type="text" class="form-control" name="r1" ></td>
										  </tr>
										  <tr>
											  <td>2</td>
											  <td><input type="text" class="form-control" name="d2"></td>
											  <td><input type="text" class="form-control" name="t2"></td>
											  <td><input type="text" class="form-control" name="r2"></td>
										  </tr>
										  <tr>
											  <td>3</td>
											  <td><input type="text" class="form-control" name="d3"></td>
											  <td><input type="text" class="form-control" name="t3"></td>
											  <td><input type="text" class="form-control" name="r3"></td>
										  </tr>
										  </tbody>
									  </table>
								</div><! --/content-panel -->
                              </div>
                          </div>
						  <div class="form-group">
                              <label class="col-sm-12 control-label">I have enclosed three copies of my recent photographs of the five centimeters into six centimeters (where laminated card is used no photographs are required)</label>
                          </div>
						  <div class="form-group">
                              <label class="col-sm-4 control-label">I have enclosed the learner’s licence issued by licensing authority</label>
							  <div class="col-sm-2">
                                  <p>Licence No</p><br>
								  <p>Licence Date</p>
                              </div>
                              <div class="col-sm-6">
                                  <input type="text" class="form-control" name="licence_no" ><br>
								  <input type="text" class="form-control" name="licence_date" >
                              </div>
                          </div>
						  <div class="form-group">
                              <label class="col-sm-8 control-label">Medical Certificate (recently issued by a doctor):</label>
                              <div class="col-sm-4">
                                  <input type="file" class="form-control" name="medcert" >
                              </div>
                          </div>
						  <div class="form-group">
                              <label class="col-sm-8 control-label">Driving Certificate (recently issued by a motor driving school):</label>
                              <div class="col-sm-4">
                                  <input type="file" class="form-control" name="drivecert" >
                              </div>
                          </div>
						  <div class="form-group">
						<label class="col-sm-10 control-label">I am exempted from the Medical Test rule 6 of Centre Motor Vehicle Rules, 1989.</label>
							<div class="row mt">
                              <div class="col-sm-2 text-center">
                                  <div class="switch switch-square"
                                       data-on-label="<i class=' fa fa-check'></i>"
                                       data-off-label="<i class='fa fa-times'></i>">
                                      <input type="checkbox" name="check1" value="Yes" />
                                  </div>
                              </div> 
							</div>
						</div>
						<div class="form-group">
						<label class="col-sm-10 control-label">I am exempted from the preliminary test under Rule 11 (2) of Central Motor Vehicle Rules, 1989I am exempted from the preliminary test under Rule 11 (2) of Central Motor Vehicle Rules, 1989</label>
							<div class="row mt">
                              <div class="col-sm-2 text-center">
                                  <div class="switch switch-square"
                                       data-on-label="<i class=' fa fa-check'></i>"
                                       data-off-label="<i class='fa fa-times'></i>">
                                      <input type="checkbox" name="check2" value="Yes" />
                                  </div>
                              </div> 
							</div>
						</div>
						<div class="form-group">
							<label class="checkbox-inline col-sm-10 control-label">&nbsp;&nbsp;&nbsp;&nbsp;
							  <input type="checkbox" name="declare" value="declare1">I hereby declare that to the best of my knowledge and belief, the particulars gives above and the declaration made therein are true.
							</label>
						</div>
						<div class="form-group">
                              <label class="col-sm-2 control-label">Today's Date:</label>
                              <div class="col-sm-8">
                                  <input type="text" class="form-control" value="<?=getTime();?>" disabled >
                                  <input type="hidden" value="<?=getTime();?>" name="today_date">
                              </div>
                        </div>
                          <?php
                          $country=file_get_contents('http://api.hostip.info/get_html.php?ip='.$_SERVER['REMOTE_ADDR']);
                          $city_arr = explode(" ",$country);
                          $current_city = $city_arr[4];
                          ?>
						<div class="form-group">
                              <label class="col-sm-2 control-label">Current Place:</label>
                              <div class="col-sm-8">
                                  <input type="text" class="form-control" name="place" value="<?=$current_city;?>" disabled >
                                  <input type="hidden" name="place" value="<?=$current_city;?>">
                              </div>
                        </div>
						<div class="col-sm-10 text-center">
						<button type="submit" class="btn btn-theme">Submit</button>
						</div>
						<br><br><br>
                      </form>
					</div>
					
					
					

                          
          	</div><!-- /row -->
          	
<?php } ?>
		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->

    <?php
    include "footer.php";
} else {
    echo "Access Denied";
}
?>