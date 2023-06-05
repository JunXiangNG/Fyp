<?php
include ('dataconnection.php');

if(isset($_POST['submit']))
{
   $email =$_POST['email'];
   $password = $_POST['password'];
   $confirm_password = $_POST['cpassword'];

   if($password != $confirm_password){
      $error = 'Passwords do not match!';
   }else {
      $update = "UPDATE fyp.users SET password = '".md5($password)."' WHERE email = '$email'";
      mysqli_query($connect, $update);
      echo '<script>alert("Your password has been reset!");window.location.href="login.php";</script>';
   }
  
}

if (isset($_GET['email'])) {
   $email = $_GET['email'];
} else {
   // handle the case where email is not set, e.g. redirect the user to an error page
}

?>

<!DOCTYPE html>
<html lang="en">
<meta charset="utf-8">
	
<title>Reset Password</title>
   
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
	
</head>
<style>
 form
   {
      width:65%;
      margin: 0 auto;
      max-width: 500px;
   }
   h1
   {
      margin-top:10px;
      margin-bottom:50px;
   }
   .reset-container
   {
      width: 100%;
    height: 100%;
    border: 2px solid #e7e7e7;
    padding: 15px 20px;
    font-size: 1rem;
    border-radius: 30px;
    margin-bottom:30px;
    background: transparent;
    outline: none;
    transition: .3s;
   }
   .reset-btn
   {
    display: inline-block;
    background:#3fff7f;
    color:#fff;
    padding:8px 30px;
    margin:20px 0px 200px;
    border-radius:25px;
    transition:background 0.5s;
    text-align:center;
    width:250px;
   }
   .reset-btn:hover
   {
      background: #006b24;
   }
   /*------Validation------*/
  
   .password-container {
  		position: relative;
		
		}
    
  </style>
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

			<form action="" method="POST" class="login-email">

<p class="login-text" style="font-size: 2rem; font-weight: 800;">Reset Password</p>

  <?php
  if(isset($error)){
	 echo '<span class="error-msg">'.$error.'</span>';
  };
  ?>
  <input type="hidden" name="email" class="reset-container"value="<?php echo $email ?>">
 
 
  <input type="password" name="password"  id="password"placeholder="Enter new password"class="reset-container"  required pattern="(?=.*[@#!$*()])(?=.*[a-z])(?=.*[A-Z]).{8,}" 
	title="Password must contain at least 8 characters and at least 1 Alphabet and 1 Special Character"> 
  
  <p id="message" style="display:none; margin-left:30px; margin-top:-20px; font-weight:bold;" >Password is <span id="strenght"></span></p>


  <input type="password" name="cpassword" required placeholder="Confirm new password"class="reset-container" require>
  <br>
  <input type="submit" name="submit" value="Submit" class="reset-btn">
</form>

</div>

<!--footer-->
<footer id="colorlib-footer" role="contentinfo">
			<div class="container">
				<div class="row row-pb-md">
					<div class="col footer-col colorlib-widget">
						<h4>About 4M Online Sport Shoe Store</h4>
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
							<li><a href="viewreview.php">Review</a></li>
							</ul>
						</p>
					</div>
					<div class="col footer-col colorlib-widget">
						<h4>Information</h4>
						<p>
							<ul class="colorlib-footer-links">
								<li><a href="about.php">About us</a></li>
								
							</ul>
						</p>
					</div>

					

					<div class="col footer-col">
						<h4>Contact Information</h4>
						<ul class="colorlib-footer-links">
							<li>28,Jalan Bukit Beruang, <br> Taman Bukit Beruang</li>
							<li><a href="tel://1234567920">+60 11-26121234</a></li>
							<li><a href="mailto:info@yoursite.com">www.4M.com</a></li>
							
						</ul>
					</div>
				</div>
			</div>
			<div class="copy">
				<div class="row">
					<div class="col-sm-12 text-center">
						<p>
							<span><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">4M</a>
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
