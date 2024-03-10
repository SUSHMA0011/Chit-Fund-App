<?php 
session_start();
if(!isset($_SESSION['admin']))
{
	echo "<script> location.href='index.php'; </script>";
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
	$start=$row0[7];
	$bdate=$row0[8];
	$btime=$row0[9];
	$bamt=$row0[10];
	?>
              <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title"><?php echo $name; ?></h4>
                    <ul class="list-star">
                      <li>Plan Amount: <?php echo $amount; ?></li>
                      <li>Plan Duration: <?php echo $duration; ?></li>
                      <li>Monthly Payment: <?php echo $payment; ?></li>
                      <li>Total Participants: <?php echo $participants; ?></li>
                      <li>Total Participants Available: <?php echo $applied; ?></li>
                      <li>Start Date: <?php echo $start; ?></li>
                    </ul>
					<form method="post" action="#">
					<input type="text" name="id" value="<?php echo $id; ?>" hidden="true" >
					Bid Date: <input type="date" name="bdate" value="<?php echo $bdate; ?>"><br>
					Bid Time: <input type="time" name="btime" value="<?php echo $btime; ?>"><br>
					Bid Amount: <input type="numer" name="bamt" value="<?php echo $bamt; ?>" placeholder="Bidding Amount"><br><br>
					<button type="submit" name="update" class="btn btn-primary btn-rounded btn-fw"> Update </button>
					</form>
					<?php 
					if(isset($_POST['update']))
					{
						$bdaten=$_POST['bdate'];
						$btimen=$_POST['btime'];
						$bamtn=$_POST['bamt'];			
						$idn=$_POST['id'];			
						include("config.php");
						$sql1 = "update plans set bdate='".$bdaten."', btime='".$btimen."', bamt='".$bamtn."' where id='".$idn."'";
						if(mysqli_query($con,$sql1))
						{
							echo "<script> location.href='schedule.php'; </script>";
						}
					}
					?>
                  </div>
                </div>
              </div>
			  <?php
}
}
?>
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