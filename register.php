<?php

include 'dataconnection.php';

error_reporting(0);

session_start();

if (isset($_SESSION['username'])) {
    header("Location: login.php");
}

if (isset($_POST['submit'])) {
	$username = $_POST['username'];
	$email = $_POST['email'];
	$birthday=date('Y-m-d',strtotime($_POST['birthday']));
	$gender=$_POST['gender'];
	$password = md5($_POST['password']);
	$cpassword = md5($_POST['cpassword']);
	$question = mysqli_real_escape_string($connect, $_POST['question']);
    $answer = mysqli_real_escape_string($connect, $_POST['answer']);

	if ($password == $cpassword) {
		$sql = "SELECT * FROM users WHERE email='$email'";
		$result = mysqli_query($connect, $sql);
		if (!$result->num_rows > 0) {
			$sql = "INSERT INTO users (username, email,birthday,gender, password,question, answer)
        VALUES ('$username', '$email','$birthday','$gender','$password', '$question', '$answer')";		
			$result = mysqli_query($connect, $sql);
			if ($result) {
				echo "<script>alert('Wow! User Registration Completed.')</script>";
				echo '<script>window.location.href = "login.php";</script>';
				$username = "";
				$email = "";
				$birthday="";
				$gender="";
				$_POST['password'] = "";
				$_POST['cpassword'] = "";
				
			} else {
				echo "<script>alert('Woops! Something Wrong Went.')</script>";
			}
		} else {
			echo "<script>alert('Woops! Email Already Exists.')</script>";
		}

	} else {
		echo "<script>alert('Password Not Matched.')</script>";
	}
}
$questions = array(
	'What is the name of your first pet?',
	'What is your favourite book?',
	'What is your favourite movie?',
	'What is your favourite color?',
	'What is your favourite brand sport shoes?',
	'what is your ic last four numbers?'
 );
 session_destroy();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Register Form </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css" integrity="sha384-QYIZto+st3yW+o8+5OHfT6S482Zsvz2WfOzpFSXMF9zqeLcFV0/wlZpMtyFcZALm" crossorigin="anonymous">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" type="text/css" href="css/register.css">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Rokkitt:100,300,400,700" rel="stylesheet">
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Ion Icon Fonts-->
	<link rel="stylesheet" href="css/ionicons.min.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.min.css">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="css/magnific-popup.css">

	<!-- Flexslider  -->
	<link rel="stylesheet" href="css/flexslider.css">

	<!-- Owl Carousel -->
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">
	
	<!-- Date Picker -->
	<link rel="stylesheet" href="css/bootstrap-datepicker.css">
	<!-- Flaticons  -->
	<link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="css/style.css">

	<style>
    .input-radio input[type="radio"] {
      display: inline-block;
      margin-right: 10px;
	  margin-left :10px;
    }
   /*------Validation------*/
  
		.password-container {
  		position: relative;
		
		}
	
	
  </style>


</head>
<body>

