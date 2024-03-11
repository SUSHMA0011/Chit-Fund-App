<?php
session_start();
if(!isset($_SESSION['id'],$_SESSION['bdate'],$_SESSION['btime'],$_SESSION['bamt']))
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
  <style>
  div.ex1 {
  background-color: lightblue;
  width: 1135px;
  height: 90px;
  overflow: auto;
}
  </style>
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
                  <li class="active">
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

 

  

  <!-- Start portfolio Area -->
  <div id="bid for amount" class="portfolio-area area-padding fix">
    <div class="container"><br>
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="section-headline text-center">
            <h2>bid for amount</h2>
          </div>
        </div>
      </div>
      <div class="row">
        <!-- Start Portfolio -page -->
         <div class="row">
    <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                    </div>
                    <div class="card-body">
					
                            <div class="row">
							
							 <div class="col-sm-12">
							  <div class="col-md-12 col-sm-12 col-xs-12">
										  <div class="pri_table_list active">
										  <div class="ex1">
										  <?php
										include('config.php');
										$sql2 = "select max(bamt),email,highest,bidder from bidding where pid='".$_SESSION['id']."' and bdate='".$_SESSION['bdate']."' and btime='".$_SESSION['btime']."'";
										$query_run2 = mysqli_query($con,$sql2);
										$count2=mysqli_num_rows($query_run2);

										if($count2>0)
										{
										while($row2=mysqli_fetch_array($query_run2))
										{
											$highest=$row2[0];
											$email=$row2[1];
											$confirm=$row2[2];
											$bidder=$row2[3];
										}
										}
										if($count2<=0||$highest=='')
										{
											$highest='NA';
											$email='NA';
										}
										if($confirm!='')
										{
											$highest=$confirm;
											$email=$bidder;
										}
											?>
											<span class="saleon">Highest Bid&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>
											<h3 style="font-family:Times New Roman"><?php echo $email; ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <?php echo $highest; ?>  /-</h3>
											
										
										</div>
										
										<div>
										<div style="height:200px;overflow:scroll">
										<center>
										
										<?php
										include('config.php');
										$sql3 = "select email, bamt,message from bidding where pid='".$_SESSION['id']."' and bdate='".$_SESSION['bdate']."' and btime='".$_SESSION['btime']."' order by id desc";
										$query_run3 = mysqli_query($con,$sql3);
										$count3=mysqli_num_rows($query_run3);

										if($count3>0)
										{
										while($row3=mysqli_fetch_array($query_run3))
										{
											$email1=$row3[0];
											$bamt1=$row3[1];
											$msg=$row3[2];
											?>
											<p style="background-color:gray; border-radius:10px; color:white;width:400px;padding:5px;"><?php echo $email1; ?>: <?php echo $bamt1; ?><?php echo $msg; ?></p>
											<?php
										}
										}
											?>
											<p style="background-color:gray; border-radius:10px; color:white;width:400px;padding:5px;">Bid Amount Starting: Rs. <?php echo $_SESSION['bamt']; ?></p>
										
										</center>
										</div>
										<form action="#" method="POST" role="form" class="contactForm">
												<div class="form-group">
													<input type="number" name="amt" class="form-control" id="name" placeholder="Your Bid Amount" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
													<div class="validation"></div>
												</div>
											<button type="submit" name="bid">Bid</button>
											</form>
											<?php
											if(isset($_POST['bid']))
											{
												$bidamt=$_POST['amt'];
												$sql4 = "insert into bidding (pid,email, bdate, btime, bamt) values('".$_SESSION['id']."','".$_SESSION['user']."','".$_SESSION['bdate']."','".$_SESSION['btime']."','".$bidamt."')";
												if(mysqli_query($con,$sql4))
												{
													echo "<script> location.href='bid.php'; </script>";
												}
											}
											?>
										</div>
									 </div>
                            </div>
                                
                                
                                
                    </div>
                    </div>
                </div>
            </div>
			</div>
			</div>
			</div>

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
