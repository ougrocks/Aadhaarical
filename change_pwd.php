<?php
session_start();
include_once "includes/config.php";
include_once "includes/functions.php";
if(isset($_SESSION["aadhaar"])) {
include "header.php";
include "sidebar.php";
$aadhaar_number = $_SESSION["aadhaar"];

?><!--main content start-->
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> Change Account Password</h3>
              <?php
              if(isset($_GET["error"]) || isset($_GET["action"])) {
                  if( isset($_GET["error"]) && $_GET["error"] == md5("nomatch")) {
                      ?>
                      <div class="row mt">
                          <div class="col-lg-12">
                              <div class="form-panel">
                                  <center>Password Doesnt Match.</center>
                              </div>
                          </div>
                      </div>
                  <?php
                  }
                  if(isset($_GET["error"]) && $_GET["error"] == md5("wrongpassword")) {
                      ?>
                      <div class="row mt">
                          <div class="col-lg-12">
                              <div class="form-panel">
                                  <center>Wrong Password.</center>
                              </div>
                          </div>
                      </div>
                  <?php
                  }
                  if(isset($_GET["action"]) && $_GET["action"] == md5("passwordchange")) {
                      ?>
                      <div class="row mt">
                          <div class="col-lg-12">
                              <div class="form-panel">
                                  <center>Password Changed Successfully.</center>
                              </div>
                          </div>
                      </div>
                  <?php
                  }

              } else {
              ?>
          	<!-- BASIC FORM ELELEMNTS -->
          	<div class="row mt">
          		<div class="col-lg-12">
					<div class="form-panel">
                  	  
                      <form class="form-horizontal style-form" method="post" action="submit.php">
                         <input type="hidden" name="action" value="<?=md5("changepass");?>">
						<input type="hidden" name="aadhaar_number" value="<?=$aadhaar_number;?>">
						<div class="form-group">
                              <label class="col-sm-2 control-label">Old Password:</label>
                              <div class="col-sm-8">
                                  <input type="password" class="form-control" name="oldpwd" >
                              </div>
                        </div>
						<div class="form-group">
                              <label class="col-sm-2 control-label">New Password:</label>
                              <div class="col-sm-8">
                                  <input type="password" class="form-control" name="newpwd" >
                              </div>
                        </div>
						<div class="form-group">
                              <label class="col-sm-2 control-label">Confirm New Password:</label>
                              <div class="col-sm-8">
                                  <input type="password" class="form-control" name="cnewpwd" >
                              </div>
                        </div>
						
						<div class="col-sm-10 text-center">
						<button type="submit" class="btn btn-theme">Change Password</button>
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
