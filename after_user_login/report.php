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
                  <li>
                    <a class="page-scroll" href="requestplan.php">Request to join plan</a>
                  </li>
                  <li>
                    <a class="page-scroll" href="manageplan.php">Manage my plans</a>
                  </li>
                  <li class="active">
                    <a class="page-scroll" href="report.php">personal Report</a>
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
  
  
  <div id="requesttojoinplan" class="about-area area-padding">
    <div class="container"><br>
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="section-headline text-center">
		  <a href="manageplan.php"></a>
		  
            <h2>Personal Report</h2>
          </div>
        </div>
      </div>
      <div class="row">
        <!-- single-well start-->
		<div class="row">
        
        <div class="col-md-12 col-sm-12 col-xs-12">
		
          <div class="pri_table_list active">
            <h3> User Personal Details<br/> <span></span></h3>
<?php
include("config.php");
$sql0 = "select * from user where email='".$_SESSION['user']."'";
$query_run0 = mysqli_query($con,$sql0);
$count=mysqli_num_rows($query_run0);

if($count>0)
{
while($row0=mysqli_fetch_array($query_run0))
{
	$id=$row0[0];
	$name=$row0[1];
	$email=$row0[2];
	$gender=$row0[4];
	$phone=$row0[5];
	$address=$row0[6];
	$aadhar=$row0[7];
	$bank=$row0[8];
	$accholder=$row0[9];
	$accno=$row0[10];
	$ifsc=$row0[11];
}
}
	?>
			<form method="POST" action="#">
			<input type="text" name="name" class="form-control" value="<?php echo $name; ?>" readonly><br>
			<input type="email" name="email" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" title="letters only"  value="<?php echo $email; ?>" readonly><br>
			<input type="text" name="phone" class="form-control" pattern="^\d{10}$" title="10 numeric characters only"<?php echo $phone; ?>" placeholder="Phone no"><br>
			<input type="text" name="address" class="form-control" value="<?php echo $address; ?>"  placeholder="Address"><br>
			<input type="text" name="gender" class="form-control" value="<?php echo $gender; ?>" readonly><br>
			<input type="text" name="aadhar" class="form-control" pattern="^\d{12}$" title="12 numeric characters only" value="<?php echo $aadhar; ?>"  placeholder="Aadhar"><br>
			<input type="submit" name="update" class="form-control btn btn-success" value="update">
			</form>
<?php
if(isset($_POST['update']))
{
	$phone=$_POST['phone'];
	$address=$_POST['address'];
	$aadhar=$_POST['aadhar'];
	include("config.php");
		$query = "update user set phone='".$phone."', address='".$address."', aadhar='".$aadhar."' where email='".$_SESSION['user']."'";
           
            if(mysqli_query($con,$query))
			{
			echo "<script>
					alert('profile Updated');
				</script>";
				echo "<script> location.href='report.php'; </script>";
				
			}
}
?>         

		  </div>
        </div>
      </div><br>
	  <div class="row">
        
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="pri_table_list active">
            <h3> Bank Details<br/> <span></span></h3>
            <form method="POST" action="#">
			<input type="text" name="bname" class="form-control" value="<?php echo $bank; ?>" placeholder="Bank"><br>
			<input type="text" name="accholder" class="form-control" value="<?php echo $accholder; ?>" placeholder="Account Holder"><br>
			<input type="text" name="accno" class="form-control" pattern="^\d{16}$" title="16 numeric characters only" value="<?php echo $accno; ?>" placeholder="Account no"><br>
			<input type="text" name="ifsc" class="form-control" pattern="^[A-Z]{4}0[A-Z0-9]{6}$" title="IFSC code only" value="<?php echo $ifsc; ?>"  placeholder="IFSC"><br>
			<input type="submit" name="updateank" class="form-control btn btn-success" value="update">
			</form>
<?php
if(isset($_POST['updateank']))
{
	$bname=$_POST['bname'];
	$accholder=$_POST['accholder'];
	$accno=$_POST['accno'];
	$ifsc=$_POST['ifsc'];
	include("config.php");
		$query = "update user set bank='".$bname."', accholder='".$accholder."', accno='".$accno."', ifsc='".$ifsc."' where email='".$_SESSION['user']."'";
           
            if(mysqli_query($con,$query))
			{
			echo "<script>
					alert('Bank info Updated');
				</script>";
				echo "<script> location.href='report.php'; </script>";
				
			}
}
?>         
          </div>
        </div>
      </div><br>
	  <div class="row">
        <?php
include("config.php");
$sql1 = "select * from applieduser where user='".$_SESSION['user']."' and status='approved'";
$query_run1 = mysqli_query($con,$sql1);
$count1=mysqli_num_rows($query_run1);

	?>
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="pri_table_list active">
            <h3> Invested plan<br/> <span></span></h3>
            <ol>
              <li >Total invested plan 
			  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $count1; ?></li>
			 
			  
   
      
            </ol>
          </div>
        </div>
      </div>
    </div>
  </div>
        

        <!-- single-well end-->
        
        <!-- End col-->
      </div>
  
  <!-- start pricing area -->
  
			

        <!-- End col-->
      </div>
    </div>
  
  <!-- End About area -->

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
