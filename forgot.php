<html>
<title>Reset Password</title>
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
    <center><br><h4>Reset Password</h4></center>
    <form id="login" action="#" method="POST" class="input-group">
      <input type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" title="xyz@something.com" class="input-field" placeholder="Email" name="email" required>
	  <select class="input-field" name="question" required>
	  <optgroup label="Select Gender">
	  <option>which is your favourite City</option>
	  <option>which is your favourite Dish</option>
	  <option>What is your pets name</option>
	  <option>where did you meet your spouse</option>
	  </optgroup>
	  </select>
	  <input type="text" class="input-field" placeholder="Answer" name="answer" required>
	  <input type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="at least one number and one uppercase and lowercase letter,and at least 8 or more characters" class="input-field" placeholder="Password" name="password" required>
	  <input type="checkbox" class="check-box" required><span>I agree to the terms & conditions</span>
      <button class="submit-btn" type="submit" name="register">Register</button>
    </form>
	
	<?php
if(isset($_POST['register']))
{
	error_reporting(1);
	include("config.php");
	
		$email=$_POST['email'];
		$password=$_POST['password'];
		$question=$_POST['question'];
		$answer=$_POST['answer'];
		
	

		$query = "update user set password='".$password."' where email='".$email."' and question='".$question."' and answer='".$answer."'";
           
            mysqli_query($con,$query) or die(mysqli_error($con));
		
		
		echo "<script>
				alert('password reset, Please Login.');
			</script>";
			echo "<script> location.href='reg.php'; </script>";
}
?>
  </div>
</div>
</body>
</html>