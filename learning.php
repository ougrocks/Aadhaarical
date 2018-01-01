<?php
session_start();
include_once "includes/config.php";
if(isset($_SESSION["aadhaar"])) {
    include "header.php";
    include "sidebar.php"
    ?>
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> Learning Licence</h3>
          	

          	
          	<!-- INLINE FORM ELELEMNTS -->
          	<div class="row mt">
          		<div class="col-lg-12">
          			<div class="form-panel">
                  	  <h4 class="mb"><i class="fa fa-angle-right"></i> Fill Details</h4>

                          <?php
                          if(isset($_GET["aadhaar"])) {
                              ?>
                        <form class="form-inline" action="form1.php" method="post" role="form">
                          <div class="form-group">
                              <input type="hidden" name="action" value="<?=md5("form1");?>">
                              <label class="sr-only" for="exampleInputEmail2">Aadhaar Number</label>
                              <input type="text" class="form-control"  name="aadhaar_number" placeholder="Aadhaar Number">
                          </div>
                              <div class="form-group">
                                  <label class="sr-only" for="exampleInputEmail2">OTP</label>
                                  <input type="text" class="form-control"  name="otp" placeholder="OTP">
                              </div>
                              <button type="submit" class="btn btn-theme">Proceed to Form1</button>
                              <?php
                          } else {
                              ?>
                            <form class="form-inline" action="submit.php" method="post" role="form">
                              <div class="form-group">
                                  <input type="hidden" name="action" value="<?=md5("sendOTP");?>">
                                  <label class="sr-only" for="exampleInputEmail2">Aadhaar Number</label>
                                  <input type="text" class="form-control"  name="aadhaar_number" placeholder="Aadhaar Number">
                              </div>
                              <button type="submit" class="btn btn-theme">Get OTP</button>
                              <?php
                          }
                          ?>

                      </form>
          			</div><!-- /form-panel -->
          		</div><!-- /col-lg-12 -->
          	</div><!-- /row -->
          	

          		

          	
		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->
     <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php
include "footer.php";
} else {
    echo "Access Denied";
}
?>