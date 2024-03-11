<?php
session_start();
date_default_timezone_set('Asia/Kolkata');
if(!isset($_SESSION['user']))
{
	echo "<script> location.href='../reg.php'; </script>";
}
if(isset($_GET['id'],$_GET['date']))
{
	$_SESSION['date']=$_GET['date'];
	$_SESSION['id']=$_GET['id'];
}
if(!isset($_SESSION['id'],$_SESSION['date']))
{
	echo "<script> location.href='manageplan.php'; </script>";
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
                <a class="navbar-brand page-scroll sticky-logo" href="manageplan.php">
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
                  <li class="active">
                    <a class="page-scroll" href="manageplan.php">Manage my plans</a>
                  </li>
                  <li>
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
  <!-- start pricing area -->
  <div id="requesttojoinplan" class="about-area area-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="section-headline text-center">
		  <a href="manageplan.php"></a>
		  
            <h2>Plan Details</h2>
          </div>
        </div>
      </div>
      <div class="row">
	            <?php
include("config.php");
$sql0 = "select * from plans where id='".$_SESSION['id']."'";
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
	$start=$row0[7];
	$bdate=$row0[8];
	$btime=$row0[9];
	$bamt=$row0[10];
	$_SESSION['bdate']=$bdate;
	$_SESSION['btime']=$btime;
	$_SESSION['bamt']=$bamt;
}
	?>
        <!-- single-well start-->
		<div class="row">
        <div class="col-md-8 col-sm-8 col-xs-12">
         <h3><?php echo $name; ?></h3>
         <h5>Plan Amount: <?php echo $amount; ?></h5>
		 <p>Start Date:<?php echo $start; ?></p> 
		 
		 <br><br>
		  <div class="pri_table_list active">
		  <p>Bidding Date:<?php echo $bdate; ?></p>
		  <p>Bidding Time:<?php echo $btime; ?></p>
		  <p>Bidding Amount starts from:Rs.<?php echo $bamt; ?></p>
			<?php
			$sql2 = "select status from bidrequest where pid='".$_SESSION['id']."' and email='".$_SESSION['user']."' and bdate='".$bdate."' and btime='".$btime."'";
			$query_run2 = mysqli_query($con,$sql2);
			$count2=mysqli_num_rows($query_run2);
			$now=date('Y-m-d');
			if($count2>0)
			{
			while($row2=mysqli_fetch_array($query_run2))
			{
				$status=$row2[0];
			}
			?>
			<p>Bidding Request Status: :<?php echo $status; ?></</p>
			
			<?php
			if($status=='approved')
			{
				$now=date('Y-m-d');
				$nowtime=date('H:i:s');
				if($now>$bdate)
				{
						?>
						<br><a href="bid.php"><button>Bid Now</button></a>
						<?php
				}
				else if($now==$bdate)
				{
					if(strtotime($nowtime)>=strtotime($btime))
					{
						?>
						<br><a href="bid.php"><button>Bid Now</button></a>
						<?php
					}
				}
			}
			}
			else
			{
				
			$sql3 = "select max(highest) from bidding where bdate='".$bdate."' and pid='".$id."'";
			$query_run3 = mysqli_query($con,$sql3);
			$count3=mysqli_num_rows($query_run3);
			if($count3>0)
			{
			while($row3=mysqli_fetch_array($query_run3))
			{
				$highest=$row3[0];
			}
			?>
			<p>Highest Bidding: :<?php echo $highest; ?></p>
			<?php
			}
				if($now>$bdate)
				{
						?>
						<br><p>Bidding Over</p>
						<?php
				}
				else
				{
			?>
		 <a href="plandetails.php?bid=1"><button>Request To Bid</button></a>
		 <?php
				}
			}
			?>
         </div>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-12">
         <h3>Plan Details</h3>
		 <p style="font-weight:900;">Join Date: <?php echo $_SESSION['date']; ?>
		 <br>Monthly Payment: Rs.<?php echo $payment; ?>
		 <br>Total Participants: <?php echo $participants; ?> members
		 <br>Total Duration: <?php echo $duration; ?> Months</p>
		 <br>
		 <?php
		 $month=1;
		 $n=0;
		 
		 ?>
		 <p>Month 1:Paid (<?php echo $_SESSION['date']; ?>)</P>
		 <?php
		 while($month<$duration)
		 {
			 $month+=1;
			 $n+=30;
			 $sql1 = "select date from payment where pid='".$_SESSION['id']."' and email='".$_SESSION['user']."' and month='".$month."'";
$query_run1 = mysqli_query($con,$sql1);
$count1=mysqli_num_rows($query_run1);

if($count1>0)
{
while($row0=mysqli_fetch_array($query_run1))
{
	$date=$row0[0];
			 ?>
			 
			 Month <?php echo $month; ?>:Paid (<?php echo $date; ?>)<br>
			<?php 
}
}
else
{
	$ndate=date('Y-m-d',strtotime($start. '+'.$n. 'days'));
	$today=date('Y-m-d');
			?>
			 Month <?php echo $month; ?>(<?php echo $ndate ?>):
			 <?php 
			 if($ndate<=$today) 
			 {
			?>
			<a href="pay.php?mon=<?php echo $month; ?>&pay=<?php echo $payment; ?>"><button style="background-color:#3EC1D5;color:white; border-radius:20px;width:100px; height:40px;border:none;">Pay Now</button></a><br>
			<?php 
			} 
			else 
			{ ?>
				Payment link NA
			<?php 
			} ?><br>
			 <?php
}
		 }
		 ?>
		 
		 </p>
        </div>
        
      </div>
	  <?php 
}
?>
    </div>
  </div>
		<?php
		if(isset($_GET['bid']))
		{
			 $sql3 = "insert into bidrequest (pid, email, bdate, btime, status) values('".$_SESSION['id']."','".$_SESSION['user']."','".$bdate."','".$btime."','pending')";
			if(mysqli_query($con,$sql3))
			{
				echo "<script> location.href='plandetails.php'; </script>";
			}
		}
		?>	  

        <!-- single-well end-->
        
        <!-- End col-->
      </div>
    </div>
  </div>
  <!-- End About area -->

 
 
  <!-- Start Footer bottom Area -->
  
          <!-- end single footer -->

    <div class="footer-area-bottom">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="copyright text-center">
              <p>
                &copy; Copyright <strong>Timetobid</strong>. All Rights Reserved
              </p>
            </div>
            <div class="credits">
              <!--
                All the links in the footer should remain intact.
                You can delete the links only if you purchased the pro version.
                Licensing information: https://bootstrapmade.com/license/
                Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=eBusiness
              -->
              Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
              Re-distributed by <a href="https://themewagon.com/" target="_blank">Themewagon</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>

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
