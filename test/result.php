<?php
session_start();
if(isset($_SESSION["aadhaar"])) {
    $aadhaar_number = $_SESSION["aadhaar"];
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
}


.content p{
	margin: 18px 0px 45px 0px;
}
.content p{
	font-family: "Century Gothic";
	font-size:2em;
	color:#666;
	text-align:center;
}
.content p span,.logo h1 a{
	color:#e54040;
}
.content{
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
                  <div class="form-panel" style="margin:-5%" >
                  	  
					  
					<?php
if(empty($_POST)=== FALSE)
        {
			require 'config.php';
			
			$marks=0;
			for($i=2;$i<=11;$i++)
			{	
			if(!empty($_POST['option'.$i]))
			{
				$id = $_POST['ques'.$i];
				$str = "SELECT ans FROM test_ques where id = '$id'";
				$query  =   $db->query($str);
				while($row = $query->fetch(PDO::FETCH_ASSOC)){
				if($row['ans'] === $_POST['option'.$i])
				{
					$marks++;
				}
				}
				}
			}
			
			
			if($marks >=6)
			{
		?>
		
		<div class="content">
		<img src="img/score.png" title="score" /><p>
			<p><span><label>C</label>ongratulations.....</span>You have cleared Learning Driver Licence Test.</p>
			<p>Your All new Learning Licence will be posted to you
			<br>On the Permanent Address mentioned in your Aadhar Card</p>
		<br>
		
		
		</div>
		<div class="content" style="position: absolute;left: 525px;top: -11px;">
		<p><span>Your score is:</span><?=$marks;?></p>
		</div>
		
		<?php
                require_once '../includes/config.php';
                require_once '../includes/functions.php';
                $check_query = "SELECT * FROM flags WHERE aadhaar_no = '$aadhaar_number'";
                $check_result = mysql_query($check_query);
                if(mysql_num_rows($check_result) == 1) {
                    $check_flag_forms_row = mysql_fetch_assoc($check_result);
                    if($check_flag_forms_row["flag_form1"] == 1 && $check_flag_forms_row["flag_form2"] == 1) {
                        $update_query == "UPDATE flags SET result = $marks WHERE aadhaar_no = '$aadhaar_number'";
                        echo "HELLOO";
                        mysql_query($update_query);
                    }
                    else {
                        echo "<center>Fill Form 1 and 2 First</center>";
                    }
                }
		}
		else
		{
		?>
		
		<div class="content">
		<img src="img/score.png" title="score" /><p>
			<p><span><label>A</label>lass.....</span>You failed to clear Learning Driver Licence Test.</p>
		<br>
		
		
		</div>
		<div class="content" style="position: absolute;left: 525px;top: -25px;">
		<p><span>Your score is:</span><?=$marks;?></p>
		</div>
		<?php
            require_once '../includes/config.php';
            require_once '../includes/functions.php';
            $check_query = "SELECT * FROM flags WHERE aadhaar_no = '$aadhaar_number'";
            $check_result = mysql_query($check_query);
            if(mysql_num_rows($check_result) == 1) {
                $check_flag_forms_row = mysql_fetch_assoc($check_result);
                if($check_flag_forms_row["flag_form1"] == 1 && $check_flag_forms_row["flag_form2"] == 1) {
                    $update_query = "UPDATE flags SET result = $marks WHERE aadhaar_no = '$aadhaar_number'";
                    mysql_query($update_query);
                }
                else {
                    echo "<center>Fill Form 1 and 2 First</center>";
                }
            }
		}
        }
?>			<div style="margin:-5% 0 0 36%">
			<a href="../home.php" class="btn btn-primary" >Go to Dashboard</a>
				<a href="../logout.php" class="btn btn-danger" >Logout</a>	  
                    </div> 
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