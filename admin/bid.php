<?php 
session_start();
if(!isset($_SESSION['admin']))
{
	echo "<script> location.href='index.php'; </script>";
}
if(isset($_GET['id'],$_GET['bdate'],$_GET['btime'],$_GET['bamt']))
{
	$_SESSION['pid']=$_GET['id'];
	$_SESSION['bdate']=$_GET['bdate'];
	$_SESSION['btime']=$_GET['btime'];
	$_SESSION['bamt']=$_GET['bamt'];
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>chit Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="assets/vendors/jquery-bar-rating/css-stars.css" />
    <link rel="stylesheet" href="assets/vendors/font-awesome/css/font-awesome.min.css" />
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/demo_1/style.css" />
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.png" />
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      <?php include('nav.php'); ?>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
          <div class="navbar-menu-wrapper d-flex align-items-stretch">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
              <span class="mdi mdi-chevron-double-left"></span>
            </button>
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
              <a class="navbar-brand brand-logo-mini" href="index.html"><img src="assets/images/logo-mini.svg" alt="logo" /></a>
            </div>
            <ul class="navbar-nav">
              
            </ul>
            <ul class="navbar-nav navbar-nav-right">
             
              
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
              <span class="mdi mdi-menu"></span>
            </button>
          </div>
        </nav>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper pb-0">
            <div class="page-header flex-wrap">
              <div class="header-right d-flex flex-wrap mt-2 mt-sm-0">
                <div class="d-flex align-items-center">
                  
                  <a class="pl-3 mr-4" href="#">
                    <p class="m-0">ALL PLANS</p>
                  </a>
                </div>
              </div>
            </div>
            <!-- first row starts here -->
            <div class="row">
			<?php
										include('config.php');
										$sql2 = "select max(bamt),email,highest,bidder from bidding where pid='".$_SESSION['pid']."' and bdate='".$_SESSION['bdate']."' and btime='".$_SESSION['btime']."'";
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
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Highest Bid: <?php echo $highest; ?>&nbsp;&nbsp;&nbsp;Bidder: <?php echo $email; ?></h4>
                    <div style="height:200px;overflow:scroll">
					<center>
										
										<?php
										include('config.php');
										$sql3 = "select email, bamt, message from bidding where pid='".$_SESSION['pid']."' and bdate='".$_SESSION['bdate']."' and btime='".$_SESSION['btime']."' order by id desc";
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
											<p style="background-color:gray; border-radius:10px; color:white;width:400px;padding:5px;"><?php echo $email1; ?>: <?php if ($email1==$_SESSION['admin']){ echo $bamt1; } else {}  ?><?php echo $msg; ?></p>
											<?php
										}
										}
											?>
										<p style="background-color:gray; border-radius:10px; color:white;width:400px;padding:5px;">Bid Amount Starting: Rs. <?php echo $_SESSION['bamt']; ?></p>
										</center>
					</div>
											<form action="#" method="POST" role="form" class="contactForm">
												<div class="form-group">
													<input type="text" name="message" class="form-control" placeholder="Your message" required />
													<div class="validation"></div>
												</div>
											<button type="submit" name="send" class="btn btn-primary btn-rounded btn-fw">send</button>
											</form>
											<?php
											if(isset($_POST['send']))
											{
												$message=$_POST['message'];
												$sql4 = "insert into bidding (pid,email, bdate, btime, message) values('".$_SESSION['pid']."','Admin','".$_SESSION['bdate']."','".$_SESSION['btime']."','".$message."')";
												if(mysqli_query($con,$sql4))
												{
													echo "<script> location.href='bid.php'; </script>";
												}
											}
											?>
											<br><br>
					<a href="bid.php?confirm=1"><button class="btn btn-primary btn-rounded btn-fw">Confirm</button></a>
					<?php
					if(isset($_GET['confirm']))
					{
						$sql4 = "update bidding set highest='".$highest."', bidder='".$email."' where pid='".$_SESSION['pid']."' and bdate='".$_SESSION['bdate']."' and btime='".$_SESSION['btime']."'";
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
            <!-- chart row starts here -->
            
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © TimeToBid 2022</span>
            </div>

            <div>
              
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="assets/vendors/jquery-bar-rating/jquery.barrating.min.js"></script>
    <script src="assets/vendors/chart.js/Chart.min.js"></script>
    <script src="assets/vendors/flot/jquery.flot.js"></script>
    <script src="assets/vendors/flot/jquery.flot.resize.js"></script>
    <script src="assets/vendors/flot/jquery.flot.categories.js"></script>
    <script src="assets/vendors/flot/jquery.flot.fillbetween.js"></script>
    <script src="assets/vendors/flot/jquery.flot.stack.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <script src="assets/js/settings.js"></script>
    <script src="assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="assets/js/dashboard.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>