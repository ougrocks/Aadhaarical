<?php
session_start();
include_once "includes/config.php";
include_once "includes/functions.php";
if(isset($_SESSION["aadhaar"])) {
include "header.php";
include "sidebar.php";
$aadhaar_number = $_SESSION["aadhaar"];
?>
<!--main content start-->
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> Aadhaaric Licence</h3>
          	
          	<!-- BASIC FORM ELELEMNTS -->
          	<div class="row mt">
          		<div class="col-lg-12">
					<div class="form-panel" style="text-align:left;">
                  	  
                      <p>Aadhaaric Licence is a concept where we have linked the Aadhaar cards of the people with their driving licences. The use of Aadhaar card for getting driving licences being made will not only speed this process but also provide authenticity to the process.</p>
						<p>The idea is to take details of Aadhaar card, and use it to fill in the Form 1 and Form 2 that are required to issue the learning licence. Most of the details would be auto filled and some needs to be filled by the user itself. The aadhaar card would also act as an ID proof and address proof. The user needs to upload his medical and driving certificates into the form. After filling of the forms the payment can be done online. If the payment is succesfully done, the user will be provided an online test containing 10 questions related to "Road Safety and Road Rules & Regulations". The user needs to answer atleast 6 questions correctly out of the 10 to get passed. If the user passes the test he will be given the learning licence.   </p>
						
						<p>After 30 days of issue of the Learning Licence and before 6 months, the user may apply for driving licence. For this, the Form 4 needs to be filled out of which most details will be filled by the Aadhaar card details itself and rest be filled by the user. After filling the forms, the user needs to make the payment after which he will be allotted a slot in his regional RTO Office for his driving test.</p>
						
						<p>Now we come to see that how much simpler and speedy it has become to obtain a learning licence, sitting at his home. This will also reduce cases of forgery, duplicate licences, middlemen commissions and other non-genuine practices.</p>
			
					  
					  
					</div>
					
					
					
					
                      </div>
          	</div><!-- /row -->
              <?php
              $check_flags_query = "SELECT * FROM flags WHERE aadhaar_no = '$aadhaar_number'";
              $execute_flags = mysql_query($check_flags_query);
              $row = mysql_fetch_assoc($execute_flags);
              $flag_form1 = $row["flag_form1"];
              $flag_form2 = $row["flag_form2"];
              $flag_form4 = $row["flag_form4"];
              if($flag_form1 == 1 && $flag_form2 == 1 && $flag_form4 == 1) {
                  ?>
                  <div class="row mt">
                      <div class="col-lg-12">
                          <div class="form-panel" style="text-align:left;">
                              <center>
                                  <?php
                                  $iid = GUID();
                                  $today_day = date('d-m-Y');
                                  $slot_days = date('d-m-Y', strtotime($today_day. ' + 2 days'));
                                  $inser = "INSERT INTO slot VALUES('$iid','$aadhaar_number','$slot_days')";
                                  mysql_query($inser);
                                  echo "Slot Booked for Driving Test (Permanent Licence) is : ".$slot_days;
                                  ?>
                              </center>
                          </div>
                      </div>
                  </div>
                  <?php
              }
              ?>

          	
          	
		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->
    <?php
    include "footer.php";
} else {
    echo "Access Denied";
}
?>