<?php
session_start();
include_once "includes/config.php";
include_once "includes/functions.php";
include_once "config.php";
if(isset($_SESSION["aadhaar"])) {
    include "header.php";
    include "sidebar.php";
    $aadhaar_number = $_SESSION["aadhaar"];
    $pincode = fetchPincode($aadhaar_number);
    $state = getState($pincode);
    $state = ucwords(strtolower($state));

?>
      
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> Form 2 (Application for Learner Licence)</h3>

              <?php
              if(isset($_GET["action"]) && $_GET["action"] == md5("form2sub")) {
              ?>
              <div class="row mt">
                  <div class="col-lg-12">
                      <div class="form-panel">
                          <center>Form 2 Submitted Successfully.</center>
                          </div></div></div>
              <?php } else {?>

          	<!-- BASIC FORM ELELEMNTS -->
          	<div class="row mt">
          		<div class="col-lg-12">
					<div class="form-panel">
                  	  <!--<h4 class="mb"><i class="fa fa-angle-right"></i> Form Elements</h4>-->
                      <form class="form-horizontal style-form" method="post" action="submit.php" enctype="multipart/form-data">
                          <input type="hidden" name="action" value="<?=md5("submitform2");?>">
                          <input type="hidden" name="aadhaar_number" value="<?=$aadhaar_number;?>">
                          <div class="form-group">
                              <?php
                              $queryy  =  $db->query("SELECT RegNo,Place FROM rto_list WHERE State = '$state'");
                              ?>
                              <label class="col-sm-2 control-label">RTO Office:</label>
                              <div class="col-sm-10">
                                  <select class="form-control col-sm-4" name="rto_office">
                                      <?php
                                      if(!empty($queryy)) {
                                      while($row = $queryy->fetch(PDO::FETCH_ASSOC)){
                                      ?>
                                          <option value="<?=$row['RegNo'];?>"><?=$row['RegNo'];?>:-&nbsp;<?=$row['Place'];?></option>
                                      <?php }} ?>
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
                              <label class="col-sm-8 control-label">I hold an effective driving licence to drive a Motor cycle/light motor vehicle/medium passenger motor vehicle/medium goods vehicle with effect from:</label>
                              <div class="col-sm-4">
                                  <input type="text" class="form-control" name="p1" >
                              </div>
                          </div>
						  <div class="form-group">
                              <label class="col-sm-8 control-label">Particulars of any driving licence previously held by applicant. Whether it was cancelled and if so, for what reason</label>
                              <div class="col-sm-4">
                                  <input type="text" class="form-control" name="p2" >
                              </div>
                          </div>
						  <div class="form-group">
                              <label class="col-sm-8 control-label">Particulars of any learners licence previously held up applicant in respect of the description of vehicle to which the applicant has applied</label>
                              <div class="col-sm-4">
                                  <input type="text" class="form-control" name="p3" >
                              </div>
                          </div>
						  <div class="form-group">
                              <label class="col-sm-8 control-label">Have you been disqualified for holding or obtaining driving licence or learner's licence if so, for what reasons.</label>
                              <div class="col-sm-4">
                                  <input type="text" class="form-control" name="p4" >
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
					</div>
					
					</form>
					
					
                          
          	</div><!-- /row -->
          	<?php }?>
          	
		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->
    <?php
    include "footer.php";
} else {
    echo "Access Denied";
}
?>