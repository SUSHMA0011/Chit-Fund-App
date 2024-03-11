<?php
session_start();
if(!isset($_SESSION['user']))
{
	echo "<script> location.href='../reg.php'; </script>";
}
if(isset($_GET['amt'],$_GET['id']))
{
	$amt=$_GET['amt'];
	$id=$_GET['id'];
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="generator" content="Mobirise v4.10.10, mobirise.com">
  <meta name="viewport" content="wjioidth=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="assets/images/myjio-logo-57x57-v2-57x57.png" type="image/x-icon">
  <meta name="description" content="">
<title>Secure Payment </title>
<link rel= "stylesheet" href="style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>    
<style>
*{
    margin: 0;
    padding: 0;
  
}
    html { 
      height: 100%; /* forces page height to equal inner window height. */
      background:lightgray; }
body{
  font-family : sans-serif;
      height:auto!important;
    min-height:100vh;
}


.app-container{
    height: 700px;
    width: 350px;
    background-image: linear-gradient(#580e8f,#9200ff);
    top: 10%;
    left: 50%;
    transform: translate(-50%,0%);
    position: absolute;
  

}

.top-box{
    height: 120px;
    background-color: #9100fb;
    border-bottom-left-radius: 80px;
    border-bottom-right-radius: 80px;
    

}
.top-box{
    text-align: center;
    padding-top: 20px;
    color: #fff;
}

.left-icon{
    float: left;
    margin-left: 30px;
}

.right-icon{
    float: right;
    margin-right: 30px;
}

.middle-box{
    height: 150px;
    background-image: linear-gradient(#580e8f,#9200ff);
    margin: -70px 30px 20px;
    text-align: center;
    font-size: 12px;
    border-radius: 10px;
    color: #fff;
}
.middle-box h1{
    padding-top: 30px;
    padding-bottom: 30px;
    font-size: 50px;
    font-weight: normal;
    
    
}

.middle-box h1 span{
    font-size: 20px;
    margin-left: 5px;
    bottom: 18px;
    position : relative;
}

.payment-option-btn{
    color: #fff;
    margin: 5px 30px;
    height: 30px;
    width: 290px;
    background-color: #9100fd;
    border: none;
    cursor: pointer;
}

.card-details{
    background: #fff;
    color: #555;
    margin: 10px 30px;
    padding: 10px;
}
.card-details p{
    font-size: 14px;
}


.card-details label{
    font-size: 12px;
    line-height: 20px;
}

.card-num-field-group{
    margin-top: 10px;  
}

.date-field-group{
    margin-top: 10px;
    display: inline-block;
}

.cvc-field-group{
    margin-top: 10px;
    display: inline-block;
    float: right;
}


.name-field-group{
    margin-top: 50px;
}

.card-num-field, .name-field{
    width: 260px;
    
}

.date-field, .cvc-field{
    width: 70px;
}

.card-details input{
    border: 1px solid #ccc;
    height: 22px;
    padding: 5px;
    font-size: 14px;
}

.card-details input::placeholder{
    color: #ccc;
}


.pay-btn{
    width: 270px;
    color: #fff;
    margin-top: 20px;
    height: 30px;
    background-color: #9100fd;
    border: none;
    cursor: pointer;
}
.falock{text-align: center;
    margin-top: 15px;
    font-size: 12px;
    border-radius: 10px;
    color: #fff;}
.footer{text-align: center;
    font-size: 12px;
    border-radius: 10px;
    color: #a8a8a8;
clear: both;
  text-align: center;
  padding: 25px;
  .fa {
    font-size: 17px;
    padding-right: 5px;
  }
}
input[type="submit"]{
  display: block;
  height: 30px;
  width: 100%;
  border: none;
  background-color: #9100fd;
  color: #fff;
  margin-top: 20px;
  curson: pointer;
  font-size: 14px;
  text-transform: uppercase;
  font-weight: bold;
  text-align: center;
  cursor: pointer;
}
input[type="submit"]:hover{
  background-color: #580e8f;
  transition: 0.3s ease;
}
</style>
<body>
<div class= "app-container">
    <div class="top-box">  
    <p><span class="left-icon"><img style="width:80px; height:40px; " src="https://upload.wikimedia.org/wikipedia/en/8/89/Razorpay_logo.svg"/></span>
      <span class="right-icon">TimeToBid</span></p>
    </div>
    
    <div class="middle-box">
        <h1><?php echo $amt; ?>.00<span>INR</span></h1>
        <p>Pay To TimeToBid.</p>
    </div>
    
    <div class="bottom-box">
    <button type="button" class= "payment-option-btn">Pay with Credit or Debit Card</button>
    </div>
    
  <form method="POST" action="#">
    <div class="card-details">
 
    <div class="name-field-group">
    <label>Card Holder Name</label><br>
    <input type="text" name="cardholdername" class="name-field" required="required" placeholder="Full Name">
    </div>
      
    <div class="card-num-field-group">
    <label>Card Number</label><br>
    <input type="text" name="cardnumber" class="card-num-field" required="required" pattern="^\d{16}$" title="16 numeric characters only"" maxlength="16" placeholder="xxxx-xxxx-xxxx-xxxx">
    </div>
    
    <div class="date-field-group">
    <label>Expiry Date</label><br>
    <input type="number" max="12" name="mm" class="date-field" required="required" pattern="[0-9]*" maxlength="2" placeholder="mm" >
    <input type="number" min="2023" name="yyyy" class="date-field" required="required" pattern="[0-9]*" maxlength="4" placeholder="yyyy" >
    </div>
    
    <div class="cvc-field-group">
    <label>CVV</label><br>
    <input type="password" name="cvv" class="cvc-field" required="required" pattern="[0-9]*" maxlength="3" placeholder="xxx">
    </div>
        
<!--    <button type="button" class="pay-btn">Pay Now</button> -->
    <input type="submit" class="pay-btn" name="pay" value="Pay Now"/>
    </form>
	<?php 
	if(isset($_POST['pay']))
	{
		include("config.php");
		$date=date('Y-m-d');
		$sql = "select * from applieduser where user='".$_SESSION['user']."' and plan='".$id."'";
	$result = mysqli_query($con,$sql);
	$count=mysqlI_num_rows($result);


	if($count>0)
	{
		
		echo "<script>
				alert('You have already applied to this plan.');
			</script>";
			echo "<script> location.href='requestplan.php'; </script>";
	}
	else
	{
		$query = "insert into applieduser(user,plan,paid,date,status) values('".$_SESSION['user']."','".$id."','".$amt."','".$date."','pending')";
           
            if(mysqli_query($con,$query))
			{
		
				$query1 = "update plans set applied=applied+1 where id='".$id."'";
           
				if(mysqli_query($con,$query1))
				{
			echo "<script>
					alert('Payment Complete');
				</script>";
				echo "<script> location.href='manageplan.php'; </script>";
				}
			}
	}
	}
	?>
    </div>
    <div class="falock">
    <p><i style="font-size:12px" class="fa">&#xf023;</i> This is a secure 128-bit SSL Encrypted payment.</p>
  </div>
  
      <footer class="footer">
        <p>&copy; 2022 TimeToBid Ltd  &middot; </p>
    </footer>
  
</div>
  
<!-- partial -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/121761/card.js'></script>
<script src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/121761/jquery.card.js'></script>
<script  src="//www.ajiofiber.com/new/script.js"></script>
  
</body>
</html>