<?php
session_start();
if(isset($_SESSION["aadhaar"])) {
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
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/js/bootstrap-datepicker/css/datepicker.css" />
    <link rel="stylesheet" type="text/css" href="assets/js/bootstrap-daterangepicker/daterangepicker.css" />
	

		
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
	
	.content p{
	margin: 18px 0px 45px 0px;
}
.content li,p{
	font-family: "Century Gothic";
	font-size:2em;
	color:#666;
	text-align:center;
}
.content p span,.logo h1 a{
	color:#e54040;
}
.content li{
	text-align:center;
	padding:115px 0px 0px 0px;
}
.content a{
	color:#fff;
	font-family: "Century Gothic";
	background: #666666; /* Old browsers */
	background: -moz-linear-gradient(top,  #666666 0%, #666666 100%); /* FF3.6+ */
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#666666), color-stop(100%,#666666)); /* Chrome,Safari4+ */
	background: -webkit-linear-gradient(top,  #666666 0%,#666666 100%); /* Chrome10+,Safari5.1+ */
	background: -o-linear-gradient(top,  #666666 0%,#666666 100%); /* Opera 11.10+ */
	background: -ms-linear-gradient(top,  #666666 0%,#666666 100%); /* IE10+ */
	background: linear-gradient(to bottom,  #666666 0%,#666666 100%); /* W3C */
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#666666', endColorstr='#666666',GradientType=0 ); /* IE6-9 */
	padding: 15px 20px;
	border-radius: 1em;
}
.content a:hover{
	color:#e54040;
}



</style>
  </head>

  <body>

  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
      <header class="header black-bg">
              
            <!--logo start-->
            <a href="index.php" style="margin-left:37%"  class="logo"><b> Learning Driver Licence Test</b></a>
            <!--logo end-->
            
            <div class="top-menu" style="margin:1em">
            	<ul class="nav pull-right top-menu">
                   
            	</ul>
            </div>
        </header>
     
      <!--main content start-->
	  <center>
      <section id="main-content">
          <section class="wrapper">
          	
          	
          	<!-- BASIC FORM ELELEMNTS -->
          	<div class="row mt" >
          		<div class="col-lg-12">
                  <div class="form-panel" style="margin:-2.5%" >
                  	  
					  <ol class="content" style="margin:2% 0 0 20%">
					  <li><p> Learning Driver Licence Test contains 10 questions to be solved in 10 minutes.</p></li>
					 <li> <p> Questions are based on General Traffic Rules & Traffic etiquettes</p></li>
					  <li> <p> You need minimum 60% to pass this test.</p></li>
					  <li>  <p>Be careful, nd save your responses before time runs out.</p></li>
					  <li><p> Page will be redirected, as soon as the time runs out.</p></li>
					 <li>  <p>If u go back in between, test will be declared unqualified.</p></li>
					  <li> <p> Best of Luck..!!</p></li>
					  
					 </ol>
					
			<a href="home.php" class="btn btn-primary" style="margin:25px 0 0 23%" >Proceed to Learning Driver Licence Test</a>
                     
                  </div>
          		</div><!-- col-lg-12-->      	
          	</div><!-- /row -->
          	
          	
          	
          	
          	
		</section><! --/wrapper -->
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

      $(function(){
          $('select.styled').customSelect();
      });

	
  
</script>
  </body>
</html>
<?php }
else {
    echo "Access Denied";
}
?>