<html>
<title>LOGIN/REGISTER</title>
<head>
<style>
* {
  margin: 0;
  padding: 0;
  font-family: "Poppins", sans-serif;
}

.hero {
  height: 100vh;
  width: 100%;
  background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)),
    url(https://i.postimg.cc/QCCpjgRN/vincent-chan-04-Kmj0pru5-M-unsplash.jpg);
  background-position: center;
  background-size: cover;
  background-repeat: no-repeat;
  position: absolute;
}

.form-box {
  width: 380px;
  height: 600px;
  position: relative;
  margin: 6% auto;
  background: #fff;
  padding: 5px;
  overflow: hidden;
}

.button-box {
  width: 220px;
  margin: 35px auto;
  position: relative;
  box-shadow: 0 0 20px 9px #4a3b54;
  border-radius: 30px;
}

.toggle-btn {
  padding: 10px 30px;
  cursor: pointer;
  background: transparent;
  border: 0;
  outline: none;
  position: relative;
}

#btn {
  top: 0;
  left: 0;
  position: absolute;
  width: 110px;
  height: 100%;
  background: linear-gradient(to right, #46588c, #d46e75);
  border-radius: 30px;
  transition: 0.5s;
}

.social-icons {
  margin: 30px auto;
  text-align: center;
}

.social-icons img {
  width: 30px;
  margin: 0 12px;
}

.input-group {
  top: 120px;
  position: absolute;
  width: 280px;
  transition: 0.5s;
}

.input-field {
  width: 100%;
  padding: 10px 0;
  margin: 5px 0;
  border-left: 0;
  border-top: 0;
  border-right: 0;
  border-bottom: 1px solid #999;
  outline: none;
  background: transparent;
}

.input-radio {
  padding: 10px 0;
  margin: 5px 0;
  border-left: 0;
  border-top: 0;
  border-right: 0;
  border-bottom: 1px solid #999;
  outline: none;
  background: transparent;
}

.submit-btn {
  width: 85%;
  padding: 10px 30px;
  cursor: pointer;
  display: block;
  margin: auto;
  background: linear-gradient(to right, #46588c, #d46e75);
  border: 0;
  outline: none;
  border-radius: 30px;
}

.check-box {
  margin: 30px 10px 30px 0;
}

span {
  color: #777;
  font-size: 12px;
  bottom: 68px;
  position: absolute;
}

#login {
  left: 50px;
}

#register {
  left: 450px;
}</style>
</head>
<body>
<div class="hero">
  <div class="form-box" style="overflow-y:auto;">
    <div class="div button-box">
      <div id="btn"></div>
      <button type="button" class="toggle-btn" onclick="login()">Log In</button>
      <button type="button" class="toggle-btn" onclick="register()">Register</button>
    </div>
    <form id="login" action="#" class="input-group" method="POST">
      <input type="text" name="email" class="input-field" placeholder="User id" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" title="letters only" required>
      <input type="password" pattern="(?=.*\d)(?.*[a-z])(?=.*[A-Z]).{8,}" title="at least one number and one uppercase and lowercase letter,and at least 8 or more characters" name="password" class="input-field" placeholder="Password" name="password"   required>
      <button class="submit-btn" type="submit" name="signin">Log In</button>
	  <br>
	  <a href="forgot.php">forgot Password?</a>
    </form>
	<?php
if(isset($_POST['signin']))
{
error_reporting(1);
include("config.php");
$email=$_POST['email'];
$password=$_POST['password'];
$sql = "select * from user where email='".$email."' and password='".$password."'";
$result = mysqli_query($con,$sql);
$count=mysqlI_num_rows($result);
if($count>0)
{ 
session_start();
$_SESSION['user']=$email;
$aid=$_SESSION['user'];
echo "<script>
alert('Login Successful as $aid');
</script>";
echo "<script> location.href='after_user_login/index2.php'; </script>";
}
else
{
echo "<script>
alert('Invalid Username or Password');
</script>";
echo "<script> location.href=''; </script>";
} 
}
?>    
	
    <form id="register" action="#" method="POST" class="input-group">
      <input type="text" class="input-field" placeholder="Name" name="name"  required>
      <input type="email" class="input-field" placeholder="Email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" title="xyz@something.com" required>
      <input type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="at least one number and one uppercase and lowercase letter,and at least 8 or more characters" class="input-field" placeholder="Password" name="password"  required>
	  <input type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="at least one number and one uppercase and lowercase letter,and at least 8 or more characters" class="input-field" placeholder="Re-enter Password" name="cpassword"  required>
      <select class="input-field" placeholder="Password" name="gender" required>
	  <optgroup label="Select Gender">
	  <option value="male">Male</option>
	  <option value="female">Female</option>
	  </optgroup>
	  </select>
	  <input type="int" class="input-field" placeholder="Phone no" name="phone" pattern="^\d{10}$" title="10 numeric characters only" required>
	  <input type="text" class="input-field" placeholder="Address" name="address" required>
	  <select class="input-field" name="question" required>
	  <optgroup label="Select">
	  <option>which is your favourite City</option>
	  <option>which is your favourite Dish</option>
	  <option>What is your pets name</option>
	  <option>where did you meet your spouse</option>
	  </optgroup>
	  </select>
	  <input type="text" class="input-field" placeholder="Answer" name="answer" required>
	  <input type="checkbox" class="check-box" required><span>I agree to the terms & conditions</span>
      <button class="submit-btn" type="submit" name="register">Register</button>
    </form>
	
	<?php
if(isset($_POST['register']))
{
	error_reporting(1);
	include("config.php");
	
	$email=$_POST['email'];

	$sql = "select * from user where email='$email'";
	$result = mysqli_query($con,$sql);
	$count=mysqlI_num_rows($result);


	if($count>0)
	{
		
		echo "<script>
				alert('There is an existing account associated with this email.');
			</script>";
			echo "<script> location.href='reg.php'; </script>";
	}
	else
	{
		$name=$_POST['name'];
		$email=$_POST['email'];
		$password=$_POST['password'];
		$gender=$_POST['gender'];
		$phone=$_POST['phone'];
		$address=$_POST['address'];
		$question=$_POST['question'];
		$answer=$_POST['answer'];
		
		
		if ($_POST['password'] != $_POST['cpassword']) {
   // fail!
   
   echo "<script>
				alert('Password invalid.');
			</script>";
}
else {
   // success :(

		

		$query = "insert into user(name,email,password,gender,phone,address,question,answer) values('".$name."','".$email."','".$password."','".$gender."','".$phone."','".$address."','".$question."','".$answer."')";
           
            mysqli_query($con,$query) or die(mysqli_error($con));
		
		
		echo "<script>
				alert('Registeration Completed, Please Login.');
			</script>";
			echo "<script> location.href='reg.php'; </script>";
		}
	}
}
?>
  </div>
</div>
<script>
var x = document.getElementById("login");
var y = document.getElementById("register");
var z = document.getElementById("btn");

function register() {
  x.style.left = "-400px";
  y.style.left = "50px";
  z.style.left = "110px";
}

function login() {
  x.style.left = "50px";
  y.style.left = "450px";
  z.style.left = "0px";
}
</script>
</body>
</html>