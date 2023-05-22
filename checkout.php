<?php



error_reporting(0);

session_start();
if (isset($_SESSION['username'])) {
	$username = $_SESSION['username'];
	echo "<div style='font-size: 20px; padding: 10px; color:green;'>Welcome, $username!</div>";
	
}
$connect = mysqli_connect("localhost","root","","fyp");
if (isset($_POST['submit']))
{
	$name=$_POST['received_name'];
	$phone=$_POST['phone'];
	$address=$_POST['address'];
	$town=$_POST['town_city'];
	$state=$_POST['state_province'];
	$zipcode=$_POST['zip_postalcode'];
	$cardname=$_POST['card_name'];
	$cardnumber=$_POST['card_number'];
	$cardexpire=$_POST['card_expire'];
	$cvv=$_POST['cvv'];

	$sql="INSERT INTO `checkout`(`received_name`, `phone`, `address`, `town_city`, `state_province`, `zip_postalcode`, `card_name`, `card_number`, `card_expire`, `cvv`)
	 VALUES('$name','$phone','$address','$town','$state','$zipcode','$cardname','$cardnumber','$cardexpire','$cvv')";
    $insert = mysqli_query($connect,$sql);

	if(!$insert)
	{
		echo "<script>alert('Payment Sussecful.'); window.location.href = 'order_complete.php';</script>";
	else{
		echo"Data Insert Error";
	}
}
?>

<!DOCTYPE HTML>
<html>
<head>
	<title>4M Online Sport Shoes Store</title>
	<meta charset="utf-8">
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

	<link rel="stylesheet" href="css/register.css">
	


</head>
<body>

<div class="colorlib-loader"></div>

	<div id="page">
		<nav class="colorlib-nav" role="navigation">
			<div class="top-menu">
				<div class="container">
					<div class="row">
						<div class="col-sm-7 col-md-9">
							<div id="colorlib-logo"><a href="http://localhost/fyp/user_home_page.php">4M Online Sport Shoe Store</a></div>
						</div>
						<div class="col-sm-5 col-md-3">
			            <form action="#" class="search-wrap">
			               <div class="form-group">
			                  <input type="search" class="form-control search" placeholder="Search">
			                  <button class="btn btn-primary submit-search text-center" type="submit"><i class="icon-search"></i></button>
			               </div>
			            </form>
			         </div>
		         </div>
					<div class="row">
						<div class="col-sm-12 text-left menu-1">
							<ul>
								<li class="active"><a href="http://localhost/fyp/men.php">Home</a></li>
								<li class="has-dropdown">
									<a href="http://localhost/fyp/men.php">Men</a>
									<ul class="dropdown">
										<li><a href="#">Running Shoes</a></li>
										<li><a href="#">Basektball Shoes</a></li>
										<li><a href="#">Badminton Shoes</a></li>
									
									</ul>
								</li>
								<li class="has-dropdown">
									<a href="http://localhost/fyp/women.php">Women</a>
									<ul class="dropdown">
										<li><a href="#">Running Shoes</a></li>
										<li><a href="#">Basektball Shoes</a></li>
										<li><a href="#">Badminton Shoes</a></li>
									
									</ul>
								</li>
							
								<li><a href="http://localhost/fyp/about.php">About</a></li>
								<li><a href="contact.html">Contact</a></li>
                                <li class="has-dropdown">
									<a href="#">Account</a>
									<ul class="dropdown">
										<li><a href="profile.php">Edit Profile</a></li>
										<li><a href="checkout.php">Checkout</a></li>
                                        <li><a href="logout.php">Logout</a></li>
									</ul>
									<li class="cart"><a href="http://localhost/fyp/cart.php#"><i class="icon-shopping-cart"></i> 0</a></li>
						
						</div>
					</div>
				</div>
			</div>
			<div class="sale">
				<div class="container">
					<div class="row">
						<div class="col-sm-8 offset-sm-2 text-center">
							<div class="row">
								<div class="owl-carousel2">
									<div class="item">
										<div class="col">
											<h3><a href="#">Welcome to 4M Online Sport Shoe Store</a></h3>
										</div>
									</div>
									<div class="item">
										<div class="col">
											<h3><a href="#">Let's start a great shopping trip together !</a></h3>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</nav>

	<div class="colorlib-product">
  <div class="container">
    <div class="row row-pb-lg">
      <div class="col-sm-10 offset-md-1">
        <div class="process-wrap">
          <div class="process text-center active">
            <p><span><a href="cart.php" >1</a></span></p>
            <h3>Shopping Cart</h3>
          </div>
          <div class="process text-center">
            <p><span><a href="checkout.php">2</a></span></p>
            <h3>Checkout</h3>
          </div>
          <div class="process text-center">
            <p><span><a href="order_complete.php">3</a></span></p>
            <h3>Order Complete</h3>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
			
			<form method="POST" class="colorlib-form">
				<div class="row">
					<div class="col-md-7">
						<h2>Billing Address</h2>

						<div class="row">
				

							<div class="col-md-6">
								<div class="form-group">
									<label for="receivername">Receiver Name</label>
									<input type="text" name="received_name" class="form-control" placeholder="Receiver Name" required>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="phonenumber">Phone Number</label>
							<input type="text" name="phone" class="form-control" placeholder="Phone Number" required>
						</div>
						<div class="form-group">
							<label for="address">Address</label>
							<input type="text" name="address" class="form-control" placeholder="Address" required>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="towncity">Town / City</label>
									<input type="text" name="town_city" class="form-control" placeholder="Town / City" required>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="stateprovince">State / Province</label>
									<input type="text" name="state_province" class="form-control" placeholder="State / Province" required>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="zipcode">Zip Code</label>
							<input type="text" name="zip_postalcode" class="form-control" placeholder="Zip Code" required>
						</div>
					</div>
					<div class="col-md-5">
						<div class="cart-detail">
							<h2>Cart Total</h2>
							<ul>
								<li>
									<span>Product</span>
									<span>Total</span>
								</li>
								<li>
									<span>Shoes Name</span>
									<span>$59.00</span>
								</li>
								<li>
									<span>Shipping</span>
										Free Shipping
								</li>
								<li><span>Order Total</span><span>$59.00</span></li>
							</ul>
						</div>
						<div class="row">
									
						<div class="col-md-10">
								<div class="form-group">
									<label for="Card Name">Card Name</label>
									<input type="text" id="cardname"  name="card_name" class="form-control" placeholder="" required>
								</div>
							</div>
								
								<div class="col-md-6">
									<div class="form-group">
										<label for="Card Number">Card Number</label>
										<input name="card_number" id="cc-number"  type="tel" class="input-lg form-control cc-number" autocomplete="cc-number" placeholder="&bull;&bull;&bull;&bull;  &bull;&bull;&bull;&bull;  &bull;&bull;&bull;&bull;   &bull;&bull;&bull;&bull;" required>
								</div>
							</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="cvv">Card Expire</label>
										<input name="card_expire"id="cc-exp" type="tel" class="input-lg form-control cc-exp" autocomplete="cc-exp" placeholder="&bull;&bull; / &bull;&bull;" required>
								</div>
							</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="card expire">CVV</label>
										<input name="cvv"id="cc-cvc" type="tel" class="input-lg form-control cc-cvc" autocomplete="off" placeholder="&bull;&bull;&bull;&bull;" required>
									</div>
							</div>
							</div>
							<div class="col-md-12">
							<button name="submit" class="btn"  >Place an order</button>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
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


<!-- jQuery -->
<script src="js/jquery.min.js"></script>
<!-- jQuery Easing -->
<script src="js/jquery.easing.1.3.js"></script>
<!-- Bootstrap -->
<script src="js/bootstrap.min.js"></script>
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
	<!--Payment-->
	<script src="js/payment.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.payment/3.0.0/jquery.payment.min.js"></script>



</body>
</html>
