<?php

include 'dataconnection.php';
session_start();
if(isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    echo "<div style='font-size: 20px; padding: 10px; color:green;'>Welcome, $username!</div>";
}
?>

<!DOCTYPE HTML>
<html>
	<head>
	<title>Customer Reviews Page</title>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

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
	#add-comment {
      max-width: 600px;
      margin: 0 auto;
      background-color: #fff;
      border-radius: 5px;
      padding: 20px;
      margin-bottom: 30px;
	}
	.form-group select {
        width: 100%;
        padding: 10px;
        font-size: 13px;
        border: 1px solid #ccc;
        border-radius: 4px;
        background-color: white;
        color: gray;
        cursor: pointer;
    }
    
    .form-group select:focus {
        outline: none;
    }

    .btn {
  display: inline-block;
  position: relative;
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  background-color: gray;
  color: #fff;
  text-align: center;
  text-decoration: none;
  font-size: 16px;
  font-weight: 500;
  cursor: pointer;
}

	</style>
</head>
<body>

<?php 
if(empty($username)) {
    echo "<script type='text/javascript'>alert('You must be logged in to continue.');</script>";
    echo '<script>window.location.href = "home.php";</script>';
}
?>	

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
                    <form action="http://localhost/fyp/search.php" class="search-wrap" method="GET">
                    <div class="form-group">
                        <input type="search" name="search" required value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>" class="form-control search" placeholder="Search product">
                        <button class="btn btn-primary submit-search text-center" type="submit"><i class="icon-search"></i></button>
                    </div>
                </form>
                 </div>
             </div>
             <div class="row">
                    <div class="col-sm-12 text-left menu-1">
                        <ul>
                            <li class="active"><a href="http://localhost/fyp/user_home_page.php">Home</a></li>
                            <li class="has-dropdown">
                                <a href="http://localhost/fyp/men.php">Men</a>
                                <ul class="dropdown">
                                    <li><a href="#">Nike</a></li>
									<li><a href="#">Adidas</a></li>
                                    
                                
                                </ul>
                            </li>
                            <li class="has-dropdown">
                                <a href="http://localhost/fyp/women.php">Women</a>
                                <ul class="dropdown">
                                    <li><a href="#">Nike</a></li>
									<li><a href="#">Adidas</a></li>
                                    
                                
                                </ul>
                            </li>
                        
                            <li><a href="http://localhost/fyp/about.php">About</a></li>
                            <li><a href="viewreview.php">Review</a></li>
                                <li class="has-dropdown">
									<a href="#">Account</a>
									<ul class="dropdown">
										<li><a href="profile.php">Edit Profile</a></li>
										<li><a href="#">Order History</a></li>
                                        <li><a href="logout.php">Logout</a></li>
									</ul>
                                <?php
                            
                            if (isset($_SESSION['username'])) {
                            $username = $_SESSION['username'];
                            mysqli_select_db($connect, "fyp");
                            $result = mysqli_query($connect, "select * from add_to_cart WHERE username = '$username'");	
                            $count = mysqli_num_rows($result);//used to count number of rows

                            }
                            if ($result === false) {
                                die(mysqli_error($connect));
                            }

                        
                            ?>

                            <li class="cart">
                                <a href="http://localhost/fyp/cart.php#">
                                    <i class="icon-shopping-cart"></i> <?php echo $count; ?>
                                </a>
                            </li>	
                        </ul>
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

    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col">
                    <p class="bread"><span><a href="user_home_page.php">Home</a></span> / <span>Customer Reviews</span></p>
                </div>
            </div>
        </div>
    </div>
    <?php
$connect = mysqli_connect("localhost", "root", "", "fyp");
if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}
$query = "SELECT * FROM review ORDER BY id DESC";
$result = mysqli_query($connect, $query);

// Check for errors
if (!$result) {
  echo "Error!!! " . mysqli_error($connect);
  exit();
}
?>
<div class="row">
    <div class="col-md-12 text-left">
        
       <br> <p><a href="review.php" class="btn btn-primary">Add Review</a></p>
    </div>
</div>

    <div id="add-comment">
    <div class="contact-wrap">
    <h3>Customer Reviews</h3>
    <?php while ($row = mysqli_fetch_assoc($result)): ?>
        <div class="row" <?php echo $row['review_status']; ?>>
            <div class="w-100"></div>
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="fname">Name: <?php echo $row['username']; ?></label>
                </div>
            </div>
            <div class="w-100"></div>
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="subject">Rating: <?php echo $row['rating']; ?></label><br>
                </div>
            </div> 
            <div class="w-100"></div>
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="message">Review: <?php echo $row['comment']; ?></label>
                </div>
            </div>
        </div>
    <?php endwhile; ?>
</div>

        </div>
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
<!-- Google Map -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCefOgb1ZWqYtj7raVSmN4PL2WkTrc-KyA&sensor=false"></script>
<script src="js/google_map.js"></script>
<!-- Main -->
<script src="js/main.js"></script>

</body>
</html>