<div class="colorlib-loader"></div>

	<div id="page">
		<nav class="colorlib-nav" role="navigation">
			<div class="top-menu">
				<div class="container">
					<div class="row">
						<div class="col-sm-7 col-md-9">
							<div id="colorlib-logo"><a href="home.php">4M Online Sport Shoes Store</a></div>
						</div>
						<div class="col-sm-5 col-md-3">
			            <form action="#" class="search-wrap">
			               
			            </form>
			         </div>
		         </div>
					<div class="row">
						<div class="col-sm-12 text-left menu-1">
							<ul>
								<li class="active"><a href="home.php">Home</a></li>
								<li class="has-dropdown">
									<a href="http://localhost/fyp/men.php">Men</a>
								
								</li>
								</li>
								<li class="has-dropdown">
									<a href="http://localhost/fyp/women.php">Women</a>
									
								</li>
								<li><a href="http://localhost/fyp/about.php">About</a></li>
								<li><a href="review.php">Review</a></li>
								
							</ul>
						</div>
					</div>
				</div>
			</div>
	

	

	<div class="register-container">
		<form id="form" action="" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Register</p>
			<div class="input-group">
				<input type="text" placeholder="Username" id="username"name="username" value="<?php echo $username; ?>" required>
				<div class="error"></div>
			</div>
			<br>
			<div class="input-group">
				<input type="email" placeholder="Email" name="email" id="email" value="<?php echo $email; ?>" required>
				
			</div>
			<br>
			
			<div class="input-group">
				<p>Date of Birth:</p>
				<input type="date"  name="birthday"min="1963-01-01" max="2005-01-01" value="<?php echo $birthday; ?>" required>
			</div>
			<br>
			<br>

			<div class="input-radio">
			<p>Gender:</p>	
    		<input style="width:18px; height:18px;"type="radio" name="gender" value="Male" <?php if ($gender == "male") echo "checked"; ?>required>Male 
    		<input style="width:18px; height:18px;"type="radio" name="gender" value="Female" <?php if ($gender == "female") echo "checked"; ?>required>Female
    		</div>
			<br>
			
			<div class="input-group password-container">
				<input type="password" placeholder="Password" name="password" id="password" value="<?php echo $_POST['password']; ?>" required pattern="(?=.*[@#!$*()])(?=.*[a-z])(?=.*[A-Z]).{8,}" 
        title="Password must contain at least 8 characters and at least 1 Alphabet and 1 Special Character">

				<p id="message" style="display:none;" >Password is <span id="strenght"></span></p>
			
            </div>
			<br>
			
            <div class="input-group password-container">
				<input type="password" placeholder="Confirm Password" name="cpassword"  id="confirm-password"  value="<?php echo $_POST['cpassword']; ?>" required>
			
			</div>
			<br>
		
			<select style="width: 100%;border: 2px solid #e7e7e7; padding: 15px 20px;font-size: 1rem;border-radius: 30px;"name="question" required>
          	<option value="">Select a security question</option>
        	<?php foreach ($questions as $q) { ?>
        	 <option value="<?php echo $q ?>"><?php echo $q ?></option>
         	 <?php } ?>
      		</select>
			<br>
			<br>
			<div class="input-group">
      		<input type="text" name="answer" required placeholder="Enter your answer" >
			 
			</div>
			<br>
			<div class="input-group">
				<button name="submit" class="btn"  >Register</button>
			</div>
			<br>
			<p class="login-register-text">Have an account? <a href="login.php">Login Here</a>.</p>
		</form>
	</div>


	
	<footer id="colorlib-footer" role="contentinfo">
			<div class="container">
				<div class="row row-pb-md">
					<div class="col footer-col colorlib-widget">
						<h4>About Footwear</h4>
						<p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life</p>
						<p>
							<ul class="colorlib-social-icons">
								<li><a href="#"><i class="icon-twitter"></i></a></li>
								<li><a href="#"><i class="icon-facebook"></i></a></li>
								<li><a href="#"><i class="icon-linkedin"></i></a></li>
								<li><a href="#"><i class="icon-dribbble"></i></a></li>
							</ul>
						</p>
					</div>
					<div class="col footer-col colorlib-widget">
						<h4>Customer Care</h4>
						<p>
							<ul class="colorlib-footer-links">
								<li><a href="#">Contact</a></li>
								<li><a href="#">Returns/Exchange</a></li>
								<li><a href="#">Gift Voucher</a></li>
								<li><a href="#">Wishlist</a></li>
								<li><a href="#">Special</a></li>
								<li><a href="#">Customer Services</a></li>
								<li><a href="#">Site maps</a></li>
							</ul>
						</p>
					</div>
					<div class="col footer-col colorlib-widget">
						<h4>Information</h4>
						<p>
							<ul class="colorlib-footer-links">
								<li><a href="#">About us</a></li>
								<li><a href="#">Delivery Information</a></li>
								<li><a href="#">Privacy Policy</a></li>
								<li><a href="#">Support</a></li>
								<li><a href="#">Order Tracking</a></li>
							</ul>
						</p>
					</div>

					<div class="col footer-col">
						<h4>News</h4>
						<ul class="colorlib-footer-links">
							<li><a href="blog.html">Blog</a></li>
							<li><a href="#">Press</a></li>
							<li><a href="#">Exhibitions</a></li>
						</ul>
					</div>

					<div class="col footer-col">
						<h4>Contact Information</h4>
						<ul class="colorlib-footer-links">
							<li>291 South 21th Street, <br> Suite 721 New York NY 10016</li>
							<li><a href="tel://1234567920">+ 1235 2355 98</a></li>
							<li><a href="mailto:info@yoursite.com">info@yoursite.com</a></li>
							<li><a href="#">yoursite.com</a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="copy">
				<div class="row">
					<div class="col-sm-12 text-center">
						<p>
							<span><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></span> 
							<span class="block">Demo Images: <a href="http://unsplash.co/" target="_blank">Unsplash</a> , <a href="http://pexels.com/" target="_blank">Pexels.com</a></span>
						</p>
					</div>
				</div>
			</div>
		</footer>
	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="ion-ios-arrow-up"></i></a>
	</div>
	
	
				<script>
				var pass =document.getElementById("password");
				var msg =document.getElementById("message");
				var str =document.getElementById("strenght");
				var uppercaseRegex = /[A-Z]/;
                var punctuationRegex = /[!"#$%&'()*+,-./:;<=>?@[\\\]^_`{|}~]/;
				pass.addEventListener('input',() => {
					if(pass.value.length  > 0){
						
						msg.style.display="block";
					}
					else{
						msg.style.display="none";
					}
					if(pass.value.length < 4){
						str.innerHTML = "weak";
						pass.style.bordercolor="#ff5925";
						msg.style.color="#ff5925";
					}
					else if(pass.value.length >= 4 && pass.value.length <8 && uppercaseRegex.test(pass.value)){
						str.innerHTML = "medium";
						pass.style.bordercolor="gold";
						msg.style.color="gold";
					}
					else if (pass.value.length >=8 && uppercaseRegex.test(pass.value) && punctuationRegex.test(pass.value)) {
					str.innerHTML ="strong";
					pass.style.bordercolor="#26d730";
					msg.style.color="#26d730";
				}
					
				})

				</script>
	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
   <!-- popper -->
   <script src="js/popper.min.js"></script>
   <!-- bootstrap 4.1 -->
   <script src="js/bootstrap.min.js"></script>
   <!-- jQuery easing -->
   <script src="js/jquery.easing.1.3.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Flexslider -->
	<script src="js/jquery.flexslider-min.js"></script>
	<!-- Owl carousel -->
	<script src="js/owl.carousel.min.js"></script>
	<!-- Magnific Popup -->
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/magnific-popup-options.js"></script>
	<!-- Date Picker -->
	<script src="js/bootstrap-datepicker.js"></script>
	<!-- Stellar Parallax -->
	<script src="js/jquery.stellar.min.js"></script>
	<!-- Main -->
	<script src="js/main.js"></script>

			 	
</body>
</html>

