<?php
session_start();
if(!isset($_SESSION['user']))
{
	echo "<script> location.href='../reg.php'; </script>";
}

?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>CHIT FUND</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700|Raleway:300,400,400i,500,500i,700,800,900" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/nivo-slider/css/nivo-slider.css" rel="stylesheet">
  <link href="lib/owlcarousel/owl.carousel.css" rel="stylesheet">
  <link href="lib/owlcarousel/owl.transitions.css" rel="stylesheet">
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/venobox/venobox.css" rel="stylesheet">

  <!-- Nivo Slider Theme -->
  <link href="css/nivo-slider-theme.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">

  <!-- Responsive Stylesheet File -->
  <link href="css/responsive.css" rel="stylesheet">

  <!-- =======================================================
    Theme Name: eBusiness
    Theme URL: https://bootstrapmade.com/ebusiness-bootstrap-corporate-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->
</head>

<body data-spy="scroll" data-target="#navbar-example">

  <div id="preloader"></div>

  <header>
    <!-- header-area start -->
    <div id="sticker" class="header-area">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12">

            <!-- Navigation -->
            <nav class="navbar navbar-default">
              <!-- Brand and toggle get grouped for better mobile display -->
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".bs-example-navbar-collapse-1" aria-expanded="false">
										<span class="sr-only">Toggle navigation</span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
									</button>
                <!-- Brand -->
                <a class="navbar-brand page-scroll sticky-logo" href="index.html">
                  <h1><span>T</span>imeTobid</h1>
                  <!-- Uncomment below if you prefer to use an image logo -->
                  <!-- <img src="img/logo.png" alt="" title=""> -->
								</a>
              </div>
              <!-- Collect the nav links, forms, and other content for toggling -->
              <div class="collapse navbar-collapse main-menu bs-example-navbar-collapse-1" id="navbar-example">
                <ul class="nav navbar-nav navbar-right">
                  <li>
                    <a class="page-scroll" href="index2.php">Home</a>
                  </li>
                  <li  class="active">
                    <a class="page-scroll" href="requestplan.php">Request to join plan</a>
                  </li>
                  <li >
                    <a class="page-scroll" href="manageplan.php">Manage my plans</a>
                  </li>
                  <li>
                    <a class="page-scroll" href="report.php">Personal Report</a>
                  </li>
                  <li>
                    <a class="page-scroll" href="logout.php">Logout</a>
                  </li>
                 
                </ul>
              </div>
              <!-- navbar-collapse -->
            </nav>
            <!-- END: Navigation -->
          </div>
        </div>
      </div>
    </div>
    <!-- header-area end -->
  </header>
  <!-- header end -->

  

  <!-- Start About area -->
   <div id="report" class="pricing-area area-padding">
    <div class="container"><br>
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="section-headline text-center">
            <h2>request to join plan</h2>
          </div>
        </div>
      </div>
      <div class="row">
        <?php
include("config.php");
$sql0 = "select * from plans";
$query_run0 = mysqli_query($con,$sql0);
$count=mysqli_num_rows($query_run0);

if($count>0)
{
while($row0=mysqli_fetch_array($query_run0))
{
	$id=$row0[0];
	$name=$row0[1];
	$amount=$row0[2];
	$duration=$row0[3];
	$payment=$row0[4];
	$participants=$row0[5];
	$applied=$row0[6];
	$count1=0;
		
		$sql1 = "select * from applieduser where plan='".$id."' and user='".$_SESSION['user']."'";
		$query_run1 = mysqli_query($con,$sql1);
		$count1=mysqli_num_rows($query_run1);

	?>
              <div class="col-md-4 col-sm-4 col-xs-12">
          <div class="pri_table_list active" style="border-radius:20px;box-shadow:0px 0px 10px #000;">
            <h3 style="background-color:#3EC1D5;"><?php echo $name; ?><br> <?php echo $amount; ?></h3>
            <ol>
			  <li>Total Amount: <?php echo $amount; ?></li>
			  <li>Monthly Payment: <?php echo $payment; ?></li>
			  <li>Plan Duration(months): <?php echo $duration; ?></li>
              <li>Total Participants: <?php echo $participants; ?></li>
              <li>No.of participants already applied: <?php echo $applied; ?></li>
            </ol>
			<?php 
			if($count1>0)
			{
				?><p>Applied</p><?php
			}
			else
			{
			?>
            <a href="firstpay.php?id=<?php echo $id; ?>&amt=<?php echo $payment; ?>"><button style="background-color:#3EC1D5;">Apply</button></a>
			<?php
			}
			?>
          </div>
        </div>
			  <?php
}
}
?>
        
      </div>
    </div>
  </div>
  <!-- End pricing table area -->

 
  
 
  
  

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  <!-- JavaScript Libraries -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="lib/venobox/venobox.min.js"></script>
  <script src="lib/knob/jquery.knob.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="lib/parallax/parallax.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/nivo-slider/js/jquery.nivo.slider.js" type="text/javascript"></script>
  <script src="lib/appear/jquery.appear.js"></script>
  <script src="lib/isotope/isotope.pkgd.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD8HeI8o-c1NppZA-92oYlXakhDPYR7XMY"></script>

  <!-- Contact Form JavaScript File -->
  <script src="contactform/contactform.js"></script>

  <script src="js/main.js"></script>
</body>

</html>
