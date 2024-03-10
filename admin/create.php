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
                    <p class="m-0">NEW PLAN</p>
                  </a>
                </div>
              </div>
            </div>
            <!-- first row starts here -->
            <div class="row">
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Enter Plan Details</h4>
                    <form class="forms-sample" method="POST" action="#">
                      <div class="form-group">
                        <label for="exampleInputName1">Plan Name</label>
                        <input type="text" class="form-control" id="exampleInputName1" name="plan" placeholder="Plan Name" />
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">Plan Amount</label>
                        <input type="number" class="form-control" id="exampleInputEmail3" name="amount" placeholder="Plan Amount" />
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">Plan Duration in Months</label>
                        <input type="number" class="form-control" id="exampleInputEmail3" name="duration" placeholder="Plan Duration" />
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">Monthly Payment</label>
                        <input type="number" class="form-control" id="exampleInputEmail3" name="payment" placeholder="Monthly Payment" />
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">Total Participants</label>
                        <input type="number" class="form-control" id="exampleInputEmail3" name="participants" placeholder="Total Participants" />
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">Start Date</label>
                        <input type="date" class="form-control" id="exampleInputEmail3" name="start" placeholder="start Date" />
                      </div>
                      <button type="submit" class="btn btn-primary mr-2" name="submit"> Submit </button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <!-- chart row starts here -->
            <?php
if(isset($_POST['submit']))
{
	error_reporting(1);
	include("config.php");
	
	$plan=$_POST['plan'];

	$sql = "select * from plans where plan='$plan'";
	$result = mysqli_query($con,$sql);
	$count=mysqlI_num_rows($result);


	if($count>0)
	{
		
		echo "<script>
				alert('There is an existing Plan with this Name.');
			</script>";
			echo "<script> location.href='create.php'; </script>";
	}
	else
	{
		$amount=$_POST['amount'];
		$payment=$_POST['payment'];
		$duration=$_POST['duration'];
		$participants=$_POST['participants'];
		$start=$_POST['start'];
		
		
   // success :(

		

		$query = "insert into plans(plan,amount,duration,payment,participants,start) values('".$plan."','".$amount."','".$duration."','".$payment."','".$participants."','".$start."')";
           
            mysqli_query($con,$query) or die(mysqli_error($con));
		
		
		echo "<script>
				alert('Plan Created.');
			</script>";
			echo "<script> location.href='create.php'; </script>";
	}
}
?>
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