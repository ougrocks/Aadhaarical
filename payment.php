<?php
session_start();
include_once "includes/config.php";
include_once "includes/functions.php";
if(isset($_SESSION["aadhaar"])) {
include "header.php";
include "sidebar.php";
$aadhaar_number = $_SESSION["aadhaar"];

?> <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i>Make Payment</h3>
          	
          	<!-- BASIC FORM ELELEMNTS -->
          	<div class="row mt">
          		<div class="col-lg-12">
					<div class="form-panel" style="text-align:center;">
                  	  
                      
		<form action="/charge" method="POST">
			  <script
				src="https://checkout.stripe.com/checkout.js" class="stripe-button"
				data-key="pk_test_6pRNASCoBOKtIshFeQd4XMUh"
				data-image="/img/documentation/checkout/marketplace.png"
				data-name="Aadhaaric Licence"
				data-description="Pay for your licence"
				data-amount="2000">
			  </script>




			</form>		
					  
					  
					</div>
					
					
					
					
                          
          	</div><!-- /row -->
          	
          	
		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

    <?php
    include "footer.php";
} else {
    echo "Access Denied";
}
?>
